<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use App\Models\Orderitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Show the review form for a specific transaction
     */
    public function create($transactionId)
    {
        try {
            // Get transaction with order items and related data
            $transaction = Transaction::where('user_id', Auth::id())
                ->where('id', $transactionId)
                ->with([
                    'orderitems.product.images',
                    'orderitems.product.vendor',
                    'orderitems.productvariant.productvariantvalues'
                ])
                ->firstOrFail();

            // Get all order items (allow re-reviewing)
            $items = $transaction->orderitems;

            if ($items->isEmpty()) {
                return redirect()->route('user.orders')->with('error', 'Tidak ada produk dalam pesanan ini');
            }

            return view('user.review-create', compact('transaction', 'items'));
        } catch (\Exception $e) {
            Log::error('Error showing review form: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->route('user.orders')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Store the reviews
     */
    public function store(Request $request, $transactionId)
    {
        $request->validate([
            'reviews' => 'required|array',
            'reviews.*.product_id' => 'required|exists:products,id',
            'reviews.*.rating' => 'required|integer|min:1|max:5',
            'reviews.*.comment' => 'required|string|max:1000',
            'reviews.*.images.*' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        try {
            // Verify transaction belongs to user
            $transaction = Transaction::where('user_id', Auth::id())
                ->where('id', $transactionId)
                ->firstOrFail();

            // Create or update reviews
            foreach ($request->reviews as $reviewData) {
                // Check if product exists in this transaction
                $orderItem = Orderitems::where('transaction_id', $transaction->id)
                    ->where('product_id', $reviewData['product_id'])
                    ->first();

                if (!$orderItem) {
                    continue;
                }

                $images = [];

                // Handle image uploads
                if (isset($reviewData['images']) && is_array($reviewData['images'])) {
                    foreach ($reviewData['images'] as $image) {
                        if ($image && $image->isValid()) {
                            $path = $image->store('reviews', 'public');
                            $images[] = $path;
                        }
                    }
                }

                // Check if already reviewed
                $existingReview = Review::where('product_id', $reviewData['product_id'])
                    ->where('user_id', Auth::id())
                    ->first();

                if ($existingReview) {
                    // Update existing review
                    $existingReview->update([
                        'rating' => $reviewData['rating'],
                        'comment' => $reviewData['comment'],
                        'images' => !empty($images) ? $images : $existingReview->images,
                    ]);
                } else {
                    // Create new review
                    Review::create([
                        'product_id' => $reviewData['product_id'],
                        'user_id' => Auth::id(),
                        'rating' => $reviewData['rating'],
                        'comment' => $reviewData['comment'],
                        'images' => !empty($images) ? $images : null,
                    ]);
                }
            }

            // Get the first product ID to redirect to its detail page
            $firstProductId = $request->reviews[0]['product_id'] ?? null;

            if ($firstProductId && count($request->reviews) == 1) {
                // If only one product reviewed, redirect to that product detail page
                return redirect()->route('product.detail', $firstProductId)->with('success', 'Ulasan berhasil dikirim');
            }

            // If multiple products, redirect to orders page
            return redirect()->route('user.orders')->with('success', 'Ulasan berhasil dikirim');
        } catch (\Exception $e) {
            Log::error('Error storing review: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan ulasan');
        }
    }
}

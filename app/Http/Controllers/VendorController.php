<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display vendor store page with products
     */
    public function show($id)
    {
        $vendor = Vendor::with(['products' => function ($query) {
            $query->with('images')->where('is_active', true);
        }])->findOrFail($id);

        // Calculate vendor stats
        $totalProducts = $vendor->products->count();
        $totalSold = $vendor->products->sum('total_sold');
        $avgRating = $vendor->products->avg('avg_rating');
        $totalReviews = $vendor->products->sum('total_review');

        // Get products with sorting
        $sortBy = request('sort', 'newest');
        $products = $vendor->products()->with('images');

        switch ($sortBy) {
            case 'price_low':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_high':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'best_seller':
                $products = $products->orderBy('total_sold', 'desc');
                break;
            case 'rating':
                $products = $products->orderBy('avg_rating', 'desc');
                break;
            default:
                $products = $products->orderBy('created_at', 'desc');
        }

        $products = $products->paginate(12);

        return view('product.kunjungitoko', compact(
            'vendor',
            'products',
            'totalProducts',
            'totalSold',
            'avgRating',
            'totalReviews'
        ));
    }
}

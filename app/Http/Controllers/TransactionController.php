<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Orderitems;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionController extends Controller
{
    protected $cartRepository;
    protected $transactionRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Display user's transactions/orders
     */
    public function index()
    {
        $userId = Auth::id();
        $transactions = Transaction::where('user_id', $userId)
            ->with(['orderitems.product.images', 'address'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.orders', compact('transactions'));
    }

    /**
     * Show checkout page - shipping address
     * Supports both cart checkout and direct buy now
     */
    public function checkoutShipping(Request $request)
    {
        try {
            $userId = Auth::id();
            $addresses = Address::where('user_id', $userId)->get();

            // Check if this is a direct buy (from buy now button)
            if ($request->has('buy_now')) {
                $request->validate([
                    'product_id' => 'required|exists:products,id',
                    'quantity' => 'required|integer|min:1'
                ]);

                $product = \App\Models\Product::with(['images', 'vendor'])->findOrFail($request->product_id);
                $variant = $product->variants()->first();

                if (!$variant) {
                    $variant = \App\Models\Productvariant::create([
                        'product_id' => $product->id,
                        'sku' => 'DEFAULT-' . $product->id,
                        'price' => $product->price,
                        'stock' => 999,
                        'imagevariant' => null
                    ]);
                }

                // Store buy now items in session
                $checkoutItem = [
                    'product_id' => $product->id,
                    'variant_id' => $variant->id,
                    'quantity' => $request->quantity,
                    'price' => $variant->price,
                    'subtotal' => $variant->price * $request->quantity,
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'vendor_id' => $product->vendor_id,
                        'vendor' => $product->vendor ? ['name' => $product->vendor->name] : null,
                        'images' => $product->images->map(fn($img) => ['image' => $img->image])->toArray()
                    ]
                ];

                session(['checkout_type' => 'buy_now']);
                session(['checkout_items' => [$checkoutItem]]);

                $cartTotal = $checkoutItem['subtotal'];

                // Convert to object for view
                $itemObj = (object) $checkoutItem;
                $itemObj->product = (object) $checkoutItem['product'];
                if (isset($checkoutItem['product']['vendor'])) {
                    $itemObj->product->vendor = (object) $checkoutItem['product']['vendor'];
                }
                if (isset($checkoutItem['product']['images'])) {
                    $itemObj->product->images = collect($checkoutItem['product']['images'])->map(fn($img) => (object) $img);
                }

                $cart = (object)['cartitems' => collect([$itemObj])];
            } else {
                // Regular cart checkout
                $cart = $this->cartRepository->getUserCart($userId);
                $cartTotal = $this->cartRepository->getCartTotal($userId);

                if (!$cart || $cart->cartitems->count() == 0) {
                    return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong');
                }

                // Convert cart items to array and store in session
                $checkoutItems = $cart->cartitems->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                        'variant_id' => $item->variant_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'subtotal' => $item->subtotal,
                        'product' => [
                            'id' => $item->product->id,
                            'name' => $item->product->name,
                            'vendor_id' => $item->product->vendor_id,
                            'vendor' => $item->product->vendor ? ['name' => $item->product->vendor->name] : null,
                            'images' => $item->product->images->map(fn($img) => ['image' => $img->image])->toArray()
                        ]
                    ];
                })->toArray();

                session(['checkout_type' => 'cart']);
                session(['checkout_items' => $checkoutItems]);
            }

            return view('CheckOut.alamat_pengiriman', compact('cart', 'cartTotal', 'addresses'));
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show order confirmation page
     */
    public function checkoutConfirmation(Request $request)
    {
        try {
            $userId = Auth::id();

            // Verify checkout session exists
            if (!session()->has('checkout_items') || empty(session('checkout_items'))) {
                return redirect()->route('cart.index')->with('error', 'Silakan mulai proses checkout dari keranjang');
            }

            // Check if using new address or existing one
            if ($request->has('use_new_address') && $request->use_new_address == '1') {
                // Validate new address data
                $validated = $request->validate([
                    'recipient_name' => 'required|string|max:255',
                    'phone' => 'required|string|max:20',
                    'city' => 'required|string|max:100',
                    'province' => 'required|string|max:100',
                    'postal_code' => 'required|string|max:10',
                    'address' => 'required|string',
                ], [
                    'recipient_name.required' => 'Nama lengkap wajib diisi',
                    'phone.required' => 'Nomor telepon wajib diisi',
                    'city.required' => 'Kota wajib diisi',
                    'province.required' => 'Provinsi wajib diisi',
                    'postal_code.required' => 'Kode pos wajib diisi',
                    'address.required' => 'Alamat lengkap wajib diisi',
                ]);

                // Create new address
                $address = Address::create([
                    'user_id' => $userId,
                    'recipient_name' => $validated['recipient_name'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'province' => $validated['province'],
                    'postal_code' => $validated['postal_code'],
                    'is_default' => false,
                ]);

                $addressId = $address->id;
            } else {
                // Use existing address
                $request->validate([
                    'address_id' => 'required|exists:addresses,id'
                ], [
                    'address_id.required' => 'Silakan pilih alamat pengiriman'
                ]);

                $addressId = $request->address_id;
                $address = Address::findOrFail($addressId);
            }

            // Get checkout data from session
            $checkoutItems = session('checkout_items', []);

            // Convert array items to objects for view compatibility
            $cartItems = collect($checkoutItems)->map(function ($item) {
                $itemObj = (object) $item;
                // Convert product array to object with nested objects
                if (isset($item['product']) && is_array($item['product'])) {
                    $productData = (object) $item['product'];
                    if (isset($item['product']['vendor']) && is_array($item['product']['vendor'])) {
                        $productData->vendor = (object) $item['product']['vendor'];
                    }
                    if (isset($item['product']['images']) && is_array($item['product']['images'])) {
                        $productData->images = collect($item['product']['images'])->map(fn($img) => (object) $img);
                    }
                    $itemObj->product = $productData;
                }
                return $itemObj;
            });

            $cartTotal = $cartItems->sum('subtotal');
            $cart = (object)['cartitems' => $cartItems];

            // Store address_id in session
            session(['checkout_address_id' => $addressId]);

            return view('CheckOut.konfirmasi_pesanan', compact('cart', 'cartTotal', 'address'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('checkout.shipping')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Checkout confirmation error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->route('checkout.shipping')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Process the order
     */
    public function payment(Request $request)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTransactionDataFromSession());

        // Midtrans Configuration
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.serverKey');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        DB::commit();

        return redirect()->route('checkout.success', ['transaction' => $transaction->id]);
    }

    /**
     * Process the order
     */
    public function processOrder(Request $request)
    {
        $userId = Auth::id();
        $addressId = session('checkout_address_id');
        $checkoutItems = session('checkout_items', []);

        if (!$addressId || empty($checkoutItems)) {
            return redirect()->route('cart.index')->with('error', 'Silakan lengkapi proses checkout');
        }

        DB::beginTransaction();
        try {
            // Calculate total
            $cartTotal = collect($checkoutItems)->sum('subtotal');

            // Get address for customer details
            $address = Address::findOrFail($addressId);

            // Create transaction
            $transaction = Transaction::create([
                'user_id' => $userId,
                'address_id' => $addressId,
                'total' => $cartTotal,
                'payment_status' => 'pending',
                'oder_status' => 'proses'
            ]);

            // Create order items
            foreach ($checkoutItems as $item) {
                $vendorId = null;
                $variantId = null;

                if (is_array($item)) {
                    $vendorId = $item['product']['vendor_id'] ?? null;
                    $variantId = $item['variant_id'] ?? null;
                } else {
                    $vendorId = $item->product->vendor_id ?? null;
                    $variantId = $item->variant_id ?? null;
                }

                Orderitems::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => is_array($item) ? $item['product_id'] : $item->product_id,
                    'variant_id' => $variantId,
                    'vendor_id' => $vendorId,
                    'quantity' => is_array($item) ? $item['quantity'] : $item->quantity,
                    'price' => is_array($item) ? $item['price'] : $item->price,
                ]);
            }

            // Generate unique order ID
            $orderId = 'ORDER-' . $transaction->id . '-' . time();

            // Update transaction with order_id
            $transaction->update(['order_id' => $orderId]);

            // Save transaction data to session (sesuai contoh gambar)
            $this->transactionRepository->saveTransactionDataToSession($request->all());

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = config('midtrans.is3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $transaction->order_id,
                    'gross_amount' => (int) $transaction->total,
                ],
                'customer_details' => [
                    'first_name' => $address->recipient_name,
                    'email' => Auth::user()->email,
                    'phone' => $address->phone,
                ],
            ];

            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

            DB::commit();

            // Clear cart from database if cart checkout
            if (session('checkout_type') === 'cart') {
                $this->cartRepository->getUserCart($userId)->cartitems()->delete();
            }

            // Clear checkout session data
            session()->forget(['checkout_address_id', 'checkout_type', 'checkout_items']);

            return redirect($paymentUrl);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Process order error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Handle Midtrans payment notification webhook
     */
    public function handleNotification(Request $request)
    {
        try {
            // Configure Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');

            // Create notification instance
            $notification = new \Midtrans\Notification();

            // Get transaction data
            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status ?? 'accept';

            Log::info('Midtrans Notification Received', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus
            ]);

            // Find transaction by order_id
            $transaction = Transaction::where('order_id', $orderId)->first();

            if (!$transaction) {
                Log::error('Transaction not found for order_id: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
            }

            // Update payment status based on transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $transaction->update([
                        'payment_status' => 'paid',
                        'oder_status' => 'proses'
                    ]);
                }
            } elseif ($transactionStatus == 'settlement') {
                $transaction->update([
                    'payment_status' => 'paid',
                    'oder_status' => 'proses'
                ]);
            } elseif ($transactionStatus == 'pending') {
                $transaction->update(['payment_status' => 'pending']);
            } elseif ($transactionStatus == 'deny') {
                $transaction->update(['payment_status' => 'failed']);
            } elseif ($transactionStatus == 'expire') {
                $transaction->update(['payment_status' => 'expired']);
            } elseif ($transactionStatus == 'cancel') {
                $transaction->update(['payment_status' => 'cancelled']);
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Midtrans notification error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Handle payment finish redirect from Midtrans
     */
    public function paymentFinish(Request $request)
    {
        $orderId = $request->query('order_id');
        $transactionStatus = $request->query('transaction_status');

        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Order ID tidak ditemukan');
        }

        // Find transaction by order_id
        $transaction = Transaction::where('order_id', $orderId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan');
        }

        // Redirect to success page
        return redirect()->route('checkout.success', ['transaction' => $transaction->id]);
    }

    /**
     * Show order success page
     */
    public function orderSuccess($transactionId)
    {
        $transaction = Transaction::with(['orderitems.product', 'address'])
            ->where('user_id', Auth::id())
            ->findOrFail($transactionId);

        return view('CheckOut.pembayaran_berhasil', compact('transaction'));
    }

    /**
     * Show transaction detail
     */
    public function show($id)
    {
        $transaction = Transaction::with(['orderitems.product.images', 'address'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.order_detail', compact('transaction'));
    }

    /**
     * Mark order as completed
     */
    public function markAsCompleted($id)
    {
        try {
            $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);

            $transaction->update(['oder_status' => 'berhasil']);

            return redirect()->back()->with('success', 'Pesanan berhasil ditandai selesai');
        } catch (\Exception $e) {
            Log::error('Mark as completed error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }
}

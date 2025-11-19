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
                    'product' => $product
                ];

                session(['checkout_type' => 'buy_now']);
                session(['checkout_items' => [$checkoutItem]]);

                $cartTotal = $checkoutItem['subtotal'];
                $cart = (object)['cartitems' => collect([(object)$checkoutItem])];
            } else {
                // Regular cart checkout
                $cart = $this->cartRepository->getUserCart($userId);
                $cartTotal = $this->cartRepository->getCartTotal($userId);

                if (!$cart || $cart->cartitems->count() == 0) {
                    return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong');
                }

                session(['checkout_type' => 'cart']);
                session()->forget('checkout_items');
            }

            return view('CheckOut.alamat_pengiriman', compact('cart', 'cartTotal', 'addresses'));
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show payment method page
     */
    public function checkoutPayment(Request $request)
    {
        try {
            $userId = Auth::id();

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

            // Get checkout data based on type
            if (session('checkout_type') === 'buy_now') {
                $checkoutItems = session('checkout_items');
                $cartTotal = collect($checkoutItems)->sum('subtotal');
                $cart = (object)['cartitems' => collect(array_map(fn($item) => (object)$item, $checkoutItems))];
            } else {
                $cart = $this->cartRepository->getUserCart($userId);
                $cartTotal = $this->cartRepository->getCartTotal($userId);
            }

            // Store address_id in session
            session(['checkout_address_id' => $addressId]);

            return view('CheckOut.metode_pembayaran', compact('cart', 'cartTotal', 'address'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('checkout.shipping')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Checkout payment error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->route('checkout.shipping')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show order confirmation page
     */
    public function checkoutConfirmation(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string'
        ]);

        $userId = Auth::id();

        // Get checkout data based on type
        if (session('checkout_type') === 'buy_now') {
            $checkoutItems = session('checkout_items');
            $cartTotal = collect($checkoutItems)->sum('subtotal');
            $cart = (object)['cartitems' => collect(array_map(fn($item) => (object)$item, $checkoutItems))];
        } else {
            $cart = $this->cartRepository->getUserCart($userId);
            $cartTotal = $this->cartRepository->getCartTotal($userId);
        }

        $addressId = session('checkout_address_id');
        $address = Address::findOrFail($addressId);
        $paymentMethod = $request->payment_method;

        // Store payment method in session
        session(['checkout_payment_method' => $paymentMethod]);

        return view('CheckOut.konfirmasi_pesanan', compact('cart', 'cartTotal', 'address', 'paymentMethod'));
    }

    /**
     * Process the order
     */
    public function processOrder(Request $request)
    {
        $userId = Auth::id();
        $addressId = session('checkout_address_id');
        $paymentMethod = session('checkout_payment_method');

        if (!$addressId || !$paymentMethod) {
            return redirect()->route('cart.index')->with('error', 'Silakan lengkapi proses checkout');
        }

        DB::beginTransaction();
        try {
            // Get checkout data based on type
            if (session('checkout_type') === 'buy_now') {
                $checkoutItems = session('checkout_items');
                $cartTotal = collect($checkoutItems)->sum('subtotal');
                $items = collect(array_map(fn($item) => (object)$item, $checkoutItems));
            } else {
                $cart = $this->cartRepository->getUserCart($userId);
                $cartTotal = $this->cartRepository->getCartTotal($userId);
                $items = $cart->cartitems;
            }

            // Create transaction
            $transaction = Transaction::create([
                'user_id' => $userId,
                'address_id' => $addressId,
                'total' => $cartTotal,
                'payment_status' => 'pending',
                'order_status' => 'pending'
            ]);

            // Create order items
            foreach ($items as $item) {
                // Handle both cart items and buy now items
                $productId = $item->product_id ?? $item->product->id;
                $vendorId = isset($item->product) && is_object($item->product) ? $item->product->vendor_id : $item->vendor_id;

                Orderitems::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'vendor_id' => $vendorId,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'subtotal' => $item->subtotal
                ]);
            }

            // Clear cart only if this was a cart checkout
            if (session('checkout_type') === 'cart') {
                $cart->cartitems()->delete();
            }

            // Clear all checkout session data
            session()->forget(['checkout_address_id', 'checkout_payment_method', 'checkout_type', 'checkout_items']);

            DB::commit();

            return redirect()->route('checkout.success', ['transaction' => $transaction->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Display the cart
     */
    public function index()
    {
        $userId = Auth::id();
        $cart = $this->cartRepository->getUserCart($userId);
        $cartTotal = $this->cartRepository->getCartTotal($userId);

        return view('keranjang.keranjang_belanja_dynamic', compact('cart', 'cartTotal'));
    }

    /**
     * Add item to cart
     */
    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'attributes' => 'nullable|array'
            ]);

            $userId = Auth::id();
            $product = \App\Models\Product::findOrFail($request->product_id);

            // Find variant based on selected attributes
            $variant = null;

            if ($request->has('attributes') && is_array($request->attributes)) {
                // Get selected attribute value IDs
                $selectedValueIds = array_values($request->attributes);

                // Find variant that matches all selected attribute values
                $variants = $product->variants()->with('attributeValues')->get();

                foreach ($variants as $v) {
                    $variantValueIds = $v->attributeValues->pluck('id')->toArray();

                    // Check if this variant has exactly the same attribute values
                    if (
                        count($selectedValueIds) === count($variantValueIds) &&
                        empty(array_diff($selectedValueIds, $variantValueIds))
                    ) {
                        $variant = $v;
                        break;
                    }
                }
            } else {
                // If no attributes selected, get first variant or create default
                $variant = $product->variants()->first();
            }

            // If no variant exists or found, create a default one
            if (!$variant) {
                $variant = \App\Models\Productvariant::create([
                    'product_id' => $product->id,
                    'sku' => 'DEFAULT-' . $product->id,
                    'price' => $product->price,
                    'stock' => $product->stock ?? 999,
                    'imagevariant' => null
                ]);
            }

            $this->cartRepository->addItem(
                $userId,
                $request->product_id,
                $variant->id,
                $request->quantity
            );

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang! 🛒');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity(Request $request, $cartItemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $this->cartRepository->updateItemQuantity($cartItemId, $request->quantity);

        return response()->json([
            'success' => true,
            'message' => 'Jumlah berhasil diupdate'
        ]);
    }

    /**
     * Remove item from cart
     */
    public function removeItem($cartItemId)
    {
        $this->cartRepository->removeItem($cartItemId);

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
    }
}

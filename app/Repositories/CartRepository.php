<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Productvariant;
use App\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    protected $cart;
    protected $cartItem;

    public function __construct(Cart $cart, Cartitem $cartitem)
    {
        $this->cart = $cart;
        $this->cartItem = $cartitem;
    }

    public function getUserCart($id)
    {
        return $this->cart->where('user_id', $id)->with(['cartitems.product.images', 'cartitems.variant'])->first();
    }

    public function getOrCreateCart($id)
    {
        return $this->cart->firstOrCreate(['user_id' => $id]);
    }

    public function addItem($userId, $productId, $variantId, $quantity)
    {
        $cart = $this->getOrCreateCart($userId);
        $variant = Productvariant::findOrFail($variantId);

        // Check if item already exists in cart
        $existingItem = $this->cartItem->where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->where('variant_id', $variantId)
            ->first();

        if ($existingItem) {
            // Update quantity
            $newQuantity = $existingItem->quantity + $quantity;
            $existingItem->update([
                'quantity' => $newQuantity,
                'subtotal' => $variant->price * $newQuantity
            ]);
            return $existingItem;
        }

        // Create new cart item
        return $this->cartItem->create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'variant_id' => $variantId,
            'quantity' => $quantity,
            'price' => $variant->price,
            'subtotal' => $variant->price * $quantity
        ]);
    }

    public function removeItem($cartItemId)
    {
        $cartItem = $this->cartItem->findOrFail($cartItemId);
        return $cartItem->delete();
    }

    public function getCartTotal($userId)
    {
        $cart = $this->getUserCart($userId);

        if (!$cart) {
            return 0;
        }

        return $cart->cartitems()->sum('subtotal');
    }

    public function updateItemQuantity($cartItemId, $quantity)
    {
        $cartItem = $this->cartItem->findOrFail($cartItemId);

        $cartItem->update([
            'quantity' => $quantity,
            'subtotal' => $cartItem->price * $quantity
        ]);

        return $cartItem;
    }
}

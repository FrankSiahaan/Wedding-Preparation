<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
    public function getUserCart($id);
    public function getOrCreateCart($id);
    public function addItem($userId, $productId, $variantId, $quantity);
    public function removeItem($cartItemId);
    public function getCartTotal($userId);
    public function updateItemQuantity($cartItemId, $quantity);
}

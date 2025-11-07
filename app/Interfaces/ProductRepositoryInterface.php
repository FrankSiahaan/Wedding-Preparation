<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function getDetailProductById($id);
    public function getProductByVendor($vendorId);
    public function getProductBySearch($search);
    public function getProductByFilter($filter);
    public function getRelatedProduct($productId);
    public function getFeaturedProduct();
    public function createProduct(array $data);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
    public function updateRating($productId);
    public function updateStock($productId, $variantId, $quantity);
}

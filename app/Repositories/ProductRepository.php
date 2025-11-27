<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    //sesuaikan dengan model yang digunakan
    protected $product;

    //menyesuaikan model yang digunakan juga
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {

        return $this->product->with('images')->get();
    }

    public function getById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function getDetailProductById($id)
    {
        return $this->product->with([
            'vendor.products.orderitems',
            'category',
            'variants.attributeValues.attribute',
            'images',
            'reviews.user',
            'attributes.values',
            'orderitems'
        ])->findOrFail($id);
    }

    public function getProductByVendor($vendorId)
    {
        return $this->product->where('vendor_id', $vendorId)->with(['images'])->get();
    }

    public function getProductBySearch($search)
    {
        return $this->product->where('name', 'like', '%' . $search . '%')->with('images')->get();
    }

    public function getProductByFilter($filter)
    {
        $query = $this->product->query()->with(['images', 'vendor']);

        if (!empty($filter['kategori'])) {
            $query->where('category_id', $filter['kategori']);
        }

        if (!empty($filter['lokasi'])) {
            $query->whereHas('vendor', function ($q) use ($filter) {
                $q->where('address', 'like', '%' . $filter['lokasi'] . '%');
            });
        }

        if (!empty($filter['min_price'])) {
            $query->where('price', '>=', $filter['min_price']);
        }

        if (!empty($filter['max_price'])) {
            $query->where('price', '<=', $filter['max_price']);
        }

        return $query->get();
    }

    public function getRelatedProduct($productId)
    {
        $product = $this->getById($productId);

        return $this->product->where('category_id', $product->category_id)
            ->where('id', '!=', $productId)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getFeaturedProduct()
    {
        //
    }

    public function createProduct(array $data)
    {
        return $this->product->create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = $this->getById($id);
        return $product->update($data);
    }

    public function deleteProduct($id)
    {
        $product = $this->getById($id);
        return $product->delete();
    }

    public function updateRating($productId)
    {
        $product = $this->getById($productId);
        $avgRating = $product->reviews()->avg('rating');
        $totalReviews = $product->reviews()->count();

        $product->update([
            'avg_rating' => $avgRating,
            'total_review' => $totalReviews
        ]);

        return $product;
    }

    public function updateStock($productId, $variantId, $quantity)
    {
        $product = $this->getById($productId);
        $variant = $product->variants()->find($variantId);

        if ($variant) {
            $variant->decrement('stock', $quantity);
            return true;
        }

        return false;
    }
}

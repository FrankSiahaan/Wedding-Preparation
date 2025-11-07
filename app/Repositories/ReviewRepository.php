<?php

namespace App\Repositories;

use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface
{
    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function getByProduct($productId)
    {
        return $this->review->where('product_id', $productId)->get();
    }

    public function getById($id)
    {
        return $this->review->where('id', $id)->get();
    }

    public function create(array $data)
    {
        return $this->review->create($data);
    }

    public function update($id, array $data)
    {
        $review = $this->getById($id);
        return $review->update($data);
    }

    public function delete($id)
    {
        $review = $this->getById($id);
        return $review->delete($id);
    }
}

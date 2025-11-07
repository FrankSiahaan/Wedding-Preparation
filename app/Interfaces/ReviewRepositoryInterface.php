<?php

namespace App\Interfaces;

interface ReviewRepositoryInterface
{
    public function getByProduct($productId);
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

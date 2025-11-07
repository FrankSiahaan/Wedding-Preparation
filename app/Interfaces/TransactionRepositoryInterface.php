<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getUserTransactions($userId);
    public function getById($id);
    public function updatePaymentStatus($id, $status);
    public function updateOrderStatus($id, $status);
    public function create(array $data);
    public function update($id, array $data);
}

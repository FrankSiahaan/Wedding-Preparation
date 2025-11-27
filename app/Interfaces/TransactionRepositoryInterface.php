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
    public function saveTransactionDataToSession(array $data);
    public function getTransactionDataFromSession();
    public function saveTransaction(array $data);
}

<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getUserTransactions($userId)
    {
        return $this->transaction->where('user_id', $userId)
            ->with(['address', 'orderItems'])->get();
    }

    public function getById($id)
    {
        return $this->transaction->findOrFail($id);
    }

    public function updatePaymentStatus($id, $status)
    {
        $transaction = $this->getById($id);
        $transaction->update(['payment_status' => $status]);
        return $transaction;
    }

    public function updateOrderStatus($id, $status)
    {
        $transaction = $this->getById($id);
        $transaction->update(['oder_status' => $status]);
        return $transaction;
    }

    public function create(array $data)
    {
        return $this->transaction->create($data);
    }

    public function update($id, array $data)
    {
        $transaction = $this->getById($id);
        $transaction->update($data);
        return $transaction;
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\VendorRepositoryInterface;
use App\Models\Vendor;

class VendorRepository implements VendorRepositoryInterface
{
    protected $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function getById($id)
    {
        return $this->vendor->where('vendor_id', $id)->get();
    }
}

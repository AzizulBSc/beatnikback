<?php

namespace App\Repositories;

use App\Models\Mechanic;
// use App\Models\Customer;
use App\Repositories\Interface\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Mechanic::latest()->paginate(10);
    }
    public function store($data)
    {
        Mechanic::create($data);
    }
}

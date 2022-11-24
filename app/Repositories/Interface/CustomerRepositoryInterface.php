<?php

namespace App\Repositories\Interface;

interface CustomerRepositoryInterface
{
    public function all();
    public function store($data);
}

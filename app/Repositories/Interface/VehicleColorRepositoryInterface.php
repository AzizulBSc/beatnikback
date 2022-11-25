<?php

namespace App\Repositories\Interface;

interface VehicleColorRepositoryInterface
{
    public function all();
    public function store($data);
    public function find($id);
    public function update($data, $id);
    public function delete($id);
}

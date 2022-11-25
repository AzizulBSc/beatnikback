<?php

namespace App\Repositories;

use App\Models\VehicleBrand;
use App\Repositories\Interface\VehicleBrandRepositoryInterface;
use Exception;

class VehicleBrandRepository implements VehicleBrandRepositoryInterface
{
    public function all()
    {
        return VehicleBrand::latest()->paginate(30);
    }
    public function store($data)
    {
        $VehicleBrand = VehicleBrand::create([
            'name' => $data['name'],
            'image' => 'image.jpg'
        ]);

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehiclebrand/', $image_new_name);
            $VehicleBrand->image = '/storage/vehiclebrand/' . $image_new_name;
        } catch (Exception $e) {
        }
        $VehicleBrand->save();
    }

    public function find($id)
    {
        return VehicleBrand::find($id);
    }

    public function update($data, $id)
    {
        $VehicleBrand = VehicleBrand::find($id);
        $VehicleBrand->name = $data['name'];

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehiclebrand/', $image_new_name);
            $VehicleBrand->image = '/storage/vehiclebrand/' . $image_new_name;
        } catch (Exception $e) {
        }

        $VehicleBrand->save();
    }
    public function delete($id)
    {
        $res = VehicleBrand::destroy($id);
    }
}

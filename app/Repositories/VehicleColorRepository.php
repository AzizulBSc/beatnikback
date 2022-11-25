<?php

namespace App\Repositories;

use App\Models\VehicleColor;
use App\Repositories\Interface\VehicleColorRepositoryInterface;
use Exception;

class VehicleColorRepository implements VehicleColorRepositoryInterface
{
    public function all()
    {
        return VehicleColor::latest()->paginate(30);
    }
    public function store($data)
    {
        $VehicleColor = VehicleColor::create([
            'name' => $data['name'],
            'image' => 'image.jpg'
        ]);

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehiclecolor/', $image_new_name);
            $VehicleColor->image = '/storage/vehiclecolor/' . $image_new_name;
        } catch (Exception $e) {
        }
        $VehicleColor->save();
    }

    public function find($id)
    {
        return VehicleColor::find($id);
    }

    public function update($data, $id)
    {
        $VehicleColor = VehicleColor::find($id);
        $VehicleColor->name = $data['name'];

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehiclecolor/', $image_new_name);
            $VehicleColor->image = '/storage/vehiclecolor/' . $image_new_name;
        } catch (Exception $e) {
        }

        $VehicleColor->save();
    }
    public function delete($id)
    {
        $res = VehicleColor::destroy($id);
    }
}

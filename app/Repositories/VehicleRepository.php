<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\Interface\VehicleRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Servicereq;

class VehicleRepository implements VehicleRepositoryInterface
{
    public function all()
    {
        if (Auth::user()->role == 1) {
            return Vehicle::latest()->with('owner', 'brand', 'color', 'category')->paginate(30);
        } else {
            $customer = Customer::select('id')->where('user_id', Auth::user()->id)->first();
            return Vehicle::latest()->where('customer_id', $customer->id)->with('owner', 'brand', 'color', 'category')->paginate(30);
        }
    }
    public function store($data)
    {

        $Vehicle = Vehicle::create([
            'model' => $data['model'],
            'name' => $data['name'],
            'customer_id' => $data['customer_id'],
            'vehicle_color_id' => $data['vehicle_color_id'],
            'vehicle_brand_id' => $data['vehicle_brand_id'],
            'vehicle_category_id' => $data['vehicle_category_id'],
            'engin_num' => $data['engin_num'],
            'num_plate' => $data['num_plate'],
            'model_year' => $data['model_year'],
            'chasis_num' => $data['chasis_num'],
            'image' => 'image.jpg'
        ]);
        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehicle/', $image_new_name);
            $Vehicle->image = '/storage/vehicle/' . $image_new_name;
        } catch (Exception $e) {
        }
        $Vehicle->save();
    }

    public function find($id)
    {
        return Vehicle::find($id);
    }

    public function update($data, $id)
    {





        $Vehicle = Vehicle::find($id);
        $Vehicle->model = $data['model'];
        $Vehicle->name = $data['name'];
        $Vehicle->customer_id = $data['customer_id'];
        $Vehicle->vehicle_color_id = $data['vehicle_color_id'];
        $Vehicle->vehicle_category_id = $data['vehicle_category_id'];
        $Vehicle->engin_num = $data['engin_num'];
        $Vehicle->num_plate = $data['num_plate'];
        $Vehicle->vehicle_brand_id = $data['vehicle_brand_id'];
        $Vehicle->chasis_num = $data['chasis_num'];
        $Vehicle->model_year = $data['model_year'];

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/vehicle/', $image_new_name);
            $Vehicle->image = '/storage/vehicle/' . $image_new_name;
        } catch (Exception $e) {
        }

        $Vehicle->save();
    }
    public function delete($id)
    {
        $res = Vehicle::destroy($id);
    }
}

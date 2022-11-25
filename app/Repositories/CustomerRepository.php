<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interface\CustomerRepositoryInterface;
use Exception;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::latest()->paginate(30);
    }
    public function store($data)
    {
        $customer = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
            'image' => 'image.jpg'
        ]);

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $customer->image = '/storage/customer/' . $image_new_name;
        } catch (Exception $e) {
        }
        $customer->save();
    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function update($data, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $data['name'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];
        $customer->dob = $data['dob'];
        $customer->gender = $data['gender'];
        $customer->country = $data['country'];
        $customer->state = $data['state'];
        $customer->city = $data['city'];
        $customer->address = $data['address'];

        try {
            $image = $data['image'];
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $customer->image = '/storage/customer/' . $image_new_name;
        } catch (Exception $e) {
        }

        $customer->save();
    }
    public function delete($id){
        $res = Customer::destroy($id);
    }
}

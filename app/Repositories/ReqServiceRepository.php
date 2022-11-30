<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Servicereq;
use App\Models\Reqserviceid;
use App\Repositories\Interface\ReqServiceRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReqServiceRepository implements ReqServiceRepositoryInterface
{
    public function all()
    {
        if (Auth::user()->role == 1) {
            return Servicereq::latest()->with('req_service_list.service', 'vehicle', 'owner')->paginate(30);
        } else {
            $customer = Customer::select('id')->where('user_id', Auth::user()->id)->first();
            return Servicereq::where('customer_id', $customer->id)->with('req_service_list.service', 'vehicle', 'owner')->paginate(30);
        }
    }
    public function store($data)
    {

        $req_service_id = explode(",", $data['service_id']);

        if (array_key_exists('mechanic_id', $data)) $mechanic_id = $data['mechanic_id'];
        else $mechanic_id = null;
        if (array_key_exists('paid', $data)) $paid = $data['paid'];
        else $paid = 0;
        if (array_key_exists('status', $data)) $status = $data['status'];
        else $status = 1;

        $servicereq = Servicereq::create([
            'vehicle_id' => $data['vehicle_id'],
            'customer_id' => $data['customer_id'],
            'payment' => $data['payment'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
            'mechanic_id' => $mechanic_id,
            'paid' => $paid,
            'status' => $status,
        ]);

        $servicereq->save();
        $id = $servicereq->id;
        for ($i = 0; $i < count($req_service_id); $i++) {
            Reqserviceid::create(['servicereq_id' => $id, 'service_id' => $req_service_id[$i]]);
        }
    }

    public function find($id)
    {
        return Servicereq::with('req_service_list.service', 'mechanic', 'owner')->find($id);
    }

    public function update($data, $id)
    {

        $req_service_id = explode(",", $data['service_id']);

        // $servicereq = Servicereq::create([
        //     'vehicle_id' => $data['vehicle_id'],
        //     'customer_id' => $data['customer_id'],
        //     'mechanic_id' => $data['mechanic_id'],
        //     'deadline' => $data['deadline'],
        //     'payment' => $data['payment'],
        //     'paid' => $data['paid'],
        //     'status' => $data['status'],
        //     'description' => $data['description']
        // ]);

        if (array_key_exists('mechanic_id', $data)) $mechanic_id = $data['mechanic_id'];
        else $mechanic_id = null;
        if (array_key_exists('paid', $data)) $paid = $data['paid'];
        else $paid = 0;
        if (array_key_exists('status', $data)) $status = $data['status'];
        else $status = 1;


        $servicereq = Servicereq::find($id);
        $servicereq->vehicle_id = $data['vehicle_id'];
        $servicereq->customer_id = $data['customer_id'];
        $servicereq->mechanic_id = $mechanic_id;
        $servicereq->deadline = $data['deadline'];
        $servicereq->payment = $data['payment'];
        $servicereq->paid = $paid;
        $servicereq->status = $status;
        $servicereq->description = $data['description'];
        $servicereq->save();
        DB::table('reqserviceids')->where('servicereq_id', $id)->delete();
        for ($i = 0; $i < count($req_service_id); $i++) {
            Reqserviceid::create(['servicereq_id' => $id, 'service_id' => $req_service_id[$i]]);
        }
    }
    public function delete($id)
    {
        DB::table('reqserviceids')->where('servicereq_id', $id)->delete();
        $res = Servicereq::destroy($id);
    }
}

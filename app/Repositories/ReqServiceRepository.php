<?php

namespace App\Repositories;

use App\Models\Servicereq;
use App\Models\Reqserviceid;
use App\Repositories\Interface\ReqServiceRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class ReqServiceRepository implements ReqServiceRepositoryInterface
{
    public function all()
    {
        return Servicereq::latest()->with('vehicle', 'owner')->paginate(30);
    }
    public function store($data)
    {

        $req_service_id = explode(",", $data['service_id']);
        $servicereq = Servicereq::create([
            'vehicle_id' => $data['vehicle_id'],
            'customer_id' => $data['customer_id'],
            'mechanic_id' => $data['mechanic_id'],
            'deadline' => $data['deadline'],
            'payment' => $data['payment'],
            'paid' => $data['paid'],
            'status' => $data['status'],
            'description' => $data['description']
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



        $servicereq = Servicereq::find($id);
        $servicereq->vehicle_id = $data['vehicle_id'];
        $servicereq->customer_id = $data['customer_id'];
        $servicereq->mechanic_id = $data['mechanic_id'];
        $servicereq->deadline = $data['deadline'];
        $servicereq->payment = $data['payment'];
        $servicereq->paid = $data['paid'];
        $servicereq->status = $data['status'];
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

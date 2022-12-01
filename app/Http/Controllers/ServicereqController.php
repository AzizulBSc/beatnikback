<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Servicereq;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\Interface\ReqServiceRepositoryInterface;
use Session;
use Illuminate\Support\Facades\Auth;


class ServicereqController extends Controller
{
    private $service_req;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ReqServiceRepositoryInterface $req_service_repository)
    {
        $this->service_req = $req_service_repository;
    }


    public function index()
    {
        $servicereqs = $this->service_req->all();
        return view('admin.servicereq.index', compact('servicereqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        if (Auth::user()->role == 0) {
            $customers = Customer::where('user_id', Auth::user()->id)->get();
        }
        $mechanics = Mechanic::all();
        $services = Service::all();
        return view('admin.servicereq.create', compact('customers', 'mechanics', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'service_id' => 'required'
        ]);
        $this->service_req->store($request->all());
        Session::flash('success', 'Service Requested Successfully');
        return redirect('/servicereq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicereq  $servicereq
     * @return \Illuminate\Http\Response
     */
    public function show(servicereq $servicereq)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicereq  $servicereq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicereq = $this->service_req->find($id);
        $customers = Customer::all();
        if (Auth::user()->role == 0) {
            $customers = Customer::where('user_id', Auth::user()->id)->get();
        }
        $mechanics = Mechanic::all();
        $services = Service::all();
        return view('admin.servicereq.edit', compact('servicereq', 'customers', 'mechanics', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicereq  $servicereq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->service_req->update($request->all(), $id);

        Session::flash('success', 'servicereq Updated successfully');
        return redirect('/servicereq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicereq  $servicereq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $this->service_req->delete($id);
        Session::flash('Service Request Deleted Successfully');
        return redirect('/servicereq');
    }


    public function invoice($id)
    {

        $servicereq = $this->service_req->find($id);
        return view('admin.servicereq.invoice', compact('servicereq'));
    }
}
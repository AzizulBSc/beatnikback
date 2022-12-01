<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicereq;
use App\Models\Reqserviceid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $servicereqs = Servicereq::latest()->with('req_service_list.service', 'vehicle', 'owner')->paginate(30);
        } else {
            $customer = Customer::select('id')->where('user_id', Auth::user()->id)->first();
            if ($customer) {
                $id = $customer->id;
            } else {
                $id = 0;
            }

            $servicereqs = Servicereq::where('customer_id', $id)->with('req_service_list.service', 'vehicle', 'owner')->paginate(30);
        }
        return view('home', compact('servicereqs'));
    }
}
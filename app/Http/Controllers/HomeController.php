<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicereq;
use App\Models\Reqserviceid;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Mail;

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
        $otp = rand(1000, 9999);
        $send_mail = Auth::user()->email;
        $id = Auth::user()->id;
        $user = User::where('id', $id)->update(['remember_token' => $otp]);
        $data = [$otp];
        Mail::to($send_mail)->send(new SendMail($data));
        $message = "An OTP Sent To " . $send_mail;
        $alert = "alert-success";
        return view('auth.otp', compact('message', 'alert'));
    }

    public function otp_verify(Request $request)
    {
        $otp = Auth::user()->remember_token;
        if ($request->otp == $otp) {
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
        } else {
            $message = "Please Enter Valid OTP";
            $alert = "alert-danger";
            return view('auth.otp', compact('message', 'alert'));
        }
    }
    public function index1()
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
<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Faq;
use App\Models\Interest;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Mechanic;
use Exception;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


    public function index()
    {
        $sliders =  Slider::latest()->get();
        $services =  Service::latest()->get();
        $mechanics =  Mechanic::latest()->get();
        return view('frontend.welcome', compact(
            'sliders',
            'mechanics',
            'services'
        ));
    }
    public function getproducts()
    {
        $products = Product::latest()->get();
        return view('frontend.products', compact(
            'products'
        ));
    }


    public function getservices()
    {
        $services =  Service::latest()->get();
        return view('frontend.services', compact(
            'services'
        ));
    }


    public function getmechanics()
    {

        $mechanics =  Mechanic::latest()->get();
        return view('frontend.mechanics', compact(
            'mechanics'
        ));
    }
    public function about()
    {
        $services =  Service::latest()->get();
        $mechanics =  Mechanic::latest()->get();
        return view('frontend.about', compact(
            'mechanics',
            'services'
        ));
    }
}
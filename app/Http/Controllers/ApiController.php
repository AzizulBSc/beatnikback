<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Faq;
use App\Models\Interest;
use App\Models\Product;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getproducts()
    {
        return Product::all();
    }
    public function getInterest($duration, $bankid)
    {
        try{
        $interest = Interest::where('duration', $duration)->where('bankid', $bankid)->first();
        return $interest;
        }
        catch(Exception $e){
        return $e;
        }
    }
    public function getproduct($id)
    {

        return Product::findOrFail($id);
    }
    public function getsliders()
    {
        return Slider::all();
    }
    public function getfaqs()
    {
        return Faq::all();
    }
    public function getbanks()
    {
        return Bank::orderBy('code', 'ASC')->with('interest')->get();
    }
    public function getinterests()
    {
        return Interest::all();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleColor;
use Illuminate\Http\Request;
use App\Repositories\Interface\VehicleRepositoryInterface;
use  Session;

class VehicleController extends Controller
{

    private $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = $this->vehicleRepository->all();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $colors = VehicleColor::all();
        $brands = VehicleBrand::all();
        $category = VehicleCategory::all();
        return view('admin.vehicle.create', compact('customers', 'colors', 'brands', 'category'));
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
            'vehicle_color_id' => 'required',
            'vehicle_brand_id' => 'required',
            'vehicle_category_id' => 'required',
            'engin_num' => 'required',
            'chasis_num' => 'required',
            'num_plate' => 'required',
            'model_year' => 'required',
            'num_plate' => 'required',
            'image' => 'required',
        ]);

        $this->vehicleRepository->store($request->all());
        Session::flash('success', 'Vehicle Added successfully');
        return redirect('/vehicle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vehicle::where('customer_id', $id)->get();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->find($id);
        $customers = Customer::all();
        $colors = VehicleColor::all();
        $brands = VehicleBrand::all();
        $category = VehicleCategory::all();
        return view('admin.vehicle.edit', compact('customers', 'vehicle', 'colors', 'brands', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->vehicleRepository->update($request->all(), $id);

        Session::flash('success', 'Vehicle Updated successfully');
        return redirect('/vehicle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $this->vehicleRepository->delete($id);
        Session::flash('Vehicle deleted successfully');
        return redirect('/vehicle');
    }
}

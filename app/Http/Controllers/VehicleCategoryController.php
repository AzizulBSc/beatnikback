<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use Illuminate\Http\Request;

use Session;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $VehicleCategory = VehicleCategory::orderBy('created_at', 'DESC')->paginate(30);
        return view('admin.vehicleCat.index', compact('VehicleCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicleCat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $VehicleCategory = VehicleCategory::create([
            'category' => $request->category,
            'status' => $request->status
        ]);

        $VehicleCategory->save();
        Session::flash('success', 'Vehicle Category Added successfully');
        return redirect('/vehicleCat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $VehicleCategory = VehicleCategory::find($id);
        return view('admin.vehicleCat.edit', compact('VehicleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'id' => 'required',
        //     'status' => 'required',
        //     'category' => 'required',
        // ]);

        $VehicleCategory = VehicleCategory::find($id);
        $VehicleCategory->status = $request->status;
        $VehicleCategory->category = $request->category;
        $VehicleCategory->save();
        Session::flash('success', 'Vehicle Category Updated successfully');
        return redirect('/vehicleCat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleCategory  $VehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $res = VehicleCategory::destroy($id);
        Session::flash('VehicleCategory deleted successfully');
        return redirect('/vehicleCat');
    }
}

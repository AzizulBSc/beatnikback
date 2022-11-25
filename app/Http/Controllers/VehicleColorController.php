<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\VehicleColorRepositoryInterface;
use  Session;
use Illuminate\Http\Request;

class VehicleColorController extends Controller
{

    private $vehiclecolorRepository;

    public function __construct(VehicleColorRepositoryInterface $vehiclecolorRepository)
    {
        $this->vehiclecolorRepository = $vehiclecolorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiclecolors = $this->vehiclecolorRepository->all();
        return view('admin.vehiclecolor.index', compact('vehiclecolors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehiclecolor.create');
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
            'name' => 'required',
            'image' => 'required',
        ]);
        $this->vehiclecolorRepository->store($request->all());
        Session::flash('success', 'vehiclecolor Added successfully');
        return redirect('/vehiclecolor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehiclecolor  $vehiclecolor
     * @return \Illuminate\Http\Response
     */
    public function show(vehiclecolor $vehiclecolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehiclecolor  $vehiclecolor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiclecolor = $this->vehiclecolorRepository->find($id);
        return view('admin.vehiclecolor.edit', compact('vehiclecolor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehiclecolor  $vehiclecolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->vehiclecolorRepository->update($request->all(), $id);

        Session::flash('success', 'vehiclecolor Updated successfully');
        return redirect('/vehiclecolor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehiclecolor  $vehiclecolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $this->vehiclecolorRepository->delete($id);
        Session::flash('vehiclecolor deleted successfully');
        return redirect('/vehiclecolor');
    }
}

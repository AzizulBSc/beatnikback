<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\VehicleBrandRepositoryInterface;
use Illuminate\Http\Request;
use  Session;

class VehicleBrandController extends Controller
{

    private $vehiclebrandRepository;

    public function __construct(VehicleBrandRepositoryInterface $vehiclebrandRepository)
    {
        $this->vehiclebrandRepository = $vehiclebrandRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiclebrands = $this->vehiclebrandRepository->all();
        return view('admin.vehiclebrand.index', compact('vehiclebrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehiclebrand.create');
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
        $this->vehiclebrandRepository->store($request->all());
        Session::flash('success', 'vehiclebrand Added successfully');
        return redirect('/vehiclebrand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function show(vehiclebrand $vehiclebrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiclebrand = $this->vehiclebrandRepository->find($id);
        return view('admin.vehiclebrand.edit', compact('vehiclebrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->vehiclebrandRepository->update($request->all(), $id);

        Session::flash('success', 'vehiclebrand Updated successfully');
        return redirect('/vehiclebrand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $this->vehiclebrandRepository->delete($id);
        Session::flash('vehiclebrand deleted successfully');
        return redirect('/vehiclebrand');
    }
}

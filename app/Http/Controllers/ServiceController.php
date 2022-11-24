<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'DESC')->paginate(30);
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'price' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'status' => 'required',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'status' => $request->status,
            'price' => $request->price,
            'image' => 'image.jpg',
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/service/', $image_new_name);
            $service->image = '/storage/service/' . $image_new_name;
            $service->save();
        }
        Session::flash('success', 'Service Added successfully');
        return redirect('/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        // ]);

        $service = Service::find($id);
        $service->name = $request->name;
        $service->status = $request->status;
        $service->price = $request->price;
        $service->description = $request->description;
        // $service->save();

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/service/', $image_new_name);
            $service->image = '/storage/service/' . $image_new_name;
        }
        $service->save();

        Session::flash('success', 'Service Updated successfully');
        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $res = Service::destroy($id);
        Session::flash('Service deleted successfully');
        return redirect('/service');
    }
}

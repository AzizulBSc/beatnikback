<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;
use Session;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::orderBy('created_at', 'DESC')->paginate(30);
        return view('admin.mechanic.index', compact('mechanics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //'name',
        // 'gender',
        // 'salary',
        // 'country',
        // 'state',
        // 'city',
        // 'address'

        $this->validate($request, [
            'name' => 'required',
            'salary' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $mechanic = Mechanic::create([
            'name' => $request->name,
            'status' => $request->status,
            'salary' => $request->salary,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'image' => 'image.jpg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/mechanic/', $image_new_name);
            $mechanic->image = '/storage/mechanic/' . $image_new_name;
        }
        $mechanic->save();
        Session::flash('success', 'Mechanic Added successfully');
        return redirect('/mechanic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $Mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $Mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanic = Mechanic::find($id);
        return view('admin.mechanic.edit', compact('mechanic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mechanic  $Mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        // ]);

        $Mechanic = Mechanic::find($id);
        $Mechanic->name = $request->name;
        $Mechanic->status = $request->status;
        $Mechanic->salary = $request->salary;
        $Mechanic->dob = $request->dob;
        $Mechanic->gender = $request->gender;
        $Mechanic->country = $request->country;
        $Mechanic->state = $request->state;
        $Mechanic->city = $request->city;
        $Mechanic->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/mechanic/', $image_new_name);
            $Mechanic->image = '/storage/mechanic/' . $image_new_name;
        }

        $Mechanic->save();

        Session::flash('success', 'Mechanic Updated successfully');
        return redirect('/mechanic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $Mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $res = Mechanic::destroy($id);
        Session::flash('Mechanic deleted successfully');
        return redirect('/mechanic');
    }
}

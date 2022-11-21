<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use App\Models\Bank;

use Session;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::orderBy('created_at', 'DESC')->with('bank')->paginate(20);
        return view('admin.interest.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $banks = Bank::all();
        return view('admin.interest.create', compact('banks'));
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
            'bankid' => 'required',
            'duration' => 'required',
            'rate' => 'required',
        ]);
        $interest = Interest::create([
            'bankid' => $request->bankid,
            'duration' => $request->duration,
            'rate' => $request->rate,
        ]);
        $interest->save();
        Session::flash('success', 'Interest created successfully');
        return redirect('/interest');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interest = Interest::find($id);
        $banks = Bank::all();
        return view('admin.interest.edit', compact('interest', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bankid' => 'required',
            'duration' => 'required',
            'rate' => 'required',
        ]);
        $interest = Interest::find($id);
        $interest->bankid = $request->bankid;
        $interest->duration = $request->duration;
        $interest->rate = $request->rate;
        $interest->save();
        Session::flash('success', 'Interest Updated successfully');
        return redirect('/interest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $res = Interest::destroy($id);
        Session::flash('Interest deleted successfully');
        return redirect('/interest');
    }
}

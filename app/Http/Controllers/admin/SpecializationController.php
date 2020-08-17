<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.specializations.index')->with('specializations', specialization::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        specialization::create($request->all());
        session()->flash('success', 'Success Adding specialization ' . $request->name);
        return redirect(route('admin.specializations.index'));
    }


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(specialization $specialization)
    {

        return view('admin.specializations.create')->with('specialization', $specialization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialization $specialization)
    {
        $specialization->update($request->all());
        $specialization->save();
        session()->flash('success', 'Success Updating specialization to ' . $request->name);
        return redirect(route('admin.specializations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialization $specialization)
    {
        $specialization->delete();
        session()->flash('success', 'Success Deleting specialization ');
        return redirect(route('admin.specializations.index'));
    }
}

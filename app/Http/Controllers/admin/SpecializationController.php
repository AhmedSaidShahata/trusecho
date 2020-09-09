<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecializationRequest;
use App\specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $specializations =specialization::where('lang',App::getLocale())->get();
        return view('admin.specializations.index')->with('specializations',$specializations );
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
    public function store(SpecializationRequest $request)
    {
        specialization::create($request->all());
        session()->flash('success_en', 'Success Add specialization');
        session()->flash('success_ar', 'تم اضافة التخصص بنجاح');
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
    public function update(SpecializationRequest $request, specialization $specialization)
    {
        $specialization->update($request->all());
        $specialization->save();
        session()->flash('success_en', 'Success Updated specialization');
        session()->flash('success_ar', 'تم تعديل التخصص بنجاح');
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
        session()->flash('success', 'Success Deleted Specialization ');
        session()->flash('success', 'تم حذف التخصص بنجاح ');
        return redirect(route('admin.specializations.index'));
    }
}

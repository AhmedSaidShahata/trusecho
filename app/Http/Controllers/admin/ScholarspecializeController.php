<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarspecializeRequest;
use App\Scholarspecialize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ScholarspecializeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations =Scholarspecialize::where('lang',App::getLocale())->paginate(10);
        return view('admin.specializations_scholar.index')->with('specializations',$specializations );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specializations_scholar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarspecializeRequest $request)
    {
        Scholarspecialize::create($request->all());
        session()->flash('success_en', 'Success Add specialization');
        session()->flash('success_ar', 'تم اضافة التخصص بنجاح');
        return redirect(route('admin.scholarspecializes.index'));
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
    public function edit(Scholarspecialize $scholarspecialize)
    {
        return view('admin.specializations_scholar.create')->with('specialization',$scholarspecialize);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Scholarspecialize $scholarspecialize)
    {



        $scholarspecialize->update($request->all());
        $scholarspecialize->save();
        session()->flash('success_en', 'Success Updated specialization');
        session()->flash('success_ar', 'تم تعديل التخصص بنجاح');
        return redirect(route('admin.scholarspecializes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarspecialize $scholarspecialize)
    {
        $scholarspecialize->delete();
        session()->flash('success', 'Success Deleted Specialization ');
        session()->flash('success', 'تم حذف التخصص بنجاح ');
        return redirect(route('admin.scholarspecializes.index'));
    }
}

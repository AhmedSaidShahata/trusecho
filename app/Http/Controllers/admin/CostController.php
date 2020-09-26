<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\CostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs=Cost::where('lang',App::getLocale())->orderBy('created_at','desc')->paginate(10);
        return view('admin.costs.index')->with('costs',$costs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.costs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostRequest $request)
    {

        Cost::create($request->all());
        session()->flash('success_en', 'Success Added Cost ');
        session()->flash('success_ar', 'تم اضافة التكلفة بنجاح');
        return redirect(route('admin.costs.index'));
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
    public function edit(Cost $cost)
    {
        return view('admin.costs.create')->with('cost', $cost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CostRequest $request, Cost $cost)
    {
        $cost->update($request->all());
        $cost->save();
        session()->flash('success_en', 'Success Updated Cost ');
        session()->flash('success_ar', 'تم تعديل التكلفة بنجاح');
        return redirect(route('admin.costs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cost $cost)
    {
        $cost->delete();
        session()->flash('success_en', 'Success Deleted Cost ');
        session()->flash('success_ar', 'تم حذف التكلفة بنجاح');
        return redirect(route('admin.costs.index'));
    }
}

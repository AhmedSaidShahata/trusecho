<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\CostRequest;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.costs.index')->with('costs', Cost::all());
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
        session()->flash('success', 'Success Adding Cost ' . $request->name);
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
        session()->flash('success', 'Success Updating Cost to ' . $request->name);
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
        session()->flash('success', 'Success Deleting Cost ' );
        return redirect(route('admin.costs.index'));
    }
}

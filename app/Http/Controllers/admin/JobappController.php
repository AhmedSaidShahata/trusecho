<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobapp;
use Illuminate\Http\Request;

class JobappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobsapps=Jobapp::orderBy('created_at','desc')->paginate(10);
        return view('admin.job-applications.index')->with('jobapps',$jobsapps );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jobapp $jobapp)
    {
        $jobapp->seen = '1' ;
        $jobapp->save();

        return view('admin.job-applications.show',[
           'jobapp'=> $jobapp
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobapp $jobapp)
    {
        $jobapp->delete();
        session()->flash('success', 'job Application deleted successfully');
        return redirect(route('admin.jobapps.index'));
    }
}

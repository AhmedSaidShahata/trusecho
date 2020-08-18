<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Jobapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // echo '<br>';

        // //Display File Extension
        // echo 'File Extension: '.$file->getClientOriginalExtension();
        // echo '<br>';

        // //Display File Real Path
        // echo 'File Real Path: '.$file->getRealPath();
        // echo '<br>';

        // //Display File Size
        // echo 'File Size: '.$file->getSize();
        // echo '<br>';

        // //Display File Mime Type
        // echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $file = $request->file('cv');
        $cv =$file->getClientOriginalName();
        $destinationPath = public_path().'/files';
        $file->move($destinationPath,$file->getClientOriginalName());

        Jobapp::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'message'=>$request->message,
            'phone'=>$request->phone,
            'cv'=>$cv,
            'user_id'=>Auth::user()->id,
            'job_id'=>$request->job_id
        ]);

        return redirect()->back();

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
    public function destroy($id)
    {
        //
    }
}

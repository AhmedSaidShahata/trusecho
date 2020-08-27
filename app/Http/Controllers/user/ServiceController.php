<?php

namespace App\Http\Controllers\user;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Job;
use App\Language;
use App\Service;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.services.services', [
            'services' => Service::paginate(10),
            'costs' => Cost::all(),
            'types' => Type::all(),
            'specializations' => specialization::all(),
            'languages' => Language::all()

        ]);
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
    public function show(Service $service)
    {

        return view('user.services.single-service-page', ['service' => $service]);
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
    public function search(Request $request)
    {
        $services = Service::where($request->all())->get();

        return view('user.services.services', [
            'services' => $services,
            'costs' => Cost::all(),
            'types' => Type::all(),
            'specializations' => specialization::all(),
            'languages' => Language::all()
        ]);
    }
}

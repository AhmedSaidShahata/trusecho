<?php

namespace App\Http\Controllers\user;

use App\Bestjob;
use App\Bestorganization;
use App\Bestscholar;
use App\Bestservice;
use App\CategoryBlog;
use App\Cost;
use App\Friend;
use App\Http\Controllers\Controller;

use App\Organization;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view('user.home-page.home-page-signed',
         [
           'scholarships'=>Bestscholar::where('lang',App::getLocale())->get(),
          'jobs' => Bestjob::where('lang',App::getLocale())->get(),
          'costs' => Cost::where('lang',App::getLocale())->get(),
          'services'=>Bestservice::where('lang',App::getLocale())->get(),
          'categories'=>CategoryBlog::where('lang',App::getLocale())->get(),
          'organizations'=>Bestorganization::where('lang',App::getLocale())->get()
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

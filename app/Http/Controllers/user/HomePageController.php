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
use App\Job;
use App\Opportunity;
use App\Organization;
use App\Scholarship;
use App\Testiomonial;
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



        return view(
            'user.home-page.home-page-signed',
            [
            
                'scholarships' => Bestscholar::where('lang', App::getLocale())->get(),
                'jobs' => Bestjob::where('lang', App::getLocale())->get(),
                'costs' => Cost::where('lang', App::getLocale())->get(),
                'services' => Bestservice::where('lang', App::getLocale())->get(),
                'categories' => CategoryBlog::where([
                    'lang' => App::getLocale(),
                    'status' => 1
                ])->get(),
                'organizations' => Bestorganization::where('lang', App::getLocale())->get(),
                'count_organizations' => Organization::where('lang', App::getLocale())->count(),
                'count_opportunities' => Opportunity::where('lang', App::getLocale())->count(),
                'count_jobs' => Job::where('lang', App::getLocale())->count(),
                'testimonials' => Testiomonial::where('lang', App::getLocale())->orderBy('created_at', 'desc')->get()
            ]
        );
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

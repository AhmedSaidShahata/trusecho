<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\CategoryBlog;
use App\Contact;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Job;
use App\Jobapp;
use App\Opportunity;
use App\Organization;
use App\Reportjob;
use App\Reportservice;
use App\Scholarship;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StatiticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statitics.index',[
            'count_new_contacts'=>Contact::where('seen','No')->get()->count(),
            'count_all_contacts'=>Contact::all()->count(),
            'count_all_users'=>User::all()->count(),
            'count_all_blogs'=>Blog::where('lang',App::getLocale())->get()->count(),
            'count_all_categories'=>CategoryBlog::where('lang',App::getLocale())->get()->count(),
            'count_all_jobs'=>Job::where('lang',App::getLocale())->get()->count(),
            'count_all_scholarships'=>Scholarship::where('lang',App::getLocale())->get()->count(),
            'count_all_organizations'=>Organization::where('lang',App::getLocale())->get()->count(),
            'count_all_services'=>Service::where('lang',App::getLocale())->get()->count(),
            'count_all_opportunities'=>Opportunity::where('lang',App::getLocale())->get()->count(),
            'count_all_faq'=>Faq::where('lang',App::getLocale())->get()->count(),
            'count_all_job_reports'=>Reportjob::all()->count(),
            'count_all_service_reports'=>Reportservice::all()->count(),











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

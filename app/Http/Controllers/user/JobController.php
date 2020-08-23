<?php

namespace App\Http\Controllers\user;

use App\Commentjob;
use App\Cost;
use App\Http\Controllers\Controller;
use App\Job;
use App\Language;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.jobs.jobs',[
            'jobs'=>Job::all(),
            'costs'=>Cost::all(),
            'types'=>Type::all(),
            'specializations'=>specialization::all(),
            'languages'=>Language::all()

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
    public function show(Job $job)
    {
        $comment_jobs = $job->comment;

        return view('user.jobs.job-page', ['job' => $job, 'comment_jobs' => $comment_jobs]);
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
        $jobs= Job::where($request->all())->get();

          return view('user.jobs.jobs',[
            'jobs'=>$jobs,
            'costs'=>Cost::all(),
            'types'=>Type::all(),
            'specializations'=>specialization::all(),
            'languages'=>Language::all()
          ]);
    }
}

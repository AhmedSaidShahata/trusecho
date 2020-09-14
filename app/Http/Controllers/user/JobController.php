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
use Illuminate\Support\Facades\App;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.jobs.jobs', [
            'jobs' => Job::paginate(10),
            'specializations' => specialization::where('lang', App::getLocale())->get(),
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

        $data = $request->except('specialization');
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        $picture_company = $request->picture_company->store('images', 'public');
        $data['picture_company'] = $picture_company;

        $check_specialization = specialization::where([
            'lang' => $request->lang,
            'name' => $request->specialization
        ]);

        if ($check_specialization->get()->count() == 0) {

            $specialization =  specialization::create([
                'name' => $request->specialization,
                'lang' => $request->lang,

            ]);
        } else {
            $specialization = $check_specialization->get()->first();
        }

        $data['specialization_id'] = $specialization->id;


        Job::create($data);
        session()->flash('success_en', ' Job created successfully ');
        session()->flash('success_ar', ' تم اضافة الوظيفة بنجاح ');
        return redirect(route('user.jobs.index'));
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
        $jobs = Job::where($request->all())->paginate(10);

        return view('user.jobs.jobs', [
            'jobs' => $jobs,
            'specializations' => specialization::where('lang', App::getLocale())->get()

        ]);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Commentjob;
use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Job;
use App\Language;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('lang', App::getLocale())->get();
        return view('admin.jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::where('lang', App::getLocale())->get();
        $specializations = specialization::where('lang', App::getLocale())->get();
        return view('admin.jobs.create', [

            'types' => $types,
            'specializations' => $specializations,


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $data = $request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        $picture_company = $request->picture_company->store('images', 'public');
        $data['picture_company'] = $picture_company;

        Job::create($data);
        session()->flash('success_en', ' Job created successfully ');
        session()->flash('success_ar', ' تم اضافة الوظيفة بنجاح ');
        return redirect(route('admin.jobs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.create', [
            'job' => $job,
            'types' => Type::all(),
            'specializations' => specialization::all(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($job->picture);
            $data['picture'] = $picture;
        }

        if ($request->hasFile('picture_company')) {
            $picture_company = $request->picture_company->store('images', 'public');
            Storage::disk('public')->delete($job->picture_company);
            $data['picture_company'] = $picture_company;
        }
        $job->update($data);
        session()->flash('success_en', ' Job Updated successfully ');
        session()->flash('success_ar', ' تم تحديث الوظيفة لنجاح ');
        return redirect(route('admin.jobs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        session()->flash('success_en', ' Job Deleted successfully ');
        session()->flash('success_ar', ' تم حذف الوظيفة بنجاح ');
        return redirect(route('admin.jobs.index'));
    }
}

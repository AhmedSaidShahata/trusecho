<?php

namespace App\Http\Controllers\admin;

use App\Commentjob;
use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Http\Request;
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

        return view('admin.jobs.index')->with('jobs', Job::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create')->with('costs',Cost::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $picture = $request->picture->store('images', 'public');

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'picture' => $picture,
            'location' => $request->location,
            'email' => $request->email,
            'deadline' => $request->deadline,
            'heading_details' => $request->heading_details,
            'requirments' => $request->requirments,
            'cost_id'=>$request->cost_id

        ]);
        session()->flash('success', ' Job' . $request->name . 'created successfully ');
        return redirect(route('admin.jobs.index'));
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
    public function edit(Job $job)
    {
        return view('admin.jobs.create', ['job' => $job,'costs'=>Cost::all()]);
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
        $job->update($data);
        session()->flash('success', 'job Updated successfully');
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
        session()->flash('success', 'job deleted successfully');
        return redirect(route('admin.jobs.index'));
    }
}

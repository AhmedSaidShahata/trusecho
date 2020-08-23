<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarshipRequest;
use App\Language;
use App\Scholarship;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.scholarships.index')->with('scholarships', Scholarship::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scholarships.create', [
            'costs' => Cost::all(),
            'types' => Type::all(),
            'specializations' => specialization::all(),
            'languages' => Language::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarshipRequest $request)
    {
        $picture = $request->picture->store('images', 'public');
        $data = $request->all();
        $data['picture'] = $picture;
        Scholarship::create($data);
        session()->flash('success', ' Scholarship created successfully');
        return redirect(route('admin.scholarships.index'));
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
    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarships.create', [
            'scholarship' => $scholarship,
            'costs' => Cost::all(),
            'types' => Type::all(),
            'specializations' => specialization::all(),
            'languages' => Language::all()



        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScholarshipRequest $request, Scholarship $scholarship)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($scholarship->picture);
            $data['picture'] = $picture;
        }
        $scholarship->update($data);
        session()->flash('success', '$scholarship Updated successfully');
        return redirect(route('admin.scholarships.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        session()->flash('success', 'blog deleted successfully');
        return redirect(route('admin.scholarships.index'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarshipRequest;
use App\Language;
use App\Scholarship;
use App\Scholarspecialize;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $scholarships = Scholarship::where('lang', App::getLocale())->orderBy('created_at','desc')->paginate(10);

        return view('admin.scholarships.index')->with('scholarships', $scholarships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costs = Cost::where('lang', App::getLocale())->get();
        $specializations = Scholarspecialize::where('lang', App::getLocale())->get();
        return view('admin.scholarships.create', [
            'costs' => $costs,
            'specializations' => $specializations,

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
        session()->flash('success_en', ' Scholarship created successfully');
        session()->flash('success_ar', ' تم اضافة المنحة بنجاح');
        return redirect(route('admin.scholarships.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show')->with('scholarship',$scholarship);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship $scholarship)
    {


        $costs = Cost::where('lang', App::getLocale())->get();
        $specializations = Scholarspecialize::where('lang', App::getLocale())->get();

        return view('admin.scholarships.create', [
            'scholarship' => $scholarship,
            'costs' => $costs,
            'specializations' =>$specializations,

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
        session()->flash('success_en', ' Scholarship Updated successfully');
        session()->flash('success_ar', ' تم تعديل المنحة بنجاح');
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
        session()->flash('success_en', ' Scholarship Deleted successfully');
        session()->flash('success_ar', ' تم حذف المنحة بنجاح');
        return redirect(route('admin.scholarships.index'));
    }
}

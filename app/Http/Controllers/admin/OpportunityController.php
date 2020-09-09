<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Opportunity;
use App\specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunities = Opportunity::where('lang',App::getLocale())->get();

        return view('admin.opportunities.index',[
            'opportunities'=> $opportunities,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations=specialization::where('lang',App::getLocale())->get();
        return view('admin.opportunities.create',[
            'specializations'=>$specializations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture']=$picture;

        Opportunity::create($data);
        session()->flash('success_en', ' Opportunity Created successfully ');
        session()->flash('success_ar', ' تم اضافة الفرصة بنجاح ');
        return redirect(route('admin.opportunitys.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        return view('admin.opportunities.show', ['opportunity' => $opportunity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        $specializations=specialization::where('lang',App::getLocale())->get();
        return view('admin.opportunities.create', [
            'opportunity' => $opportunity,
            'specializations'=>$specializations

            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($opportunity->picture);
            $data['picture'] = $picture;
        }
        $opportunity->update($data);
        session()->flash('success_en', ' Opportunity Updated successfully ');
        session()->flash('success_ar', ' تم تعديل الفرصة بنجاح ');
        return redirect(route('admin.opportunitys.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Opportunity $opportunity)
    {
        $opportunity->delete();
        session()->flash('success_en', ' Opportunity Deleted successfully ');
        session()->flash('success_ar', ' تم حذف الفرصة بنجاح ');
        return redirect(route('admin.opportunitys.index'));
    }
}

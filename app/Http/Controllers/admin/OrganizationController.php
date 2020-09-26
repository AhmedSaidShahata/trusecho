<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Organization;
use App\Type;
use App\Typeorg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization=Organization::where('lang',App::getLocale())->orderBy('created_at','desc')->paginate(10);
        return view('admin.organizations.index')->with([
            'organizations'=> $organization
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizations.create',[
            'types'=>Typeorg::where('lang',App::getLocale())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        $data = $request->all();
        $picture_org = $request->picture_org->store('images', 'public');
        $picture_cover = $request->picture_cover->store('images', 'public');
        $data['picture_org'] = $picture_org;
        $data['picture_cover'] = $picture_cover;
        Organization::create($data);
        session()->flash('success_en', ' Organization created successfully');
        session()->flash('success_ar', ' تم اضافة المنظمة بنجاح');
        return redirect(route('admin.organizations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view('admin.organizations.show')->with('organization',$organization);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('admin.organizations.create', [
            'organization' => $organization,
            'types'=>Typeorg::where('lang',App::getLocale())->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        $data = $request->all();
        if ($request->hasFile('picture_org')) {
            $picture_org = $request->picture_org->store('images', 'public');
            Storage::disk('public')->delete($organization->picture_org);
            $data['picture_org'] = $picture_org;
        }
        if ($request->hasFile('picture_cover')) {
            $picture_cover = $request->picture_cover->store('images', 'public');
            Storage::disk('public')->delete($organization->picture_cover);
            $data['picture_cover'] = $picture_cover;
        }
        $organization->update($data);
        session()->flash('success_en', 'organization Updated successfully');
        session()->flash('success_ar', 'تم تعديل المنظمة بنجاح');
        return redirect(route('admin.organizations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        session()->flash('success_en', 'organization deleted successfully');
        session()->flash('success_ar', 'تم حذف المنظمة بنجاح');
        return redirect(route('admin.organizations.index'));
    }
}

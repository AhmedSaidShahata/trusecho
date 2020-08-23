<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Http\Request;
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
        return view('admin.organizations.index')->with('organizations', Organization::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizations.create');
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
        session()->flash('success', ' Organization created successfully');
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
        return view('admin.organizations.create', ['organization' => $organization]);
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
        session()->flash('success', 'organization Updated successfully');
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
        session()->flash('success', 'Success Deleting organization');
        return redirect(route('admin.organization.index'));
    }
}

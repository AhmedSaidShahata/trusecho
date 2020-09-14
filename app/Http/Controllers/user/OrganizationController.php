<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Organization;
use App\Type;
use App\Typeorg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.organizations.organizations', [
            'organizations' => Organization::where('lang', App::getLocale())->paginate(10),
            'types'=>Typeorg::where('lang', App::getLocale())->get()
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
        $data = $request->except('type');


        $check_type = Typeorg::where([
            'name' => $request->type,
            'lang' => $request->lang

        ]);

        if ($check_type->get()->count() == 0) {

            $type =  Typeorg::create([
                'name' => $request->type,
                'lang' => $request->lang,
            ]);
        } else {
            $type = $check_type->get()->first();
        }

        $picture_org = $request->picture_org->store('images', 'public');
        $picture_cover = $request->picture_cover->store('images', 'public');
        $data['picture_org'] = $picture_org;
        $data['picture_cover'] = $picture_cover;
        $data['type_id'] = $type->id;
        Organization::create($data);
        session()->flash('success_en', ' Organization created successfully');
        session()->flash('success_ar', ' تم اضافة المنظمة بنجاح');
        return redirect(route('user.organizations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
        return view('user.organizations.show')->with('organization', $organization);
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
        $organizations = Organization::where($request->all())->paginate(10);

        return view('user.organizations.organizations', [
            'organizations' => $organizations,
            'types' => Typeorg::where('lang', App::getLocale())->get(),

        ]);
    }
}

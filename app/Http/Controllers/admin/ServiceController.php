<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Language;
use App\Service;
use App\specialization;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('lang', App::getLocale())->get();
        return view('admin.services.index', [
            'services' => $services,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = specialization::where('lang', App::getLocale())->get();
        return view('admin.services.create', [
            'specializations' => $specializations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();

        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        Service::create($data);
        session()->flash('success_en', ' Service Created Successfully ');
        session()->flash('success_ar', ' تم اضافة الخدمة بنجاح ');
        return redirect(route('admin.services.index'));
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
    public function edit(Service $service)
    {

        $specializations = specialization::where('lang', App::getLocale())->get();

        return view('admin.services.create', [
            'service' => $service,
            'specializations' => $specializations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {

        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($service->picture);
            $data['picture'] = $picture;
        }
        $service->update($data);
        session()->flash('success_en', ' Service Updated Successfully ');
        session()->flash('success_ar', ' تم تعديل الخدمة بنجاح ');
        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('success_en', ' Service Deleted Successfully ');
        session()->flash('success_ar', ' تم حذف الخدمة بنجاح ');
        return redirect(route('admin.services.index'));
    }
}

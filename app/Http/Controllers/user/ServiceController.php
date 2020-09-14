<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Service;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.services.services', [
            'services' => Service::where('lang', App::getLocale())->paginate(10),
            'types' => Type::where('lang', App::getLocale())->get(),
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

        $check_type = Type::where([
            'name' => $request->type,
            'lang' => $request->lang

        ]);

        if ($check_type->get()->count() == 0) {

            $type =  Type::create([
                'name' => $request->type,
                'lang' => $request->lang,
            ]);
        } else {
            $type = $check_type->get()->first();
        }

        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        $data['type_id'] = $type->id;
        Service::create($data);
        session()->flash('success_en', ' Service Created successfully');
        session()->flash('success_ar', ' تم اضافة الخدمة بنجاح');
        return redirect(route('user.services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {

        return view('user.services.single-service-page', ['service' => $service]);
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
        $services = Service::where($request->all())->paginate(10);

        return view('user.services.services', [
            'services' => $services,
            'types' => Type::where('lang', App::getLocale())->get(),

        ]);
    }
}

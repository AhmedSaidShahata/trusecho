<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeorgRequest;
use App\Typeorg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TypeorgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Typeorg::where('lang',App::getLocale())->get();
        return view('admin.types_org.index')->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types_org.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeorgRequest $request)
    {
        Typeorg::create($request->all());
        session()->flash('success_en', 'Success Added Type');
        session()->flash('success_ar', 'تم اضافة النوع بنجاح' );
        return redirect(route('admin.typeorgs.index'));
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
    public function edit(Typeorg $type)
    {
        return view('admin.types_org.create')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeorgRequest $request, Typeorg $type)
    {
        $type->update($request->all());
        $type->save();
        session()->flash('success_en', 'Success Updated Type');
        session()->flash('success_ar', 'تم تعديل  النوع بنجاح' );
        return redirect(route('admin.typeorgs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typeorg $type)
    {
        $type->delete();
        session()->flash('success_en', 'Success Deleted Type');
        session()->flash('success_ar', 'تم حذف النوع بنجاح' );
        return redirect(route('admin.typeorgs.index'));
    }
}

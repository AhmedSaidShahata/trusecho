<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::where('lang',App::getLocale())->get();
        return view('admin.types.index')->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        Type::create($request->all());
        session()->flash('success_en', 'Success Added Type');
        session()->flash('success_ar', 'تم اضافة النوع بنجاح' );
        return redirect(route('admin.types.index'));
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
    public function edit(Type $type)
    {
        return view('admin.types.create')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        $type->update($request->all());
        $type->save();
        session()->flash('success_en', 'Success Updated Type');
        session()->flash('success_ar', 'تم تعديل  النوع بنجاح' );
        return redirect(route('admin.types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        session()->flash('success_en', 'Success Deleted Type');
        session()->flash('success_ar', 'تم حذف النوع بنجاح' );
        return redirect(route('admin.types.index'));
    }
}

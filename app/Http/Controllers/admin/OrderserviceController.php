<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Orderservice;
use Illuminate\Http\Request;

class OrderserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order-services.index',[
            'order_services'=>Orderservice::orderBy('created_at','desc')->paginate(10)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Orderservice $orderservice)
    {
        $orderservice->seen = '1' ;
        $orderservice->save();

        return view('admin.order-services.show',[
           'orderservice'=> $orderservice
            ]);
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
    public function destroy(Orderservice $orderservice)
    {
        $orderservice->delete();
        session()->flash('success_en', 'Service Order Deleted successfully ');
        session()->flash('success_ar', ' تم حذف طلب الخدمة بنجاح ');
        return back();
    }
}

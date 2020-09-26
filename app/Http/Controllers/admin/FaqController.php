<?php

namespace App\Http\Controllers\admin;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::where('lang', App::getLocale())->orderBy('created_at','desc')->paginate(10);

        return view('admin.faqs.index')->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {

        faq::create($request->all());
        session()->flash('success_en', 'Success Added Question ');
        session()->flash('success_ar', 'تم اضافة السؤال بنجاح ');
        return redirect(route('admin.faqs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
    return view('admin.faqs.show')->with('faq',$faq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.create')->with('faq', $faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(faqRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        $faq->save();
        session()->flash('success_en', 'Success Updated Question ');
        session()->flash('success_ar', 'تم تعديل السؤال بنجاح ');
        return redirect(route('admin.faqs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        session()->flash('success_en', 'Success Deleted Question ');
        session()->flash('success_ar', 'تم حذف السؤال بنجاح ');
        return redirect(route('admin.faqs.index'));
    }
}

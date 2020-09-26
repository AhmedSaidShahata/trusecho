<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Testiomonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testiomonial::where('lang', App::getLocale())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.testimonials.index')->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        Testiomonial::create($data);
        session()->flash('success_en', 'Success Added Testimonial');
        session()->flash('success_ar', 'تم اضافة العميل بنجاح');
        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testiomonial $testimonial)
    {
        return view('admin.testimonials.show', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testiomonial $testimonial)
    {


        return view('admin.testimonials.create', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testiomonial $testimonial)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($testimonial->picture);
            $data['picture'] = $picture;
        }
        $testimonial->update($data);
        session()->flash('success_en', ' Testimonial Updated Successfully ');
        session()->flash('success_ar', ' تم تعديل الخدمة بنجاح ');
        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testiomonial $testimonial)
    {
        $testimonial->delete();
        session()->flash('success_en', ' Testimonial Deleted Successfully ');
        session()->flash('success_ar', ' تم حذف العميل  بنجاح ');
        return redirect(route('admin.testimonials.index'));
    }
}

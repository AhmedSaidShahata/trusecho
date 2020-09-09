<?php

namespace App\Http\Controllers\admin;

use App\CategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=CategoryBlog::where('lang',App::getLocale())->get();
        return view('admin.categories_blogs.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        CategoryBlog::create($data);

        session()->flash('success_en', 'Success Add Category ');

        session()->flash('success_ar', 'تم اضافة القسم بنجاح ');

        return redirect(route('admin.categories.index'));
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
    public function edit($id)
    {
        $categoryBlog = CategoryBlog::find($id);

        return view('admin.categories_blogs.create')->with('categoryBlog', $categoryBlog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $categoryBlog = CategoryBlog::find($id);

        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($categoryBlog->picture);
            $data['picture'] = $picture;
        }

        $categoryBlog->update($data);

        $categoryBlog->save();


        session()->flash('success_en', 'Success Updated Category ');

        session()->flash('success_ar', 'تم تعديل القسم بنجاح ');

        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryBlog = CategoryBlog::find($id);
        $categoryBlog->delete();
        session()->flash('success_en', 'Success Deleted Category ');

        session()->flash('success_ar', 'تم حذف القسم بنجاح ');
        return redirect(route('admin.categories.index'));
    }
}

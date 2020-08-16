<?php

namespace App\Http\Controllers\admin;

use App\CategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories_blogs.index')->with('categories', CategoryBlog::all());
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


        CategoryBlog::create($request->all());
        session()->flash('success', 'Success Add Category ' . $request->name);
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
        $categoryBlog = CategoryBlog::find($id);

        $categoryBlog->update(['name' => $request->name]);

        $categoryBlog->save();

        session()->flash('success', 'Success Updated Category ' );

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
        session()->flash('success', 'Success Delete Category ' );
        return redirect(route('admin.categories.index'));
    }
}

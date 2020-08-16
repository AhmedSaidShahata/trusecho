<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\CategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class blogs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.index')->with('blogs', Blog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.blogs.create')->with('categories', CategoryBlog::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $picture = $request->picture->store('images', 'public');

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'cat_id' => $request->cat_id,
            'user_id' => Auth::user()->id,
            'picture' => $picture
        ]);
        session()->flash('success', 'Blog created successfully');
        return redirect(route('admin.blogs.index'));
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
    public function edit(Blog $blog)
    {

        return view('admin.blogs.create', ['blog' => $blog, 'categories' => CategoryBlog::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {

        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($blog->picture);
            $data['picture'] = $picture;
        }
        $blog->update($data);
        session()->flash('success', 'post Updated successfully');
        return redirect(route('admin.blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'blog deleted successfully');
        return redirect(route('admin.blogs.index'));
    }
}

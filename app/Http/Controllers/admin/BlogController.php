<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\CategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where([
            'lang'=> App::getLocale(),
            'status'=>1
            ])->orderBy('created_at','desc')->paginate(10);
        return view('admin.blogs.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryBlog::where([
            'lang'=> App::getLocale(),
            'status'=>1
        ])->get();
        return view('admin.blogs.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        $data['user_id'] = Auth::user()->id;
        Blog::create($data);
        session()->flash('success_en', 'Blog created successfully');
        session()->flash('success_ar', 'تم اضافة المقال بنجاح');
        return redirect(route('admin.blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show',[
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories =CategoryBlog::where([
            'lang'=> App::getLocale(),
            'status'=>1
        ])->get();

        return view('admin.blogs.create', ['blog' => $blog, 'categories' =>$categories]);
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

        session()->flash('success_en', 'Blog Updated successfully');
        session()->flash('success_ar', 'تم تعديل المقال بنجاح');
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
        session()->flash('success_en', 'Blog Deleted successfully');
        session()->flash('success_ar', 'تم حذف المقال بنجاح');
        return redirect(route('admin.blogs.index'));
    }

    public function request()
    {
        $blogs = Blog::where([
            'lang'=> App::getLocale(),
            'status'=>0
            ])->orderBy('created_at','desc')->paginate(10);
        return view('admin.blogs_requests.index')->with('blogs', $blogs);
    }

    public function accept(Request $request)
    {

        $blogId = $request->input('blogId');
        $blog = Blog::where('id',$blogId)->get()->first();
        $blog->status=1;
        $blog->save();

        $cat_id = $blog->category_blog_id;
        $category = CategoryBlog::where('id',$cat_id)->get()->first();
        $category->status=1;
        $category->save();
    }
}

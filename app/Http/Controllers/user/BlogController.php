<?php

namespace App\Http\Controllers\user;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Watchblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function show(Blog $blog)
    {
        $user_id = Auth::user()->id;
        $comments = $blog->comment;
        $views = Watchblog::where([
            'user_id' => $user_id,
            'blog_id' => $blog->id
        ]);

        if ($views->count() == 0) {
            Watchblog::create([
                'user_id' => $user_id,
                'blog_id' => $blog->id
            ]);
        }
        $viewsCount = Watchblog::where([
            'blog_id' => $blog->id
        ])->get()->count();

        $related_blogs=Blog::where([
            'cat_id'=>$blog->cat_id
        ])->where('id','!=',$blog->id)->get();



        return view('user.blogs.single-post-blog', [
            'blog' => $blog,
            'comments' => $comments,
            'views_count' => $viewsCount,
            'related_blogs'=>$related_blogs
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
    public function destroy($id)
    {
        //
    }
}

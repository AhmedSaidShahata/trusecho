<?php

namespace App\Http\Controllers\user;

use App\Blog;
use App\Blogcomment;
use App\Http\Controllers\Controller;
use App\Notifications\Notifyblogcomment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogcommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $userId = Auth::user()->id;
        $commentblog = $request->input('commentBlogvalue');
        $blogId = $request->input('blogId');


        $blog = Blog::find($blogId);

        $user = User::find($blog->user->id);



        $user->notify(new Notifyblogcomment($blog));

        Blogcomment::create([
            'body' => $commentblog,
            'user_id' => $userId,
            'blog_id' => $blogId
        ]);
        return;
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

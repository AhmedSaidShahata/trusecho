<?php

namespace App\Http\Controllers\user;

use App\Blog;
use App\CategoryBlog;
use App\Http\Controllers\Controller;
use App\Notifications\addPost;
use App\User;
use App\Watchblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
        $data = $request->except('category', 'picture_category');
        $picture_category = $request->picture_category->store('images', 'public');


        $check_category = CategoryBlog::where([
            'lang' => $request->lang,
            'name' => $request->category
        ]);

        if ($check_category->get()->count() == 0) {

            $category =  CategoryBlog::create([
                'name' => $request->category,
                'lang' => $request->lang,
                'status' => $request->status,
                'picture' => $picture_category

            ]);
        } else {
            $category = $check_category->get()->first();
        }


        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;
        $data['category_blog_id'] = $category->id;
        $blog  = Blog::create($data);

        // $user = User::all();

        // Notification::send($user, new addPost($blog));

        session()->flash('success_en', 'Blog created successfully and admin will admin review blog first before show');
        session()->flash('success_ar', 'تم اضافة المقال بنجاح ولكن سيتم مراجعته من المدير اولا قبل ان يتم عرضه');
        return redirect(route('user.categoryblogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        if (auth()->user()) {
            $user_id = Auth::user()->id;
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
        }
        $viewsCount = Watchblog::where([
            'blog_id' => $blog->id
        ])->get()->count();

        $related_blogs = Blog::where([
            'category_blog_id' => $blog->category_blog_id
        ])->where('id', '!=', $blog->id)->get();


        $comments = $blog->comment;
        return view('user.blogs.single-post-blog', [
            'blog' => $blog,
            'comments' => $comments,
            'views_count' => $viewsCount,
            'related_blogs' => $related_blogs
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

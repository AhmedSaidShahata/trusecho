<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Newsorg;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsorgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_orgs=Newsorg::where('lang',App::getLocale())->get();

        return view('admin.news_orgs.index')->with('news_orgs',$news_orgs) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $my_orgs= Organization::where([
            'user_id'=>Auth::user()->id,
            'lang'=>App::getLocale()
            ])->get();

        return view('admin.news_orgs.create')->with('my_orgs',$my_orgs) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $picture = $request->picture->store('images', 'public');
        $data['picture']=$picture;

        Newsorg::create($data);
        session()->flash('success', ' news created successfully ');
        return redirect(route('admin.newsorgs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Newsorg $newsorg)
    {
        return view('admin.news_orgs.show', ['newsorg' => $newsorg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsorg $newsorg)
    {
        $my_orgs= Organization::where('user_id','=',Auth::user()->id)->get();

        return view('admin.news_orgs.create', [
            'newsorg' => $newsorg,
            'my_orgs'=>$my_orgs

            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsorg $newsorg)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('images', 'public');
            Storage::disk('public')->delete($newsorg->picture);
            $data['picture'] = $picture;
        }
        $newsorg->update($data);
        session()->flash('success', 'news Updated successfully');
        return redirect(route('admin.newsorgs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsorg $newsorg)
    {
        $newsorg->delete();
        session()->flash('success', 'news deleted successfully');
        return redirect(route('admin.newsorgs.index'));
    }
}

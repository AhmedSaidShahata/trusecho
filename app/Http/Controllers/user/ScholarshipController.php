<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Scholarship;
use App\Viewscholar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {





        $user_id = Auth::user()->id;

        $views = Viewscholar::where([
            'user_id' => $user_id,
            'scholarship_id' => $scholarship->id
        ]);

        if ($views->count() == 0) {
            Viewscholar::create([
                'user_id' => $user_id,
                'scholarship_id' => $scholarship->id
            ]);
        }
        $viewsCount = Viewscholar::where([
            'scholarship_id' => $scholarship->id
        ])->get()->count();



        $related_scholarships=scholarship::where([
            'lang'=>App::getLocale(),
            'specialization_id'=>$scholarship->specialization_id
        ])->where('id','!=',$scholarship->id)->get();


        $comment_scholarships = $scholarship->comment;

        return view('user.scholarships.single-scholar',
         [ 'views_count' => $viewsCount,
         'scholarship' => $scholarship,
         'comment_scholarships' => $comment_scholarships,
         'related_scholarships'=>$related_scholarships
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

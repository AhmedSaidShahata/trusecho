<?php

namespace App\Http\Controllers\user;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Scholarship;
use App\Scholarspecialize;
use App\specialization;
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
        $scholarships = Scholarship::where(['lang' => App::getLocale()])->paginate(10);
        $specializations = Scholarspecialize::where(['lang' => App::getLocale()])->get();
        $costs = Cost::where(['lang' => App::getLocale()])->get();

        return view('user.scholarships.scholarships', [
            'scholarships' => $scholarships,
            'specializations' =>  $specializations,
            'costs' => $costs
        ]);
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
        $data = $request->except('specialization', 'cost');
        $picture = $request->picture->store('images', 'public');
        $data['picture'] = $picture;

        $check_specialization = Scholarspecialize::where([
            'lang' => $request->lang,
            'name' => $request->specialization
        ]);

        if ($check_specialization->get()->count() == 0) {

            $specialization =  Scholarspecialize::create([
                'name' => $request->specialization,
                'lang' => $request->lang,

            ]);
        } else {
            $specialization = $check_specialization->get()->first();
        }

        $data['specialization_id'] = $specialization->id;



        $check_cost = Cost::where([
            'lang' => $request->lang,
            'name' => $request->cost
        ]);

        if ($check_cost->get()->count() == 0) {

            $cost =  Cost::create([
                'name' => $request->cost,
                'lang' => $request->lang,

            ]);
        } else {
            $cost = $check_cost->get()->first();
        }

        $data['cost_id'] = $cost->id;

        Scholarship::create($data);
        session()->flash('success_en', ' Scholarship created successfully ');
        session()->flash('success_ar', ' تم اضافة المنحة بنجاح ');
        return redirect(route('user.scholarships.index'));
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



        $related_scholarships = scholarship::where([
            'lang' => App::getLocale(),
            'specialization_id' => $scholarship->specialization_id
        ])->where('id', '!=', $scholarship->id)->get();


        $comment_scholarships = $scholarship->comment;

        return view(
            'user.scholarships.single-scholar',
            [
                'views_count' => $viewsCount,
                'scholarship' => $scholarship,
                'comment_scholarships' => $comment_scholarships,
                'related_scholarships' => $related_scholarships
            ]
        );
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


    public function search(Request $request)
    {
        $scholarships = scholarship::where($request->all())->paginate(10);

        return view('user.scholarships.scholarships', [
            'scholarships' => $scholarships,
            'costs'=>Cost::where(['lang' => App::getLocale()])->get(),
            'specializations' => Scholarspecialize::where('lang', App::getLocale())->get()

        ]);
    }
}

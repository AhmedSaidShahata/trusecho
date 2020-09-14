<?php

namespace App\Http\Controllers\user;

use App\Appscholar;
use App\Http\Controllers\Controller;
use App\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppscholarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.scholarships.application');
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

        $user_id = Auth::user()->id;
        $scholar_id = $request->scholar_id;
        $siblings =  $request->siblings;

        $app =  Appscholar::where([
            'user_id' => $user_id,
            'scholar_id' => $scholar_id
        ]);

        if ($app->get()->count() == 0) {

            $app_scholar = Appscholar::create([
                'user_id' => $user_id,
                'scholar_id' => $scholar_id,
                'fullname' => $request->fullname,
                'nationality' => $request->nationality,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'father_status' => $request->father_status,
                'mother_status' => $request->mother_status,
                'degree' => $request->degree,
                'siblings'=>$siblings
            ]);


        } else {
           Appscholar::where([
                'scholar_id' => $scholar_id,
                'user_id' => $user_id
            ])->update(array(
                'fullname' => $request->fullname,
                'nationality' => $request->nationality,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'father_status' => $request->father_status,
                'mother_status' => $request->mother_status,
                'degree' => $request->degree,
                'siblings'=>$siblings

            ));
        }

        return view('user.scholarships.application2', [
            'scholar_id' => $scholar_id,

        ]);
    }


    public function store2(Request $request)
    {
        $user_id = Auth::user()->id;

        $scholar_id = $request->scholar_id;

        $user_picture = $request->user_picture->store('images', 'public');

        $high_school_picture = $request->high_school_picture->store('images', 'public');

        $university_picture = $request->university_picture->store('images', 'public');

        $letter_picture = $request->letter_picture->store('images', 'public');

        $language_picture = $request->language_picture->store('images', 'public');

        $passport_picture = $request->passport_picture->store('images', 'public');




        Appscholar::where([
            'scholar_id' => $scholar_id,
            'user_id' => $user_id
        ])->update(array(
            'specialization' => $request->specialization,
            'university' => $request->university,
            'interview_location' => $request->interview_location,
            'user_picture' => $user_picture,
            'high_school_picture' => $high_school_picture,
            'university_picture' => $university_picture,
            'letter_picture' => $letter_picture,
            'language_picture' => $language_picture,
            'passport_picture' => $passport_picture

        ));

        return view('user.scholarships.application3', [
            'scholar_id' => $scholar_id,
        ]);
    }

    public function store3(Request $request)
    {
        $scholar_id = $request->scholar_id;
        $user_id = Auth::user()->id;
        $payment_picture = $request->payment_picture->store('images', 'public');


        Appscholar::where([
            'scholar_id' => $scholar_id,
            'user_id' => $user_id
        ])->update(array(
            'research' => $request->research,
            'payment_picture' => $payment_picture,

        ));

        return view('user.scholarships.thanks');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $scholarship = Scholarship::find($id);
        return view('user.scholarships.application')->with('scholarship', $scholarship);
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

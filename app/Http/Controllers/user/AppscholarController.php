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


        $data = $request->all();
        $user_picture = $request->user_picture->store('images', 'public');
        $data['user_picture'] = $user_picture;
        $high_school_picture = $request->high_school_picture->store('images', 'public');
        $data['high_school_picture'] = $high_school_picture;
        $university_picture = $request->university_picture->store('images', 'public');
        $data['university_picture'] = $university_picture;
        $letter_picture = $request->letter_picture->store('images', 'public');
        $data['letter_picture'] = $letter_picture;
        $language_picture = $request->language_picture->store('images', 'public');
        $data['language_picture'] = $language_picture;
        $payment_picture = $request->payment_picture->store('images', 'public');
        $data['payment_picture'] = $payment_picture;
        $passport_picture = $request->passport_picture->store('images', 'public');
        $data['passport_picture'] = $passport_picture;

        $data['user_id'] = Auth::user()->id;
        Appscholar::create($data);

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
        $scholarship=Scholarship::find($id);
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

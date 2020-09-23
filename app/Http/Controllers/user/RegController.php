<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SendCode;
use App\User;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.sign-up.sign-up-2');
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

        $phone_explode =  explode('+', $request->full_number);


         $phone = $phone_explode[1];


        $data = $request->except('_token', '_method','full_number');

        Profile::where(['user_id' => $id])->update($data);

        $profile =  Profile::where(['user_id' => $id])->get()->first();

        $user = User::find(Auth::user()->id);


        if ($user) {
            $user->code = "1234";
            // $user->code = SendCode::sendCode("201008131721");
            $user->save();
        }


        return redirect(route('user.getverify', $request->full_number));
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

<?php

namespace App\Http\Controllers\user;

use App\Friend;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::where('id', '!=', Auth::user()->id)->get();


        return view('user.network.users', [
            'users' => $users
        ]);
    }


    public function myfriends()
    {
        
        $friends=Friend::where(['friend_id'=>Auth::user()->id,'accept'=>1])->get();

        return view('user.network.users', [
            'users' => $friends
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('user_id', '=', $id)->get()->first();
        $user = User::find($id);


        return view('user.profile.profile-info', [
            'user' => $user,
            'profile' => $profile
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
    public function friendrequest(Request $request)
    {

        $user_id = Auth::user()->id;
        $friend_id = $request->input('userId');
        $friend_request = Friend::where('user_id', '=', $user_id)->where('friend_id', '=', $friend_id);
        if ($friend_request->get()->count() == 0) {

            Friend::create([
                'user_id' => $user_id,
                'friend_id' => $friend_id,
                'accept' => 0
            ]);
        } else {
            $friend_request->delete();
        }
        return;
    }

    public function friendaccept(Request $request)
    {

        $user_id = Auth::user()->id;
        $friend_id =(int) $request->input('friendId');


       Friend::where(['user_id' => $friend_id,'friend_id' => $user_id])->update(array('accept' => 1));
        return;
    }

    public function frienddelete(Request $request)
    {

        $user_id = Auth::user()->id;
        $friend_id =(int) $request->input('friendId');
        Friend::where(['user_id' => $friend_id,'friend_id' => $user_id])->delete();
        return;
    }
}

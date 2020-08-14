<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user')->with('users', User::all());
    }

    public function edit(User $user)
    {
        $profile = $user->profile;
        // dd($profile);
        return view('user.profile.profile', ['user' => $user, 'profile' => $profile]);
    }

    public function update(User $user,Request $request)
    {

         $profile =$user->profile;
         $data = $request->all();
         if($request->hasFile('picture')){
             $picture = $request->picture->store('profiles_picture','public');
             $data['picture']=$picture;
         }
         $profile->update($data);
         return redirect (route('home-page'));

    }
}

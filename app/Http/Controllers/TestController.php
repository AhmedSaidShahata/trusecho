<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function register(Request $request)
    {

        $valid =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if ($valid->fails()) {
            return $valid->errors();
        } else {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            User::create($data);
            return $request;
        }
    }

    public function login(Request $request)
    {
        if(auth()->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
            $user=auth()->user();
            return $user;
        }else{
            return 'no';
        }

    }

    public function logout(Request $request)
    {
       return response()->json([
           'messages'=>'unable to logout',
           'code'=>401,

       ],401);
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{


    public function getVerify($phone){
        return view('user.sign-up.sign-up-3')->with('phone',$phone);
    }

    public function postVerify(Request $request){
        if($user = User::where('code',$request->code)->first()){
            $user->active = 1 ;
            $user->code = null ;
            $user -> save();

            Auth::logout($user);

            session()->flash('success_en', ' Your Account Is Active Successfully');
            session()->flash('success_ar','تم تفعيل حسابك بنجاح ');

            return redirect()->route('login');
        }else{

            session()->flash('error_en', ' verify code is not correct . Please try again');
            session()->flash('error_ar','الكود الذى أدخلته غير صحيح برجاء المحاولة مرة أخرى ');
            return back();
        }
    }
}

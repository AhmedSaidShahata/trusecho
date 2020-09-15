<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function get(){

        return  Notification::where([
            'notifiable_id'=>Auth::user()->id,
            'read_at'=>Null

        ])->get();

    }

    public function read(Request $request){


        Auth::user()->unreadNotifications()->find($request->id)->MarkAsRead();
        return 'success';
    }
}

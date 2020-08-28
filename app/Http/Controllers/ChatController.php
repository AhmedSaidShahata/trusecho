<?php

namespace App\Http\Controllers;


use App\Chat;
use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        return view('user.chat.index', [
            'friends' => $friends
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
        $friend = new Friend();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $request->friend_id;
        $friend->save();
        Session::flash('success', 'Friend Has been Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::Find($id);
        $friends = Auth::user()->friends();

        return view('user.chat.show', [
            'friend' => $friend,
            'friends'=>$friends
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChat($id)
    {
        $chats = Chat::where(function ($query) use ($id) {
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);
        })->get();
        return $chats;
    }



    public function sendChat(Request $request)
    {
        Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);
        return [];
    }
}

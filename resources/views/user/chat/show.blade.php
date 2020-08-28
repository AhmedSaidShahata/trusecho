@extends('user.layouts.fixed_layout')
@section('content')
<meta name="friendId" content="{{$friend->id}}">
<audio id="chat-sound">
    <source src="{{asset('sounds/chat.mp3')}}">
</audio>

<div class="messages">
    <div class="messages__left">
        @forelse($friends as $friend)
        <div class="chat-rect">
            <img src="{{asset('storage/'.$friend->profile->picture)}}" alt="picture" class="chat-rect-img" style="border-radius:50%">
            <div class="message-info">
                <online-users :friend="{{$friend}}" :onlineusers="onlineUsers">
                </online-users>
                <h1 class="message-info__person"><a href="{{route('chat.show',$friend->id)}}">{{$friend->name}}</a></h1>
                <p class="message-info__text">Lorem ipsum dolor sit amet. Lorem ipsum dolor ...</p>
            </div>
        </div>

        @empty
        @endforelse

    </div>
    <div class="messages__right" style="padding: 20px 0 ">
        <chat :chats="chats" :userid="{{Auth::user()->id}}" :friendid="{{$friend->id}}"> </chat>
    </div>
</div>
@endsection

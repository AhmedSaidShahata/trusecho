@extends('user.layouts.fixed_layout')
@section('content')
<div class="messages">
    <div class="messages__left">
        @forelse($friends as $friend)
        <div class="chat-rect">
            <img src="{{asset('storage/'.$friend->profile->picture)}}" alt="picture" class="chat-rect-img" style="border-radius:50%">
            <div class="message-info">
                <online-users :friend="{{$friend}}" :onlineusers="onlineUsers">
                </online-users>
                <h1 class="message-info__person"><a href="{{route('chat.show',$friend->id)}}">{{$friend->name}}</a></h1>
                <p class="message-info__text"> </p>
            </div>
        </div>

        @empty
        @endforelse

    </div>
    <div class="messages__right">
        <p style="font-size: 260%;text-align: center;margin: 235px 0;">
            Select Friend Please .....
        </p>
    </div>
</div>
@endsection

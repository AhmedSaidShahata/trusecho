@extends('user.layouts.fixed_layout')
@section('content')
<div class="my-network-section">
    <div class="my-network-section__info">
        <div class="my-network-section__info-content">
            <h1 class="my-network-section__header">{{__('messages.manage_net')}}</h1>
            <p class="my-network-section__paragraph">
            {{__('messages.manage_text')}}
            </p>
        </div>
        <div class="my-network-section__illustration-box">
            <img src="img/my-network-friends.svg" alt="organization" class="my-network-section__illustrations" />
        </div>
    </div>
</div>
<div class="my-network-section-info">
    <div class="my-network-section-info__options u-margin-top-small">
        <ul class="options__list">
            <li class="options__items">
                <a href="{{route('user.myfriends')}}" class="options__item selected">{{__('messages.your_friends')}}</a>
            </li>
            <li class="options__items">
                <a class="options__item not-selected">{{__('messages.follow_org')}}</a>
            </li>
        </ul>
    </div>
    <div class="my-network-section-info__friends">


        @forelse($users as $user)

        <div class="friends-card u-margin-top-small" style="margin-bottom: 30px;">
            <div class="friends-card__user-details">
            {{ $profile_picture =App\Profile::where(['user_id'=>$user->id])->get()->first() }}
                <img src="{{asset('storage/'.$profile_picture)}}" alt="friends picture" class="friends-card__picture" style="border: 1px solid black;width: 100px;border-radius: 50%;height: 100px;" />
                <div class="user-info">
                    <h1 class="friends-card__name">{{$user->name}}</h1>

                </div>
            </div>
            <div class="friends-card__buttons">
                <a href="#" class="friends-card__message-btn">{{__('messages.message_user')}}</a>
                <a href="{{route('user.friends.show',$user->id)}}" class="friends-card__visit-btn">{{__('messages.visit')}}</a>
            </div>
        </div>


        @empty

        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
        {{__('messages.no_users')}}
        </div>


        @endforelse


    </div>
</div>
{{$users->links()}}

@endsection

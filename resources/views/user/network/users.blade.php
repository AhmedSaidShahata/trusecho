@extends('user.layouts.fixed_layout')
@section('content')
<div class="my-network-section">
    <div class="my-network-section__info">
        <div class="my-network-section__info-content">
            <h1 class="my-network-section__header">Manage your network</h1>
            <p class="my-network-section__paragraph">
                Manage the organizations you follow as well as your friends
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
                <a href="my-network-friends.html" class="options__item selected">Your friends</a>
            </li>
            <li class="options__items">
                <a href="my-network-org.html" class="options__item not-selected">Organizations you follow</a>
            </li>
        </ul>
    </div>
    <div class="my-network-section-info__friends">


        @forelse($users as $user)

        <div class="friends-card u-margin-top-small">
            <div class="friends-card__user-details">
                <img src="{{asset('storage/'.$user->profile->picture)}}" alt="friends picture" class="friends-card__picture" style="border: 1px solid black;width: 100px;border-radius: 50%;height: 100px;" />
                <div class="user-info">
                    <h1 class="friends-card__name">{{$user->name}}</h1>
                    <p class="friends-card__job">{{$user->profile->job}}</p>
                </div>
            </div>
            <div class="friends-card__buttons">
                <a href="#" class="friends-card__message-btn">Message</a>
                <a href="{{route('user.friends.show',$user->id)}}" class="friends-card__visit-btn">Visit</a>
            </div>
        </div>


        @empty

        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Friends Yet
        </div>


        @endforelse


    </div>
</div>
<div class="pagination">
    <div class="pagination__left-arrow-box"></div>
    <a href="#"><img src="img/left-arrow.svg" alt="arrow" class="pagination__left-arrow" /></a>
    <a href="#" class="pagination__prev">prev</a>
    <ul class="pagination__list">
        <li class="pagination__list-item">
            <a href="#" class="selected">1</a>
        </li>
        <li class="pagination__list-item"><a href="#">2</a></li>
        <li class="pagination__list-item"><a href="#">3</a></li>
        <li class="pagination__list-item"><a href="#">4</a></li>
        <li class="pagination__list-item"><a href="#">5</a></li>
    </ul>
    <a href="#" class="pagination__next">next</a>
    <div class="pagination__right-arrow-box">
        <a href="#"><img src="img/right-arrow.svg" alt="arrow" class="pagination__right-arrow" /></a>
    </div>
</div>

@endsection

 @extends('layouts.app')


@section('content')
<div class="welcome-container">
        <div class="welcome-box">
            <img src="img/welcome-screen.svg" alt="welcome" class="welcome-illustration">
            <h1 class="welcome-box__header">{{__('messages.welcome_truscho')}}</h1>
            <p class="welcome-box__paragraph">{{__('messages.to_continue')}}</p>
            <a href="{{route('user.homepages.index')}}" class="welcome-box__btn">{{__('messages.cont')}}</a>
        </div>
    </div>

@endsection

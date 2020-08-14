 @extends('layouts.app')


@section('content')
<div class="welcome-container">
        <div class="welcome-box">
            <img src="img/welcome-screen.svg" alt="welcome" class="welcome-illustration">
            <h1 class="welcome-box__header">Welcome to Truescho where it all begins</h1>
            <p class="welcome-box__paragraph">press continue to start</p>
            <a href="{{route('home-page')}}" class="welcome-box__btn">Continue</a>
        </div>
    </div>

@endsection

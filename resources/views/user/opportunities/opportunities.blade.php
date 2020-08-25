@extends('user.layouts.fixed_layout')
@section('content')

<div class="search-results">
    <div class="search-results__content-box">

        @forelse($opportunities as $opportunity )
        <div class="search-results__card">
            <div class="card-picture-box">
                <img src="{{asset('storage/'.$opportunity->picture)}}" alt="Picutre 1" class="card-picture">
            </div>
            <h1 class="search-results__card-header"></h1>
            <p class="search-results__card-paragraph">{{$opportunity->title_en}}</p>
            <div class="best-jobs-section__card-deadline-box">
                <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section__card-deadline">
                <div class="deadline-number">
                    <h2 class="deadline-header">Hours:Days:Months</h2>
                    <h3 class="deadline-value">23:23:23</h3>
                </div>
                <a href="{{route('user.opportunitys.show',$opportunity->id)}}" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No  Opportunities Yet
        </div>
        @endforelse

    </div>

</div>
@endsection

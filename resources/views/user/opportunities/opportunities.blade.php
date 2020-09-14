@extends('user.layouts.fixed_layout')
@section('content')


<div class="search-section">
    <h1 class="search-section__header">{{__('messages.opportunities')}}</h1>
    <!-- <div class="search-section__info">
            <form action="#" class="landing-section__info-selections">
                <div class="selection-div u-margin-right-medium">
                  <label for="cars" class="landing-section__info-selections-label"
                    >Cost</label
                  >
                  <div class="custom-select">
                    <select name="cost" id="cost">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div u-margin-right-medium">
                  <label for="type" class="landing-section__info-selections-label"
                    >Type</label
                  >
                  <div class="custom-select">
                    <select name="type" id="type" class="select-for-label">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div u-margin-right-medium">
                  <label
                    for="speicialization"
                    class="landing-section__info-selections-label"
                    >speicialization</label
                  >
                  <div class="custom-select">
                    <select name="speicialization" id="speicialization">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
                <div class="selection-div">
                  <label for="language" class="landing-section__info-selections-label"
                    >Langauge</label
                  >
                  <div class="custom-select">
                    <select name="language" id="language">
                      <option value="Fully Funded">Fully Funded</option>
                      <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                  </div>
                </div>
            </form>
            <div class="search-section__illustration-box">
                <img src="{{asset('img/org-illustration.svg')}}" alt="organization" class="search-section__illustrations">
            </div>
        </div>
        <div class="landing-section__info-buttons-section">
            <button class="landing-section__info-buttons">
                <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
                <p>search</p>
            </button>
            <button class="landing-section__info-buttons">RESET</button>
        </div> -->
</div>
<div class="search-results">
    <div class="search-results__content-box">

        @forelse($opportunities as $opportunity )
        <div class="search-results__card">
            <div class="card-picture-box">
                <img src="{{asset('storage/'.$opportunity->picture)}}" alt="Picutre 1" class="card-picture">
            </div>
            <h1 class="search-results__card-header"></h1>
            <p class="search-results__card-paragraph">{{$opportunity->title}}</p>
            <div class="best-jobs-section__card-deadline-box">
                <img src="{{asset('img/Icon ionic-ios-timer.svg')}}" alt="deadline" class="best-jobs-section__card-deadline">
                <div class="deadline-number">
                    <h2 class="deadline-header">{{__('messages.hours')}}:{{__('messages.days')}}:{{__('messages.months')}}</h2>
                    <div hidden> {{!$created=$opportunity->created_at->format('Y-m-d')}}
                        {{!$deadline=$opportunity->deadline}}
                        {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                        {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$deadline)}}
                        {{!$different_days = $start_date->diffInDays($end_date)}}
                        {{!$different_hours = $start_date->diffInHours($end_date)}}
                        {{!$different_months = $start_date->diffInMonths($end_date)}}
                    </div>

                    <h3 class="deadline-value">{{ $different_hours}}:{{ $different_days}}:{{ $different_months}}</h3>
                </div>
                <a href="{{route('user.opportunitys.show',$opportunity->id)}}" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            {{__('messages.no_opp')}}
        </div>
        @endforelse

        {{$opportunities->links()}}

    </div>

</div>
@endsection

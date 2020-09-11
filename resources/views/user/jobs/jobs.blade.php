@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}
<div class="search-section">
    <h1 class="search-section__header">{{__('messages.jobs')}}</h1>
    <div class="search-section__info">
        <form action="{{ route('user.jobsearch')}}" class="landing-section__info-selections">


            <div class="selection-div u-margin-right-medium">
                <label for="speicialization" class="landing-section__info-selections-label">{{__('messages.specializations')}}</label>
                <div class="custom-select">
                    <select name="specialize_id" id="speicialization">
                        <option disabled selected value="">{{__('messages.specializations')}}</option>
                        @foreach($specializations as $specialization)
                        <option <?php if (isset($_GET['specialize_id']) and $specialization->id == $_GET['specialize_id']) echo 'selected' ?> value="{{$specialization->id}}">{{$specialization->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="search-section__illustration-box">
                <img src="{{asset('img/jobs-illustration.svg')}}" alt="jobs" class="search-section__illustrations">
            </div>
    </div>
    <div class="landing-section__info-buttons-section ">
        <button class="landing-section__info-buttons" type="submit">
            <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
            <p>search</p>
        </button>

        <a href="{{route('user.jobs.index')}}" class="landing-section__info-buttons">RESET</a>
    </div>
    </form>
</div>
<div class="search-results">
    <a href="#apply-for-job" class="my-btn">
        <i class="fas fa-plus"></i>
        {{__('messages.add_job')}}
    </a>

    <div class="search-results__content-box">


        @forelse($jobs as $job )
        <div class="search-results__card">
            <div class="card-picture-box">
                <span class="opportunity-type-label">{{$job->title}}</span>
                <img src="{{asset('storage/'.$job->picture)}}" alt="Picutre 1" class="card-picture">
            </div>
            <h1 class="search-results__card-header">{{__('messages.salary')}} {{$job->salary}} $</h1>
            <p class="search-results__card-paragraph">{{$job->description}}</p>
            <div class="best-jobs-section__card-deadline-box">
                <img src="{{asset('img/Icon ionic-ios-timer.svg')}}" alt="deadline" class="best-jobs-section__card-deadline">
                <div class="deadline-number">
                    <h2 class="deadline-header">Hours:Days:Months</h2>
                    <div hidden> {{!$created=$job->created_at->format('Y-m-d')}}
                        {{!$deadline=$job->deadline}}
                        {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                        {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$deadline)}}
                        {{!$different_days = $start_date->diffInDays($end_date)}}
                        {{!$different_hours = $start_date->diffInHours($end_date)}}
                        {{!$different_months = $start_date->diffInMonths($end_date)}}
                    </div>
                    <h3 class="deadline-value">{{ $different_hours}}:{{ $different_days}}:{{ $different_months}}</h3>
                </div>
                <a href="{{route('user.jobs.show',$job->id)}}" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Jobs Yet
        </div>
        @endforelse

    </div>

    {{$jobs->links()}}



    <div class="popup" id="apply-for-job" style="overflow: auto;">
        <form action="{{route('user.jobs.store')}}" method="post" enctype="multipart/form-data">
            <div class="popup__content" style="padding-top: 520px;">
                <div class="popup__left">
                    <h1 class="popup__header">{{__('messages.add_job')}}</h1>
                    <div class="header__underline"></div>

                    @csrf

                    <input required type="hidden" name="lang" value="{{$lang}}">

                    <input required type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <!-- class="add-cv-input" -->
                    <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>
                    <input required  type="file" name="picture" />
                    <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture_company')}}</h3>
                    <input required type="file" name="picture_company" />
                    <!-- <div class="add-cv">

                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />

                    </div>
                </div> -->

                    <div class="applying-for-job-illustration-box">
                        <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                    </div>
                </div>
                <div class="popup__right" style="position: relative;">
                    <a href="#tours_section" class="popup__closing">×</a>

                    <div class="input">
                        <label for="fullname" class="popup__label-style">{{__('messages.job_name')}}</label>
                        <input required type="text"  name="title" class="popup__input-style" />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.the_company')}}</label>
                        <input required type="text" id="company" name="company" class="popup__input-style" />
                    </div>
                    <div class="input">
                        <label for="fullname" class="popup__label-style">{{__('messages.salary')}}</label>
                        <input required type="number"  name="salary" class="popup__input-style" />
                    </div>

                    <div class="input">
                        <label for="fullname" class="popup__label-style">{{__('messages.specializations')}}</label>
                        <input required type="text"  name="specialization" class="popup__input-style" />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.deadline')}}</label>
                        <input required type="date"  name="deadline" class="popup__input-style"  />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.location')}}</label>
                        <input required type="text"  name="location" class="popup__input-style"  />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.the_contact')}}</label>
                        <input required type="text"  name="contact" class="popup__input-style"  />
                    </div>
                    <div class="input">
                        <label for="email" class="popup__label-style">{{__('messages.email')}}</label>
                        <input required type="text"  name="email" class="popup__input-style"  />
                    </div>

                    <div class="input">
                        <label for="message" class="popup__label-style">{{__('messages.requirments')}}</label>
                        <textarea name="requirments" rows="3" cols="60" class="input-message" placeholder="{{__('messages.message')}}...."></textarea>
                    </div>

                    <div class="input">
                        <label for="message" class="popup__label-style">{{__('messages.short_desc')}}</label>
                        <textarea name="description" rows="3" cols="60" class="input-message" placeholder="{{__('messages.message')}}...."></textarea>
                    </div>

                    <input required class="input-btn" type="submit" value="{{__('messages.submit')}}">

                </div>
            </div>
        </form>
    </div>

</div>
@endsection

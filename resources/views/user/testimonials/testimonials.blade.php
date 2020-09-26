@extends('user.layouts.fixed_layout')
@section('content')

<div class="search-section">
    <h1 class="search-section__header">{{__('messages.testimonials')}}</h1>
    <div class="search-section__info">
        <form action="#" class="landing-section__info-selections">
            <div class="selection-div u-margin-right-medium">
                <label for="cars" class="landing-section__info-selections-label">Cost</label>
                <div class="custom-select">
                    <select name="cost" id="cost">
                        <option value="Fully Funded">Fully Funded</option>
                        <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                </div>
            </div>
            <div class="selection-div u-margin-right-medium">
                <label for="type" class="landing-section__info-selections-label">Type</label>
                <div class="custom-select">
                    <select name="type" id="type" class="select-for-label">
                        <option value="Fully Funded">Fully Funded</option>
                        <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                </div>
            </div>
            <div class="selection-div u-margin-right-medium">
                <label for="speicialization" class="landing-section__info-selections-label">speicialization</label>
                <div class="custom-select">
                    <select name="speicialization" id="speicialization">
                        <option value="Fully Funded">Fully Funded</option>
                        <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                </div>
            </div>
            <div class="selection-div">
                <label for="language" class="landing-section__info-selections-label">Langauge</label>
                <div class="custom-select">
                    <select name="language" id="language">
                        <option value="Fully Funded">Fully Funded</option>
                        <option value="Partialy Funded">Partialy Funded</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="search-section__illustration-box">
            <img src="{{asset('img/testmonials-illustration.svg')}}" alt="organization" class="search-section__illustrations">
        </div>
    </div>
    <div class="landing-section__info-buttons-section">
        <button class="landing-section__info-buttons">
            <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
            <p>search</p>
        </button>
        <button class="landing-section__info-buttons">RESET</button>
    </div>
</div>



<div class="search-results">
    <div class="search-results__content-box">
        @forelse($testimonials as $testimonial)
        <div class="testmonials-card u-margin-top-small">
            <div class="testmonials-card-profile-pic-box">
                <img src="{{asset('storage/'.$testimonial->picture)}}" alt="testmonials-pic-1" class="testmonials-card-profile-pic" style="width:55px; height:55px; border-radius:50%">
            </div>
            <h1 class="testmonials-card-name">{{$testimonial->name}}</h1>
            <p class="testmonials-card-description">
                {{$testimonial->description}}
            </p>
            <div class="testmonials-card-rating-box">
                {{!$decimal_total_rate_testimonial = substr($testimonial->rate, 0, 3)}}

                {{!$integer_total_rate_testimonial = substr($testimonial->rate, 0, 1)}}

                <div hidden>
                    {{!$is_desimal_testimonial = $decimal_total_rate_testimonial - $integer_total_rate_testimonial }}
                </div>

                @for ($i = 1; $i <= $integer_total_rate_testimonial ; $i++) <i class="fas fa-star fa-2x"></i>

                    @endfor

                    @if ($is_desimal_testimonial >= .3 && $is_desimal_testimonial <= .8) <i class="fas fa-star-half-alt fa-2x"></i>

                        @for ($i = $integer_total_rate_testimonial + 2; $i <= 5; $i++) <i class="far fa-star fa-2x"></i>
                            @endfor


                            @else

                            @for ($i = $integer_total_rate_testimonial + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                @endfor


                                @endif
                                <span class="testmonials-card-rating-number">{{$testimonial->rate}}</span>
            </div>
        </div>
        @empty

        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            {{__("messages.no_testimonials")}}
        </div>

        @endforelse
    </div>
</div>

{{$testimonials->links()}}

@endsection

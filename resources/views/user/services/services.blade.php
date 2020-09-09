@extends('user.layouts.fixed_layout')
@section('content')



<div class="search-section">
    <h1 class="search-section__header">{{__('messages.services')}}</h1>
    <div class="search-section__info">
        <form action="{{ route('user.servicesearch')}}" class="landing-section__info-selections">



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
            <p>{{__('messages.search')}}</p>
        </button>

        <a href="{{route('user.services.index')}}" class="landing-section__info-buttons">{{__('messages.reset')}}</a>
    </div>
    </form>
</div>


<div class="search-results">
    <div class="search-results__content-box">

        @forelse($services as $service)
        <div class="search-results__card">
            <div class="card-picture-box">
                <span class="opportunity-type-label">{{$service->specialization->name}}</span>
                <img src="{{asset('storage/'.$service->picture)}}" alt="Picutre 1" class="card-picture" />
            </div>
            <h1 class="search-results__card-header">{{$service->title}}</h1>
            <p class="search-results__card-paragraph">
                {{$service->description}}
            </p>
            <div class="search-results__card-rating-box">

                <div hidden> {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $service->id)->get()->count()}}</div> @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                    @endfor

                    @else

                    {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $service->id)->get()->avg('value_rate')}}

                    {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                    {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                    <div hidden>
                        {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                    </div>

                    @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas fa-star fa-2x"></i>

                        @endfor

                        @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt fa-2x"></i>

                            @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>
                                @endfor

                                @else

                                @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                    @endfor


                                    @endif




                                    @endif

                                    <span class="rating-number">{{$sum_values_rate ?? 0  }}</span>
                                    <a href="{{route('user.services.show',$service->id)}}" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Services Yet
        </div>

        @endforelse

    </div>
    {{$services->links()}}
</div>
@endsection

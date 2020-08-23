@extends('user.layouts.fixed_layout')
@section('content')



<div class="search-section">
    <h1 class="search-section__header">Services</h1>
    <div class="search-section__info">
        <form action="{{ route('user.servicesearch')}}" class="landing-section__info-selections">
            <div class="selection-div u-margin-right-medium">
                <label for="cars" class="landing-section__info-selections-label">Cost</label>
                <div class="custom-select">
                    <select name="cost_id" id="cost">
                        <option disabled selected value="">costs</option>
                        @foreach($costs as $cost)
                        <option <?php if (isset($_GET['cost_id']) and $cost->id == $_GET['cost_id']) echo 'selected' ?> value="{{$cost->id}}">{{$cost->name_en}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="selection-div u-margin-right-medium">
                <label for="type" class="landing-section__info-selections-label">Type</label>
                <div class="custom-select">
                    <select name="type_id" id="type" class="select-for-label">
                        <option disabled selected value="">types</option>
                        @foreach($types as $type)
                        <option <?php if (isset($_GET['type_id']) and $type->id == $_GET['type_id']) echo 'selected' ?> value="{{$type->id}}">{{$type->name_en}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="selection-div u-margin-right-medium">
                <label for="speicialization" class="landing-section__info-selections-label">speicialization</label>
                <div class="custom-select">
                    <select name="specialize_id" id="speicialization">
                        <option disabled selected value="">speicializations</option>
                        @foreach($specializations as $specialization)
                        <option <?php if (isset($_GET['specialize_id']) and $specialization->id == $_GET['specialize_id']) echo 'selected' ?> value="{{$specialization->id}}">{{$specialization->name_en}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="selection-div">
                <label for="language" class="landing-section__info-selections-label">Langauge</label>
                <div class="custom-select">
                    <select name="language_id" id="language">
                        <option disabled selected value="">languages</option>
                        @foreach($languages as $language)
                        <option <?php if (isset($_GET['language_id']) and $language->id == $_GET['language_id']) echo 'selected' ?> value="{{$language->id}}">{{$language->name_en}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="search-section__illustration-box">
                <img src="img/jobs-illustration.svg" alt="jobs" class="search-section__illustrations">
            </div>
    </div>
    <div class="landing-section__info-buttons-section ">
        <button class="landing-section__info-buttons" type="submit">
            <img src="img/Search icon.svg" alt="Search icon" class="search-icon">
            <p>search</p>
        </button>

        <a href="{{route('user.services.index')}}" class="landing-section__info-buttons">RESET</a>
    </div>
    </form>
</div>


<div class="search-results">
    <div class="search-results__content-box">

        @forelse($services as $service)
        <div class="search-results__card">
            <div class="card-picture-box">
                <span class="opportunity-type-label">Fully funded</span>
                <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture" />
            </div>
            <h1 class="search-results__card-header">{{$service->title_en}}</h1>
            <p class="search-results__card-paragraph">
                {{$service->description_en}}
            </p>
            <div class="search-results__card-rating-box">

                {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $service->id)->get()->count()}} @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

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
                                    <a href="single-service-page.html" class="details-button">Details</a>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Services Yet
        </div>

        @endforelse



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
</div>
@endsection

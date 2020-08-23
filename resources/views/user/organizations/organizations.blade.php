@extends('user.layouts.fixed_layout')
@section('content')
<div class="search-section">
    <h1 class="search-section__header">Organizations</h1>
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
                <img src="img/org-illustration.svg" alt="organization" class="search-section__illustrations">
            </div>
        </div>
        <div class="landing-section__info-buttons-section">
            <button class="landing-section__info-buttons">
                <img src="img/Search icon.svg" alt="Search icon" class="search-icon">
                <p>search</p>
            </button>
            <button class="landing-section__info-buttons">RESET</button>
        </div> -->
</div>
<div class="search-results">
    <div class="search-results__content-box">
        @forelse($organizations as $organization)
        {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $organization->id)->get()}};
        {{!$followerCount = App\Followersorg::where('org_id', '=', $organization->id)->get()->count()}};
        <div class="organizations-card u-margin-top-small">
            <div class="colored-container"></div>
            <div class="logo-box" style="overflow: hidden;">
                <img src="{{asset('storage/'.$organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
            </div>
            <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$organization->id)}}">{{$organization->name_en}}</a></h1>
            <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> follower</p>
            <a data-orgid="{{$organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) following @else follow @endif</a>
        </div>


        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Organizations Yet
        </div>

        @endforelse


    </div>
    <div class="pagination">
        <div class="pagination__left-arrow-box">
        </div>
        <a href="#"><img src="img/left-arrow.svg" alt="arrow" class="pagination__left-arrow"></a>
        <a href="#" class="pagination__prev">prev</a>
        <ul class="pagination__list">
            <li class="pagination__list-item"><a href="#" class="selected">1</a></li>
            <li class="pagination__list-item"><a href="#">2</a></li>
            <li class="pagination__list-item"><a href="#">3</a></li>
            <li class="pagination__list-item"><a href="#">4</a></li>
            <li class="pagination__list-item"><a href="#">5</a></li>
        </ul>
        <a href="#" class="pagination__next">next</a>
        <div class="pagination__right-arrow-box">
            <a href="#"><img src="img/right-arrow.svg" alt="arrow" class="pagination__right-arrow"></a>
        </div>
    </div>
</div>
@endsection

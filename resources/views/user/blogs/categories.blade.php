@extends('user.layouts.fixed_layout')
@section('content')
<div class="blogs-section" style="margin-bottom: 60px;">
    <div class="blogs-section__info">
        <div class="blogs-section__info-content">
            <h1 class="blogs-section__header">Blogs</h1>
            <p class="blogs-section__paragraph">
                Check out the latest news about blogs categories that was published
                recently
            </p>
        </div>
        <div class="blogs-section__illustration-box">
            <img src="img/blogs.svg" alt="blogs" class="blogs-section__illustrations" />
        </div>
    </div>
</div>
<div class="blogs-results" style="margin-bottom: 77px;">
    <div class="blogs-results__content">

        @forelse($categories as $category)

        <div class="blogs-results__card">
            <div class="blogs-results__pic-box">
                <img src="{{asset('storage/'.$category->picture)}}" alt="blogs pic" class="blogs-results__pic" />
            </div>
            <div class="blogs-card-content">
                <h1 class="blogs-card-content__header">{{$category->name_en}}</h1>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Comments:</p>
                    <p class="blogs-card-content__subtitle-value">0</p>
                </div>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Participants:</p>
                    <p class="blogs-card-content__subtitle-value">1</p>
                </div>
            </div>
            <a href="{{route('user.categoryblogs.show',$category->id)}}" class="blogs-results__btn">visit</a>
        </div>
        @empty
        <div class="alert alert-primary" role="alert" style="transform: scale(4);">
            No Categories Yet
        </div>
        @endforelse


    </div>
</div>


@endsection

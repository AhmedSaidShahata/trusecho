@extends('user.layouts.fixed_layout')
@section('content')
<div class="blogs-section">
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
<div class="blogs-results">
    <div class="blogs-results__content">
        @forelse(categories as $categoty)
        <div class="blogs-results__card">
            <div class="blogs-results__pic-box">
                <img src="img/blog-pic.png" alt="blogs pic" class="blogs-results__pic" />
            </div>
            <div class="blogs-card-content">
                <h1 class="blogs-card-content__header">$category->name_en</h1>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Comments:</p>
                    <p class="blogs-card-content__subtitle-value">539</p>
                </div>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Participants:</p>
                    <p class="blogs-card-content__subtitle-value">539</p>
                </div>
            </div>
            <a href="{{route('user.categoryblogs.show',$category->id)}}" class="blogs-results__btn">visit</a>
        </div>
        
        @empty
        <div class="alert alert-warning" role="alert">
            No Blogs Yet
        </div>
        @endforelse

    </div>
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

@endsection

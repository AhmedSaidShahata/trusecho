@extends('user.layouts.fixed_layout')
@section('content')
<div class="blogs-section">
    <div class="blogs-section__info">
        <div class="blogs-section__info-content">
            <h1 class="blogs-section__header">{{$category->name_en}}</h1>
            <p class="blogs-section__paragraph">
                Check out the latest news about {{$category->name_en}}
            </p>
        </div>
        <div class="blogs-section__illustration-box">
            <img src="{{asset('storage/'.$category->picture)}}" alt="blogs" class="blogs-section__illustrations"  style="width: 370px; height:280px; border:4px solid black" />
        </div>
    </div>
</div>
<div class="blogs-results">
    <div class="blogs-results__content">

        @forelse($blogs as $blog)
        <div class="blogs-detailed-results__card">
            <div class="blogs-detailed-results__pic-box">
                <img src="{{asset('storage/'.$blog->picture)}}" alt="blogs pic" class="blogs-detailed-results__pic" />
            </div>
            <div class="blogs-card-content">
                <h1 class="blogs-card-content__header">{{$blog->title_en}}</h1>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Comments:</p>
                    <p class="blogs-card-content__subtitle-value">
                   {{!$comments=App\Blogcomment::where(['blog_id'=>$blog->id]) }}
                   {{$comments->get()->count()}}
                    </p>
                </div>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">Participants:</p>
                    <p class="blogs-card-content__subtitle-value">1</p>
                </div>
            </div>
            <a href="{{route('user.blogs.show',$blog->id)}}" class="blogs-detailed-results__btn">view</a>
        </div>

        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            No Blogs Yet
        </div>

        @endforelse





    </div>
</div>
{{$blogs->links()}}
@endsection

@extends('user.layouts.fixed_layout')
@section('content')
{{__('messages.participants')}}
<span hidden class="lang">{{$lang='_'.LaravelLocalization::getCurrentLocale()}}</span>
<div class="blogs-section">
    <div class="blogs-section__info">
        <div class="blogs-section__info-content">
            <h1 class="blogs-section__header">{{$category->name }}</h1>
            <p class="blogs-section__paragraph">
            {{__('messages.latest_news')}} {{$category->name }}
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
                <h1 class="blogs-card-content__header">{{$blog->title }}</h1>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">{{__('messages.comments')}}:</p>
                    <p class="blogs-card-content__subtitle-value">
                   {{!$comments=App\Blogcomment::where(['blog_id'=>$blog->id]) }}
                   {{$comments->get()->count()}}
                    </p>
                </div>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">{{__('messages.participants')}}:</p>
                    <p class="blogs-card-content__subtitle-value">1</p>
                </div>
            </div>
            <a href="{{route('user.blogs.show',$blog->id)}}" class="blogs-detailed-results__btn">{{__('messages.visit')}}</a>
        </div>

        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
        {{__('messages.no_blogs')}}
        </div>

        @endforelse





    </div>
</div>
{{$blogs->links()}}
@endsection

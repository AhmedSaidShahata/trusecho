@extends('user.layouts.fixed_layout')
@section('content')
{{__('messages.participants')}}
<span hidden class="lang">{{!$lang=LaravelLocalization::getCurrentLocale()}}</span>
<div class="blogs-section">
    <div class="blogs-section__info">
        <div class="blogs-section__info-content">
            <h1 class="blogs-section__header">{{$category->name }}</h1>
            <p class="blogs-section__paragraph">
                {{__('messages.latest_news')}} {{$category->name }}
            </p>
        </div>
        <div class="blogs-section__illustration-box">
            <img src="{{asset('storage/'.$category->picture)}}" alt="blogs" class="blogs-section__illustrations" style="width: 370px; height:280px; border:4px solid black" />
        </div>
    </div>
</div>
<a href="#apply-for-job" class="my-btn">
        <i class="fas fa-plus"></i>
        {{__('messages.add_blog')}}
    </a>
<div class="blogs-results">

    <div class="blogs-results__content">
        @forelse($blogs as $blog)
        <div class="blogs-detailed-results__card">
            <div class="blogs-detailed-results__pic-box">
                <img src="{{asset('storage/'.$blog->picture)}}" alt="blogs pic" class="blogs-detailed-results__pic" style="width:280px; height:124px; border-radius:20px" />
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


<div class="popup" id="apply-for-job">
    <form action="{{route('user.blogs.store')}}" method="post" enctype="multipart/form-data">
        <div class="popup__content">
            <div class="popup__left">
                <h1 class="popup__header">{{__('messages.apply_job')}}</h1>
                <div class="header__underline"></div>

                @csrf

                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>
                <input type="file" name="picture" />

                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture_cat')}}</h3>
                <input type="file" name="picture_category" />
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
                    <label  class="popup__label-style">{{__('messages.blog_title')}}</label>
                    <input type="text"  name="title" class="popup__input-style" />
                </div>

                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.blog_cat')}}</label>
                    <input type="text"  name="category" class="popup__input-style" />
                </div>



                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.simple_desc')}}</label>
                    <input type="text"  name="description" class="popup__input-style" />
                </div>

                <div class="input">
                    <label  class="popup__label-style">{{__('messages.content')}}</label>
                    <textarea  name="content" rows="3" cols="60" class="input-message" ></textarea>
                </div>

                <input class="input-btn" type="submit" value="{{__('messages.submit_for_review')}}">

            </div>
        </div>
    </form>
</div>
{{$blogs->links()}}
@endsection

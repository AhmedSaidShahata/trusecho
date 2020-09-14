@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}
<div class="blogs-section" style="margin-bottom: 60px;">
    @if(session()->has('success_ar') OR session()->has('success_en') )
    <div class="alert alert-success">
        {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

    </div>
    @endif
    <div class="blogs-section__info">
        <div class="blogs-section__info-content">
            <h1 class="blogs-section__header">{{__('messages.blogs')}}</h1>
            <p class="blogs-section__paragraph">
                {{__('messages.check_cat')}}
            </p>
        </div>
        <div class="blogs-section__illustration-box">
            <img src="{{asset('img/blogs.svg')}}" alt="blogs" class="blogs-section__illustrations" />
        </div>
    </div>
</div>
<a href="#apply-for-job" class="my-btn">
    <i class="fas fa-plus"></i>
    {{__('messages.add_blog')}}
</a>
<div class="blogs-results" style="margin-bottom: 77px;">

    <div class="blogs-results__content">

        @forelse($categories as $category)

        <div class="blogs-results__card">
            <div class="blogs-results__pic-box">
                <img src="{{asset('storage/'.$category->picture)}}" alt="blogs pic" class="blogs-results__pic" style="width:88; height:89px; border-radius:20px" />
            </div>
            <div class="blogs-card-content">
                <h1 class="blogs-card-content__header">{{$category->name}}</h1>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle"> {{__('messages.comments')}}:</p>
                    <p class="blogs-card-content__subtitle-value">0</p>
                </div>
                <div class="blogs-card-content-info">
                    <p class="blogs-card-content__subtitle">{{__('messages.participants')}}:</p>
                    <p class="blogs-card-content__subtitle-value">1</p>
                </div>
            </div>
            <a href="{{route('user.categoryblogs.show',$category->id)}}" class="blogs-results__btn">{{__('messages.visit')}}</a>
        </div>
        @empty
        <div class="alert alert-primary" role="alert" style="transform: scale(4);">
            {{__('messages.no_cat')}}
        </div>
        @endforelse


    </div>
</div>



<div class="popup" id="apply-for-job">
    <form action="{{route('user.blogs.store')}}" method="post" enctype="multipart/form-data">
        <div class="popup__content" style="padding-top:100px;">
            <div class="popup__left">
                <h1 class="popup__header">{{__('messages.add_blog')}}</h1>
                <div class="header__underline"></div>

                @csrf

                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>


                <div class="add-cv" >
                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />
                        <input type="file" name="picture" accept="image/*" onchange="showPreview(event);" />
                    </div>
                </div>

                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture_cat')}}</h3>

                <div class="add-cv" >
                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />
                        <input type="file" name="picture_category" accept="image/*" onchange="showPreview(event);" />
                    </div>
                </div>

                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
            </div>
            <div class="popup__right" style="position: relative;">
                <a href="#tours_section" class="popup__closing">×</a>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.blog_title')}}</label>
                    <input type="text" name="title" class="popup__input-style" />
                </div>

                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.blog_cat')}}</label>
                    <input type="text" name="category" class="popup__input-style" />
                </div>



                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.simple_desc')}}</label>
                    <input type="text" name="description" class="popup__input-style" />
                </div>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.content')}}</label>
                    <textarea name="content" rows="3" cols="60" class="input-message"></textarea>
                </div>

                <input class="input-btn" type="submit" value="{{__('messages.submit_for_review')}}">

            </div>
        </div>
    </form>
</div>



@endsection

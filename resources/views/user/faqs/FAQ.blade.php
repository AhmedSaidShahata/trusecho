@extends('user.layouts.fixed_layout')
@section('content')

<div class="faq-section">
    <h1 class="faq-section__header">{{__('messages.asked_q')}}</h1>
    <div class="faq-section__info">
        <div class="faq-section__info-content">
            <h1 class="faq-section__sub-header">
            {{__('messages.common_q')}}
            </h1>
            <p class="faq-section__paragraph">
            {{__('messages.more_q')}}
                 <a href="{{route('user.contacts.index')}}">
                 {{__('messages.here')}}
                 </a>
            </p>
        </div>

        <img src="{{asset('img/faq.svg')}}" alt="organization" class="faq-section__illustration" />
    </div>
</div>
<div class="accordion-section">
    <div class="accordion" >

        @forelse($faqs as $faq)
        <div class="tabs">
            <div class="tab">
                <input type="checkbox" id="chck5">
                <label class="tab-label" for="chck5">{{$faq->question}}</label>
                <div class="tab-content">
                {{$faq->answer}}
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            {{__('messages.no_faqs')}}
        </div>

        @endforelse
    </div>
</div>
@endsection

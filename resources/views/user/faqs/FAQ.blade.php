@extends('user.layouts.fixed_layout')
@section('content')
<div class="faq-section">
    <h1 class="faq-section__header">Frequently Asked Questions</h1>
    <div class="faq-section__info">
        <div class="faq-section__info-content">
            <h1 class="faq-section__sub-header">
                These are the most common questions about Torsque
            </h1>
            <p class="faq-section__paragraph">
                if you still have more questions, you can contact us <a href="contact-us.html">here</a>
            </p>
        </div>

        <img src="img/faq.svg" alt="organization" class="faq-section__illustration" />
    </div>
</div>
<div class="accordion-section">
    <div class="accordion">

        @forelse($faqs as $faq)
        <div class="tabs">
            <div class="tab">
                <input type="checkbox" id="chck5">
                <label class="tab-label" for="chck5">{{$faq->question}}?</label>
                <div class="tab-content">
                    {{$faq->answer}}
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection

@extends('home')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($faq) ? __('messages.edit_q')  : __('messages.add_q') }}</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>
                    {{$error}}
                </li>

            </ul>
            @endforeach
        </div>
        @endif

        <form action="{{isset($faq) ? route('admin.faqs.update', $faq->id ): route('admin.faqs.store')}} " method="POST">
            @if(isset($faq))
            @method('PUT')
            @endif
            @csrf


            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label for="faq">{{__('messages.question')}}</label>
                <input type="text" name="question" class="form-control" value="{{isset($faq) ? $faq->question : '' }} ">

            </div>
            <div class="form-group">
                <label for="faq">{{__('messages.answer')}}
                </label> <textarea class="form-control" name="answer" id="" cols="50" rows="10">{{isset($faq) ? $faq->answer: ''}}</textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{ isset($faq) ? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

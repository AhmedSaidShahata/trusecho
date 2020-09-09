@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($language) ? __('messages.edit_lang') : __('messages.add_lang') }}</h2>
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


        <form action="{{isset($language) ? route('admin.languages.update', $language->id ) : route('admin.languages.store')}} " method="POST">
            @if(isset($language))
            @method('PUT')
            @endif
            @
            <input type="hidden" value="{{$lang}}" name="lang">
            <div class="form-group">
                <label for="language">{{__('messages.name')}}</label>
                <input required language="text" name="name" class="form-control" value="{{isset($language) ? $language->name : ''}}"  >

            </div>


            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($language) ? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

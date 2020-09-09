@extends('home')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($type) ? __('messages.edit_type') : __('messages.add_type')}}</h2>
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

        <form action="{{isset($type) ? route('admin.types.update', $type->id ): route('admin.types.store')}} " method="POST">
            @if(isset($type))
            @method('PUT')
            @endif
            @csrf

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label for="type">{{__('messages.name')}}</label>
                <input type="text" required name="name" class="form-control" value="{{isset($type) ? $type->name : ''}}">
            </div>


            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($type) ? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

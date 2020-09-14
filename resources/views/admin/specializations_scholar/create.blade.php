@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">
    <div class="card-header">
        <h2>{{isset($specialization) ? __('messages.edit_specialize') : __('messages.add_specialize') }}</h2>
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

        <form action="{{isset($specialization) ? route('admin.scholarspecializes.update', $specialization->id) : route('admin.scholarspecializes.store')}} " method="POST">
            @if(isset($specialization))
            @method('PUT')
            @endif
            @csrf

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label for="specialization">{{__('messages.name')}}</label>
                <input type="text" required name="name" class="form-control" value="{{isset($specialization) ? $specialization->name : ''}}" >
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($specialization) ?__('messages.update'): __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

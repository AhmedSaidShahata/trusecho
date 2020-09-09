@extends('home')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($cost) ?  __('messages.edit_cost') : __('messages.add_cost') }}</h2>
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

        <form action="{{isset($cost) ? route('admin.costs.update', $cost->id ): route('admin.costs.store')}} " method="POST">
            @if(isset($cost))
            @method('PUT')
            @endif
            @csrf

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label for="Cost">{{__('messages.name')}} </label>
                <input type="text" name="name" class="form-control" value="{{isset($cost) ? $cost->name : ''}}">
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($cost) ? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

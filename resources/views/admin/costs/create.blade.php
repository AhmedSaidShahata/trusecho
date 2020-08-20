@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($cost) ? 'Update Your Cost' : 'Add a New Cost'}}</h2>
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
            <div class="form-group">
                <label for="Cost">Name Enghlish</label>
                <input type="text" name="name_en" class="form-control" value="{{isset($cost) ? $cost->name_en : ''}}" placeholder="Add a new Cost">
            </div>

            <div class="form-group">
                <label for="Cost">Name Arabic</label>
                <input type="text" name="name_ar" class="form-control" value="{{isset($cost) ? $cost->name_ar : ''}}" placeholder="Add a new Cost">
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($cost) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

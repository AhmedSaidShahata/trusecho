@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($type) ? 'Update Your type' : 'Add a New type'}}</h2>
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
            <div class="form-group">
                <label for="type">type Name:</label>
                <input type="text" name="name_en" class="form-control" value="{{isset($type) ? $type->name_en : ''}}"  placeholder="Add a new type English">

            </div>

            <div class="form-group">
                <label for="type">type Name:</label>
                <input type="text" name="name_ar" class="form-control" value="{{isset($type) ? $type->name_ar : ''}}"  placeholder="Add a new type Arabic">

            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($type) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($language) ? 'Update Your language' : 'Add a New language'}}</h2>
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
            @csrf
            <div class="form-group">
                <label for="language">language Name:</label>
                <input language="text" name="name" class="form-control" value="{{isset($language) ? $language->name : ''}}"  placeholder="Add a new language">

            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($language) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

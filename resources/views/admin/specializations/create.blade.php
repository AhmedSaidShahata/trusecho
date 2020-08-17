@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($specialization) ? 'Update Your specialization' : 'Add a New specialization'}}</h2>
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

        <form action="{{isset($specialization) ? route('admin.specializations.update', $specialization->id ): route('admin.specializations.store')}} " method="POST">
            @if(isset($specialization))
            @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="specialization">specialization Name:</label>
                <input type="text" name="name" class="form-control" value="{{isset($specialization) ? $specialization->name : ''}}"  placeholder="Add a new specialization">

            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($specialization) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($scholarship)?'Edit scholarship':'Add scholarship'}}</h2>
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
        <form action="{{isset($scholarship) ? route('admin.scholarships.update',$scholarship->id) : route('admin.scholarships.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($scholarship))
            @method('PUT')

            @endif

            <div class="form-group">
                <label for="category">scholarship title:</label>
                <input type="text" name="title" class="form-control" value="{{isset($scholarship)?$scholarship->title:''}}" placeholder="Add a new scholarship">
            </div>
            <div class="form-group">
                <label for="category">scholarship description</label>
                <input type="text" name="description" class="form-control" value="{{isset($scholarship)?$scholarship->description:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">content</label>
                <!-- <textarea class="form-control" name="content" rows="3"></textarea> -->

                <textarea class="form-control" name="content" id="" cols="50" rows="10">
                {{isset($scholarship) ? $scholarship->content : ''}}
                </textarea>

                @if(isset($scholarship))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$scholarship->picture}}" alt="{{$scholarship->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>

                <div class="input-group ">

                    <label>Cost</label>

                    <select class="form-control" name="cost_id">
                        @foreach($costs as $cost)

                        <option <?php if (isset($scholarship) and $cost->id == $scholarship->cost_id) echo 'selected' ?> value="{{$cost->id}}">{{$cost->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($scholarship)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

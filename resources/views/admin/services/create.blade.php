@extends('home')
@section('content')



<div class="card">

    <div class="card-header">
        <h2>{{isset($service)?'Edit service':'Add service'}}</h2>
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

        <form action="{{isset($service) ? route('admin.services.update',$service->id) : route('admin.services.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($service))
            @method('PUT')
            @endif
            <!----------------------------------------------- English -------------------------------------------->
            <div class="form-group">
                <label>Service title English</label>
                <input type="text" name="title_en" class="form-control" value="{{isset($service)?$service->title_en:''}}" placeholder="Add a new service">
            </div>
            <div class="form-group">
                <label>Service description English</label>
                <input type="text" name="description_en" class="form-control" value="{{isset($service)?$service->description_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Service content English</label>
                <textarea class="form-control" name="content_en" id="" cols="50" rows="10">{{isset($service) ? $service->content_en : ''}}</textarea>
            </div>


            <!----------------------------------------------- Arabic -------------------------------------------->


            <div class="form-group">
                <label>Service title Arabic</label>
                <input type="text" name="title_ar" class="form-control" value="{{isset($service)?$service->title_ar:''}}" placeholder="Add a new service">
            </div>
            <div class="form-group">
                <label>Service description Arabic</label>
                <input type="text" name="description_ar" class="form-control" value="{{isset($service)?$service->description_ar:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Service content Arabic</label>
                <textarea class="form-control" name="content_ar" id="" cols="50" rows="10">{{isset($service) ? $service->content_ar : ''}}</textarea>
                @if(isset($service))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$service->picture}}" alt="{{$service->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Service Price</label>
                <input type="number" class="form-control" name="price" value="{{isset($service) ? $service->price : ''}}">
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($service)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

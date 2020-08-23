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
            <p class="text-center p-2" style="background:burlywood">Service Engish </p>

            <div class="form-group">
                <label> title </label>
                <input type="text" name="title_en" class="form-control" value="{{isset($service)?$service->title_en:''}}" placeholder="Add a new service">
            </div>
            <div class="form-group">
                <label> description </label>
                <input type="text" name="description_en" class="form-control" value="{{isset($service)?$service->description_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> content </label>
                <textarea class="form-control" name="content_en" id="" cols="50" rows="10">{{isset($service) ? $service->content_en : ''}}</textarea>
            </div>
            <div class="input-group ">
                <label>Costs</label>
                <select class="form-control" name="cost_id">
                    @foreach($costs as $cost)

                    <option <?php if (isset($job) and $cost->id == $job->cost_id) echo 'selected' ?> value="{{$cost->id}}">{{$cost->name_en}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mt-2">
                <label>Types</label>
                <select class="form-control" name="type_id">
                    @foreach($types as $type)

                    <option <?php if (isset($job) and $type->id == $job->type_id) echo 'selected' ?> value="{{$type->id}}">{{$type->name_en}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mt-2">
                <label>Specializations</label>
                <select class="form-control" name="specialize_id">
                    @foreach($specializations as $specialization)

                    <option <?php if (isset($job) and $specialization->id == $job->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">{{$specialization->name_en}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group my-2">
                <label>languages</label>
                <select class="form-control" name="language_id">
                    @foreach($languages as $language)

                    <option <?php if (isset($job) and $language->id == $job->language_id) echo 'selected' ?> value="{{$language->id}}">{{$language->name_en}}</option>
                    @endforeach
                </select>
            </div>

            <!----------------------------------------------- Arabic -------------------------------------------->

            <p class="text-center p-2" style="background:burlywood">Service Engish </p>
            <div class="form-group">
                <label> title </label>
                <input type="text" name="title_ar" class="form-control" value="{{isset($service)?$service->title_ar:''}}" placeholder="Add a new service">
            </div>
            <div class="form-group">
                <label>description </label>
                <input type="text" name="description_ar" class="form-control" value="{{isset($service)?$service->description_ar:''}}" placeholder="Add a description">
            </div>

            <label for="exampleFormControlTextarea1">content </label>
            <textarea class="form-control" name="content_ar" id="" cols="50" rows="10">{{isset($service) ? $service->content_ar : ''}}</textarea>
            <div class="input-group mt-2 ">
                <label>Cost</label>
                <select class="form-control" name="cost_id">
                    @foreach($costs as $cost)
                    <option <?php if (isset($job) and $cost->id == $job->cost_id) echo 'selected' ?> value="{{$cost->id}}">{{$cost->name_ar}}</option>
                    @endforeach
                </select>
            </div>


            <div class="input-group mt-2">
                <label>Types</label>
                <select class="form-control" name="type_id">
                    @foreach($types as $type)

                    <option <?php if (isset($job) and $type->id == $job->type_id) echo 'selected' ?> value="{{$type->id}}">{{$type->name_ar}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mt-2">
                <label>Specializations</label>
                <select class="form-control" name="specialize_id">
                    @foreach($specializations as $specialization)

                    <option <?php if (isset($job) and $specialization->id == $job->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">{{$specialization->name_ar}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group my-2">
                <label>languages</label>
                <select class="form-control" name="language_id">
                    @foreach($languages as $language)

                    <option <?php if (isset($job) and $language->id == $job->language_id) echo 'selected' ?> value="{{$language->id}}">{{$language->name_ar}}</option>
                    @endforeach
                </select>
            </div>
            <!----------------------------------------------- Other -------------------------------------------->
            <p class="text-center p-2 mt-3" style="background:burlywood">Other</p>

            <div class="form-group">
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

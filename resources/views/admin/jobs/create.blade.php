@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($job)?'Edit job':'Add job'}}</h2>
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
        <form action="{{isset($job) ? route('admin.jobs.update',$job->id) : route('admin.jobs.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($job))
            @method('PUT')

            @endif
            <!----------------------------------------- English ----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">job English </p>
            <div class="form-group">
                <label for="category"> title </label>
                <input type="text" name="title_en" class="form-control" value="{{isset($job)?$job->title_en:''}}" placeholder="Add a new job">
            </div>
            <div class="form-group">
                <label for="category">description </label>
                <input type="text" name="description_en" class="form-control" value="{{isset($job)?$job->description_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">heading Details </label>
                <input type="text" name="heading_details_en" class="form-control" value="{{isset($job)?$job->heading_details_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Location </label>
                <input type="text" name="location_en" class="form-control" value="{{isset($job)?$job->location_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Requirments </label>
                <textarea class="form-control" name="requirments_en" id="" cols="50" rows="10">{{isset($job) ? $job->requirments_en : ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">content </label>
                <textarea class="form-control" name="content_en" id="" cols="50" rows="10">{{isset($job) ? $job->content_en : ''}}</textarea>
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

            <!----------------------------------------- Arabic ----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">job Arabic </p>
            <div class="form-group">
                <label for="category">title </label>
                <input type="text" name="title_ar" class="form-control" value="{{isset($job)?$job->title_ar:''}}" placeholder="Add a new job">
            </div>
            <div class="form-group">
                <label for="category">description </label>
                <input type="text" name="description_ar" class="form-control" value="{{isset($job)?$job->description_ar:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="category">heading Details </label>
                <input type="text" name="heading_details_ar" class="form-control" value="{{isset($job)?$job->heading_details_ar:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Location </label>
                <input type="text" name="location_ar" class="form-control" value="{{isset($job)?$job->location_ar:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Requirments </label>
                <textarea class="form-control" name="requirments_ar" id="" cols="50" rows="10">{{isset($job) ? $job->requirments_ar : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">content </label>
                <textarea class="form-control" name="content_ar" id="" cols="50" rows="10">{{isset($job) ? $job->content_ar : ''}}</textarea>
            </div>
            <div class="input-group ">

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
            <!----------------------------------------- Other ----------------------------------------->

            <p class="text-center p-2" style="background:burlywood">Other</p>

            <div class="form-group">
                <label for="category">Deadline </label>
                <input type="date" name="deadline" class="form-control" value="{{isset($job)?$job->deadline:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="category">Email </label>
                <input type="text" name="email" class="form-control" value="{{isset($job)?$job->email:''}}" placeholder="Add Email">
            </div>
            <div class="form-group">
                @if(isset($job))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$job->picture}}" alt="{{$job->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($job)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

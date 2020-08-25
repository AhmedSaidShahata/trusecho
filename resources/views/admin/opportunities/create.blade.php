@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($opportunity)?'Edit opportunity':'Add opportunity'}}</h2>
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
        <form action="{{isset($opportunity) ? route('admin.opportunitys.update',$opportunity->id) : route('admin.opportunitys.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($opportunity))
            @method('PUT')

            @endif
            <!----------------------------------------- English ----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">opportunity English </p>
            <div class="form-group">
                <label for="category"> title </label>
                <input type="text" name="title_en" class="form-control" value="{{isset($opportunity)?$opportunity->title_en:''}}" placeholder="Add a new opportunity">
            </div>
            <div class="form-group">
                <label for="category">description </label>
                <input type="text" name="description_en" class="form-control" value="{{isset($opportunity)?$opportunity->description_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">heading Details </label>
                <input type="text" name="heading_details_en" class="form-control" value="{{isset($opportunity)?$opportunity->heading_details_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Location </label>
                <input type="text" name="location_en" class="form-control" value="{{isset($opportunity)?$opportunity->location_en:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Requirments </label>
                <textarea class="form-control" name="requirments_en" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->requirments_en : ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">content </label>
                <textarea class="form-control" name="content_en" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->content_en : ''}}</textarea>
            </div>


            <!----------------------------------------- Arabic ----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">opportunity Arabic </p>
            <div class="form-group">
                <label for="category">title </label>
                <input type="text" name="title_ar" class="form-control" value="{{isset($opportunity)?$opportunity->title_ar:''}}" placeholder="Add a new opportunity">
            </div>
            <div class="form-group">
                <label for="category">description </label>
                <input type="text" name="description_ar" class="form-control" value="{{isset($opportunity)?$opportunity->description_ar:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="category">heading Details </label>
                <input type="text" name="heading_details_ar" class="form-control" value="{{isset($opportunity)?$opportunity->heading_details_ar:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Location </label>
                <input type="text" name="location_ar" class="form-control" value="{{isset($opportunity)?$opportunity->location_ar:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Requirments </label>
                <textarea class="form-control" name="requirments_ar" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->requirments_ar : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">content </label>
                <textarea class="form-control" name="content_ar" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->content_ar : ''}}</textarea>
            </div>
        
            <!----------------------------------------- Other ----------------------------------------->

            <p class="text-center p-2" style="background:burlywood">Other</p>

            <div class="form-group">
                <label for="category">Deadline </label>
                <input type="date" name="deadline" class="form-control" value="{{isset($opportunity)?$opportunity->deadline:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="category">Email </label>
                <input type="text" name="email" class="form-control" value="{{isset($opportunity)?$opportunity->email:''}}" placeholder="Add Email">
            </div>
            <div class="form-group">
                @if(isset($opportunity))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$opportunity->picture}}" alt="{{$opportunity->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($opportunity)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

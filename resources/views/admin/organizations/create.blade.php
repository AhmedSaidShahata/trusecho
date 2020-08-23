@extends('home')
@section('content')



<div class="card">

    <div class="card-header">
        <h2>{{isset($organization)?'Edit organization':'Add organization'}}</h2>
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

        <form action="{{isset($organization) ? route('admin.organizations.update',$organization->id) : route('admin.organizations.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($organization))
            @method('PUT')

            @endif

            <!-------------------------------------------------------- English ------------------------------------>
            <p class="text-center p-2" style="background:burlywood">Oraganization Engish </p>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name_en" class="form-control" value="{{isset($organization)?$organization->name_en:''}}" placeholder="Add a new organization">
            </div>
            <div class="form-group">
                <label>country</label>
                <input type="text" name="country_en" class="form-control" value="{{isset($organization)?$organization->country_en:''}}" placeholder="Add Country">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Dsecription</label>
                <textarea class="form-control" name="description_en" id="" cols="50" rows="10">{{isset($organization) ? $organization->description_en : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">About</label>
                <textarea class="form-control" name="about_en" id="" cols="50" rows="10">{{isset($organization) ? $organization->about_en : ''}}</textarea>
            </div>

            <!-------------------------------------------------------- Arabic ------------------------------------>
            <p class="text-center p-2" style="background:burlywood">organization Arabic </p>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name_ar" class="form-control" value="{{isset($organization)?$organization->name_ar:''}}" placeholder="Add a new organization">
            </div>
            <div class="form-group">
                <label>country</label>
                <input type="text" name="country_ar" class="form-control" value="{{isset($organization)?$organization->country_ar:''}}" placeholder="Add Country">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Dsecription</label>
                <textarea class="form-control" name="description_ar" id="" cols="50" rows="10">{{isset($organization) ? $organization->description_ar : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">About</label>
                <textarea class="form-control" name="about_ar" id="" cols="50" rows="10">{{isset($organization) ? $organization->about_ar : ''}}</textarea>
            </div>

            <!------------------------------------------- other -------------------------------------------->
            <p class="text-center p-2" style="background:burlywood">Other</p>


            <div class="form-group">
                @if(isset($organization))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$organization->picture_org}}" alt="{{$organization->name_en}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label> Organization Image </label>
                    <div class="custom-file">
                        <input type="file" name="picture_org">
                    </div>
                </div>
            </div>


            <div class="form-group">
                @if(isset($organization))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$organization->picture_cover}}" alt="{{$organization->name_en}}">
                </div>
                @endif
                <div class="input-group my-3">
                <label> Organization Cover </label>
                    <div class="custom-file">
                        <input type="file" name="picture_cover">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control" value="{{isset($organization)?$organization->email:''}}" placeholder="Add email">
            </div>

            <div class="form-group">
                <label>website</label>
                <input type="text" name="website" class="form-control" value="{{isset($organization)?$organization->website:''}}" placeholder="Add Website">
            </div>

            <div class="form-group">
                <label>Whatsapp Number</label>
                <input type="text" name="whatsapp" class="form-control" value="{{isset($organization)?$organization->whatsapp:''}}" placeholder="Add Whatsapp Number">
            </div>


            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($organization)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

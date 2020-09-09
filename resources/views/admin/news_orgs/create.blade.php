@extends('home')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">
    <div class="card-header">
        <h2>{{isset($newsorg) ? __('messages.edit_news')  :  __('messages.add_news') }}</h2>
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
        <form action="{{isset($newsorg) ? route('admin.newsorgs.update',$newsorg->id) : route('admin.newsorgs.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($newsorg))
            @method('PUT')
            @endif


            <div class="input-group my-3 ">

                <label>{{__('messages.organizations')}}</label>


                <select class="form-control" name="organization_id">
                    @forelse($my_orgs as $my_org)
                    <option <?php if (isset($newsorg) and $my_org->id == $newsorg->organization_id) echo 'selected' ?> value="{{$my_org->id}}">
                        {{$my_org->name}}
                    </option>
                    @empty
                    <option disabled selected>
                        Please Add Oragnizaton First
                    </option>
                    @endforelse
                </select>
            </div>

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label for="category">{{__('messages.title')}}</label>
                <input type="text" name="title" class="form-control" value="{{isset($newsorg)?$newsorg->title:''}}">
            </div>
            <div class="form-group">
                <label for="category">{{__('messages.description')}}</label>
                <input type="text" name="description" class="form-control" value="{{isset($newsorg)?$newsorg->description:''}}">
            </div>


            <div class="form-group">
                <label for="category">{{__('messages.deadline')}}</label>
                <input type="date" name="deadline" class="form-control" value="{{isset($newsorg) ? $newsorg->deadline : '' }}">
            </div>

            <div class="form-group">
                @if(isset($newsorg))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$newsorg->picture}}" alt="{{$newsorg->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        {{__('messages.picture')}}
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($newsorg)? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')

@section('content')



{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.categories.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_cat')}}</a>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">{{__('messages.serial')}}</th>
            <th scope="col">{{__('messages.picture')}}</th>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.add_date')}}</th>
            <th scope="col">{{__('messages.update_date')}}</th>
            <th scope="col">{{__('messages.controls')}}</th>

        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td><img src="{{asset('storage/'.$category->picture)}}" alt="image blog" style="width:100px;height:100px"></td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.categories.destroy',$category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
        {{__('messages.no_cat')}}
        </div>

        @endforelse
    </tbody>
    {{$categories->links()}}
</table>




@endsection

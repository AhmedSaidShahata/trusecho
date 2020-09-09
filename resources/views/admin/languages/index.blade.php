@extends('home')

@section('content')



{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.languages.create')}}" class="mt-2 btn btn-primary form-control">

    {{__('messages.add_lang')}}

</a>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">{{__('messages.serial')}}</th>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.add_date')}}</th>
            <th scope="col">{{__('messages.update_date')}}</th>
            <th scope="col">{{__('messages.controls')}}</th>

        </tr>
    </thead>
    <tbody>
        @forelse($languages as $language)
        <tr>
            <th scope="row">{{$language->id}}</th>
            <td>{{$language->name}}</td>
            <td>{{$language->created_at}}</td>
            <td>{{$language->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.languages.edit',$language->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.languages.destroy',$language->id)}}">
                    @csrf
                    @method('DELETE')
                    <button language="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            {{__('messages_no_langs')}}
        </div>

        @endforelse

    </tbody>
</table>




@endsection

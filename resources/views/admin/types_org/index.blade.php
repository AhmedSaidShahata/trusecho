@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.typeorgs.create')}}" class="mt-2 btn btn-primary form-control">

{{__('messages.add_type')}}
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
        @forelse($types as $type)
        <tr>
            <th scope="row">{{$type->id}}</th>
            <td>{{$type->name}}</td>
            <td>{{$type->created_at}}</td>
            <td>{{$type->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.types.edit',$type->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.types.destroy',$type->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
        {{__('messages.no_types')}}
        </div>

        @endforelse

    </tbody>
</table>




@endsection

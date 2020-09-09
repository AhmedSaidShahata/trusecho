@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.costs.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_cost')}}</a>
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
        @forelse($costs as $cost)
        <tr>
            <th scope="row">{{$cost->id}}</th>
            <td>{{$cost->name}}</td>
            <td>{{$cost->created_at}}</td>
            <td>{{$cost->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.costs.edit',$cost->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.costs.destroy',$cost->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
        {{__('messages.no_cost')}}
        </div>

        @endforelse

    </tbody>
</table>




@endsection

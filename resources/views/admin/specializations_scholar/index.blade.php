@extends('home')

@section('content')


{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.scholarspecializes.create')}}" class="mt-2 btn btn-primary form-control">
    {{__('messages.add_specialize')}}
</a>

<div style="overflow-x:auto;">
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
            @forelse($specializations as $specialization)
            <tr>
                <th scope="row">{{$specialization->id}}</th>
                <td>{{$specialization->name}}</td>
                <td>{{$specialization->created_at}}</td>
                <td>{{$specialization->updated_at}}</td>
                <td class="d-flex">

                    <a href="{{route('admin.scholarspecializes.edit',$specialization->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                    <form method="POST" class="form-inline" action="{{route('admin.scholarspecializes.destroy',$specialization->id)}}">
                        @csrf
                        @method('DELETE')
                        <button specialization="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                {{__('messages.no_specialize')}}
            </div>

            @endforelse

        </tbody>
    </table>
    {{$specializations->links()}}
</div>




@endsection

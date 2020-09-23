@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif



<div style="overflow-x: auto;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.buyer')}}</th>
                <th scope="col">{{__('messages.service_name')}}</th>
                <th scope="col">{{__('messages.service_price')}}</th>
                <th scope="col">{{__('messages.watch')}}</th>
                <th scope="col">{{__('messages.order_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($order_services as $order_service)
            <tr class="{{ $order_service->seen == 0 ? 'bg-red': ''}} ">
                <th scope="row">{{$order_service->service_id}}</th>
                <td>{{$order_service->name_on_card}}</td>

                <td>
                    {{! $service=App\Service::find($order_service->service_id) }}
                    {{$service->title}}
                </td>

                <td>

                    {{$service->price}}
                </td>
                <td>
                    {{$order_service->seen==1 ? __('messages.watched') : __('messages.not_watched') }}

                </td>

                <td>{{$order_service->created_at}}</td>

                <td class="d-flex">

                    <a href="{{route('admin.orderservices.show',$order_service->id)}}" class="btn"> <i class="far fa-eye"></i></a>

                    <form method="POST" class="form-inline" action="{{route('admin.orderservices.destroy',$order_service->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                {{__('messages.no_order')}}
            </div>

            @endforelse

        </tbody>
    </table>
</div>




@endsection

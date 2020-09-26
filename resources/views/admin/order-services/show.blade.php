@extends('home')

@section('content')

{{! $service=App\Service::find($orderservice->service_id) }}
<div class="card show">

    <div class="card-header">
        <h2>
        </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.buyer')}}
            </li>
            <li class="list-group-item">
            {{$orderservice->name_on_card}}
            </li>
            <li class="list-group-item">
                {{__('messages.service_name')}}
            </li>
            <li class="list-group-item">
                {{$service->title}}
            </li>
            <li class="list-group-item">
                {{__('messages.service_price')}}
            </li>
            <li class="list-group-item">
                {{$service->price}}
            </li>

            <li class="list-group-item">
                {{__('messages.order_date')}}
            </li>
            <li class="list-group-item">
                {{$orderservice->created_at}}
            </li>
        </ul>
        <a href="{{route('admin.orderservices.index')}}" class="form-control btn btn-primary">
            {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

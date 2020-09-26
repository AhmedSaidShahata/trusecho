@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.services.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_service')}}</a>

<div style="overflow-x:auto ;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="cpl">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.instruction_buyer')}}</th>
                <th scope="col">{{__('messages.deliver_time')}}</th>
                <th scope="col">{{__('messages.type')}}</th>
                <th scope="col">{{__('messages.creator')}}</th>
                <th scope="col">{{__('messages.price')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service )
            <tr>
                <th scope="row">{{$service->id}}</th>
                <td><img src="{{asset('storage/'.$service->picture)}}" alt="image service" style="width:100px;height:100px"></td>
                <td>{{$service->title}}</td>
                <td>
                    {{substr($service->description,0,20)}}
                </td>
                <td>
                    {{substr($service->content,0,20)}}

                </td>
                <td>{{$service->delivery_time}}</td>
                <td>{{$service->type->name}}</td>
                <td>{{$service->user->name}}</td>
                <td>{{$service->price}}</td>

                <td class="d-flex">
                    <a href="{{route('admin.services.show',$service->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <div hidden>{{!$best_service=App\Bestservice::where('service_id', '=',$service->id)->count()}}</div>
                    <input {{$best_service > 0 ? 'checked' : '' }} type="checkbox" data-serviceid="{{$service->id}}" class="best-service btn btn-primary">
                    <a href="{{route('admin.services.edit',$service->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.services.destroy',$service->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                {{__('messages.no_services')}}
            </div>
            @endforelse
        </tbody>
    </table>
    {{$services->links()}}
</div>
@endsection

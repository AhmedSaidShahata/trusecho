@extends('home')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
<div style="overflow-x:auto ;">
    <table class="table table-dark">
        <a href="{{route('admin.services.create')}}" class="mt-2 btn btn-primary form-control">Add service</a>
        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">image</th>
                <th scope="col">Title English</th>
                <th scope="col">Description English</th>
                <th scope="col">Content English </th>
                <th scope="col">Title Arabic</th>
                <th scope="col">Description Arabic</th>
                <th scope="col">Content Arabic</th>
                <th scope="col">Price</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service )
            <tr>
                <th scope="row">{{$service->id}}</th>
                <td><img src="{{asset('storage/'.$service->picture)}}" alt="image service" style="width:100px;height:100px"></td>
                <td>{{$service->title_en}}</td>
                <td>{{$service->description_en}}</td>
                <td>{{$service->content_en}}</td>
                <td>{{$service->title_ar}}</td>
                <td>{{$service->description_ar}}</td>
                <td>{{$service->content_ar}}</td>
                <td>{{$service->price}}</td>

                <td class="d-flex">
                    <div hidden>{{!$best_service=App\Bestservice::where('service_id', '=',$service->id)->count()}}</div>
                    <button data-serviceid="{{$service->id}}" class="best-service btn btn-primary"> {{$best_service > 0 ? 'UnBest' : 'Best'}} </button>
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
                No services Yet
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('home')
@section('content')
<a href="{{route('admin.scholarships.create')}}" class="mt-2 btn btn-primary form-control">Add ScholarShip</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">image</th>
                <th scope="col">Title English</th>
                <th scope="col">Description English</th>
                <th scope="col">Content English</th>
                <th scope="col">heading details English</th>
                <th scope="col">location English</th>
                <th scope="col">requirments English</th>
                <th scope="col">Title Arabic</th>
                <th scope="col">Description Arabic</th>
                <th scope="col">Content Arabic</th>
                <th scope="col">heading details Arabic</th>
                <th scope="col">location Arabic</th>
                <th scope="col">requirments Arabic</th>
                <th scope="col">Deadline</th>
                <th scope="col">Email</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @forelse($scholarships as $scholarship )
            <tr>
                <th scope="row">{{$scholarship->id}}</th>
                <td><img src="{{asset('storage/'.$scholarship->picture)}}" alt="image scholarship" style="width:100px;height:100px"></td>
                <td>{{$scholarship->title_en}}</td>
                <td>{{$scholarship->description_en}}</td>
                <td>{{$scholarship->content_en}}</td>
                <td>{{$scholarship->heading_details_en}}</td>
                <td>{{$scholarship->location_en}}</td>
                <td>{{$scholarship->requirments_en}}</td>
                <td>{{$scholarship->title_ar}}</td>
                <td>{{$scholarship->description_ar}}</td>
                <td>{{$scholarship->content_ar}}</td>
                <td>{{$scholarship->heading_details_ar}}</td>
                <td>{{$scholarship->location_ar}}</td>
                <td>{{$scholarship->requirments_ar}}</td>
                <td>{{$scholarship->deadline}}</td>
                <td>{{$scholarship->email}}</td>
                <td class="d-flex">

                    <a href="{{route('admin.scholarships.edit',$scholarship->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.scholarships.destroy',$scholarship->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                No scholarships Yet
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

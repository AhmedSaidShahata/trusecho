@extends('home')
@section('content')
<a href="{{route('admin.opportunitys.create')}}" class="mt-2 btn btn-primary form-control">Add opportunity</a>
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
            @forelse($opportunities as $opportunity )
            <tr>
                <th scope="row">{{$opportunity->id}}</th>
                <td><img src="{{asset('storage/'.$opportunity->picture)}}" alt="image opportunity" style="width:100px;height:100px"></td>
                <td>{{$opportunity->title_en}}</td>
                <td>
                    {{ substr($opportunity->description_en,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->content_en,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->heading_details_en,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->location_en,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->requirments_en,0,20) }}....
                </td>
                <td>{{$opportunity->title_ar}}</td>
                <td>
                    {{ substr($opportunity->description_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->content_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->heading_details_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->location_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($opportunity->requirments_ar,0,20) }}....
                <td>{{$opportunity->deadline}}</td>
                <td>{{$opportunity->email}}</td>
                <td class="d-flex">
                    <a href="{{route('admin.opportunitys.show',$opportunity->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <a href="{{route('admin.opportunitys.edit',$opportunity->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.opportunitys.destroy',$opportunity->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                No opportunitys Yet
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('home')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
<a href="{{route('admin.organizations.create')}}" class="mt-2 btn btn-primary form-control">Add organization</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">Name English</th>
                <th scope="col">Name Arabic</th>
                <th scope="cpl">Picture Organization</th>
                <th scope="cpl">Picture Cover</th>
                <th scope="cpl">Website</th>
                <th scope="cpl">Email</th>
                <th scope="col">Country English</th>
                <th scope="col">Counrty Arabic</th>
                <th scope="col">Description English</th>
                <th scope="col">Description Arabic</th>
                <th scope="col">About English</th>
                <th scope="col">About Arabic</th>
                <th scope="col">Whatsapp Number</th>
                <th scope="col">Add Date</th>
                <th scope="col">Update Date</th>
                <th scope="col">controls</th>

            </tr>
        </thead>
        <tbody>
            @forelse($organizations as $organization )
            <tr>
                <th scope="row">{{$organization->id}}</th>
                <th scope="row">{{$organization->name_en}}</th>
                <th scope="row">{{$organization->name_ar}}</th>
                <td><img src="{{asset('storage/'.$organization->picture_org)}}" alt="image organization" style="width:100px;height:100px"></td>
                <td><img src="{{asset('storage/'.$organization->picture_cover)}}" alt="image organization" style="width:100px;height:100px"></td>
                <td>{{$organization->website}}</td>
                <td>{{$organization->email}}</td>
                <td>{{$organization->country_en}}</td>
                <td>{{$organization->country_ar}}</td>
                <td>

                    {{ substr($organization->description_en,0,20) }}....
                </td>
                <td>

                    {{ substr($organization->description_ar,0,20) }}....
                </td>
                <td>

                    {{ substr($organization->description_en,0,20) }}....
                </td>
                <td>

                    {{ substr($organization->description_ar,0,20) }}....
                </td>
                <td>{{$organization->whatsapp}}</td>
                <td>{{$organization->created_at}}</td>
                <td>{{$organization->updated_at}}</td>
                <td class="d-flex">
                    <div hidden>{{!$best_organization=App\Bestorganization::where('organization_id', '=',$organization->id)->count()}}</div>
                    <button data-organizationid="{{$organization->id}}" class="best-organization btn btn-primary"> {{$best_organization > 0 ? 'UnBest' : 'Best'}} </button>
                    <a href="{{route('admin.organizations.show',$organization->id)}}" class="btn"> <i class="far fa-eye"></i></a>

                    <a href="{{route('admin.organizations.edit',$organization->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.organizations.destroy',$organization->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                No organizations Yet
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

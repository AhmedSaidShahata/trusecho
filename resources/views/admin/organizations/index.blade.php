@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif



<a href="{{route('admin.organizations.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_org')}}</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">{{__('messages.name')}}</th>
                <th scope="cpl">{{__('messages.pic_org')}}</th>
                <th scope="cpl">{{__('messages.pic_cover')}}</th>
                <th scope="cpl">{{__('messages.count_followers')}}</th>
                <th scope="cpl">{{__('messages.website')}}</th>
                <th scope="cpl">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.country')}}</th>
                <th scope="col">{{__('messages.location')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.whatsapp_num')}}</th>
                <th scope="col">{{__('messages.add_date')}}</th>
                <th scope="col">{{__('messages.update_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($organizations as $organization )
            <tr>
                <th scope="row">{{$organization->id}}</th>
                <th scope="row">{{$organization->name}}</th>
                <td><img src="{{asset('storage/'.$organization->picture_org)}}" alt="image organization" style="width:100px;height:100px"></td>
                <td><img src="{{asset('storage/'.$organization->picture_cover)}}" alt="image organization" style="width:100px;height:100px"></td>
                <td>
                    {{!$folllowers=App\Followersorg::where('org_id',$organization->id)->get() }}
                    {{$folllowers->count()}}
                </td>
                <td>{{$organization->website}}</td>
                <td>{{$organization->email}}</td>
                <td>{{$organization->country}}</td>
                <td>{{$organization->location}}</td>
                <td>
                    {{ substr($organization->description,0,20) }}
                </td>

                <td>{{$organization->whatsapp}}</td>
                <td>{{$organization->created_at}}</td>
                <td>{{$organization->updated_at}}</td>
                <td class="d-flex">
                    <div hidden>{{!$best_organization=App\Bestorganization::where('organization_id', '=',$organization->id)->count()}}</div>
                    <input {{$best_organization > 0 ? 'checked' : ''}} type="checkbox" data-organizationid="{{$organization->id}}" class="best-organization btn btn-primary">
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
                {{__('messages.no_org')}}
            </div>
            @endforelse
        </tbody>
    </table>

    {{$organizations->links()}}
</div>
@endsection

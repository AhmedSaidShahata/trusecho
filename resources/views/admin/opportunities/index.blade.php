@extends('home')
@section('content')


{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif
<a href="{{route('admin.opportunitys.create')}}" class="mt-2 btn btn-primary form-control">
    {{__('messages.add_opp')}}
</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.content')}}</th>
                <th scope="col">{{__('messages.location')}}</th>
                <th scope="col">{{__('messages.company')}}</th>
                <th scope="col">{{__('messages.requirments')}}</th>
                <th scope="col">{{__('messages.deadline')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($opportunities as $opportunity )
            <tr>
                <th scope="row">{{$opportunity->id}}</th>
                <td><img src="{{asset('storage/'.$opportunity->picture)}}" alt="image opportunity" style="width:100px;height:100px"></td>
                <td>{{$opportunity->title}}</td>
                <td>
                    {{ substr($opportunity->description,0,20) }}
                </td>
                <td>
                    {{ substr($opportunity->content,0,20) }}
                </td>

                <td>
                    {{ substr($opportunity->location,0,20) }}
                </td>
                <td>
                    {{ substr($opportunity->company,0,20) }}
                </td>
                <td>
                    {{ substr($opportunity->requirments,0,20) }}
                </td>

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
                {{__('messages.no_opportunities')}}
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

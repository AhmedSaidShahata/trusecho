@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.scholarships.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_scholar')}}</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>

                <th scope="col">{{__('messages.location')}}</th>
                <th scope="col">{{__('messages.requirments')}}</th>
                <th scope="col">{{__('messages.deadline')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.creator')}}</th>
                <th scope="col">{{__('messages.specialization')}}</th>

                <th scope="col">{{__('messages.cost')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($scholarships as $scholarship )
            <tr>
                <th scope="row">{{$scholarship->id}}</th>
                <td><img src="{{asset('storage/'.$scholarship->picture)}}" alt="image scholarship" style="width:100px;height:100px"></td>
                <td>{{$scholarship->title}}</td>
                <td>{{$scholarship->description}}</td>

                <td>{{$scholarship->location}}</td>
                <td>{{$scholarship->requirments}}</td>
                <td>{{$scholarship->deadline}}</td>
                <td>{{$scholarship->email}}</td>
                <td>{{$scholarship->user->name}}</td>
                <td>{{$scholarship->specialization->name}}</td>
                <td>{{$scholarship->cost->name}}</td>
                <td class="d-flex">
                    <div hidden>{{!$best_scholar=App\Bestscholar::where('scholarship_id', '=',$scholarship->id)->count()}}</div>
                    <input {{$best_scholar > 0 ? 'checked' : ''}} type="checkbox" data-scholarid="{{$scholarship->id}}" class="best-scholar btn btn-primary">
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
                {{__('messages.no_scholar')}}
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.newsorgs.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_news')}}</a>
<div style="overflow-x:auto;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.organization_name')}}</th>
                <th scope="col">{{__('messages.writer')}}</th>
                <th scope="col">{{__('messages.deadline')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news_orgs as $news_org )
            <tr>
                <th scope="row">{{$news_org->id}}</th>
                <td><img src="{{asset('storage/'.$news_org->picture)}}" alt="image news_org" style="width:100px;height:100px"></td>
                <td>{{$news_org->title}}</td>
                <td>
                    {{ substr($news_org->description,0,20) }}
                </td>

                <td>
                    {{$news_org->organization->name}}
                </td>

                <td>
                    {{$news_org->organization->user->name}}
                </td>

                <td>{{$news_org->deadline}}</td>

                <td class="d-flex">
                    <a href="{{route('admin.newsorgs.show',$news_org->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <a href="{{route('admin.newsorgs.edit',$news_org->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.newsorgs.destroy',$news_org->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                {{__('messages.no_news')}}
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

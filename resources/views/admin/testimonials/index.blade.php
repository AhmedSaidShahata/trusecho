@extends('home')
@section('content')


{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.testimonials.create')}}" class="mt-2 btn btn-primary form-control">
    {{__('messages.add_testimonial')}}
</a>
<div style="overflow-x:auto">
    <table class="table table-dark">

        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="cpl">{{__('messages.picture_testimonial')}}</th>
                <th scope="col">{{__('messages.name_testimonial')}}</th>
                <th scope="col">{{__('messages.description_testimonial')}}</th>
                <th scope="col">{{__('messages.rate_testimonial')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial )
            <tr>
                <th scope="row">{{$testimonial->id}}</th>
                <td><img src="{{asset('storage/'.$testimonial->picture)}}" alt="image testimonial" style="width:100px;height:100px"></td>
                <td>{{$testimonial->name}}</td>

                <td>
                    {{ substr($testimonial->description,0,20) }}
                </td>
                <td>{{$testimonial->rate}}</td>

                <td class="d-flex">
                    <a href="{{route('admin.testimonials.show',$testimonial->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <a href="{{route('admin.testimonials.edit',$testimonial->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.testimonials.destroy',$testimonial->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                {{__('messages.no_testimonials')}}
            </div>
            @endforelse
        </tbody>
    </table>
    {{$testimonials->links()}}
</div>
@endsection

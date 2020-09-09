@extends('home')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif

<a href="{{route('admin.faqs.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_faqs')}}</a>

<div style="overflow-x: auto;">

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.question')}}</th>
                <th scope="col">{{__('messages.answer')}}</th>
                <th scope="col">{{__('messages.add_date')}}</th>
                <th scope="col">{{__('messages.update_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($faqs as $faq)
            <tr>
                <th scope="row">{{$faq->id}}</th>
                <td>{{$faq->question}}</td>
                <td>{{$faq->answer}}</td>
                <td>{{$faq->created_at}}</td>
                <td>{{$faq->updated_at}}</td>
                <td class="d-flex">

                    <a href="{{route('admin.faqs.edit',$faq->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                    <form method="POST" class="form-inline" action="{{route('admin.faqs.destroy',$faq->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
            {{__('messages.no_faqs')}}
            </div>

            @endforelse

        </tbody>
    </table>
</div>




@endsection

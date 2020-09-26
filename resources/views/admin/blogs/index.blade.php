@extends('home')
@section('content')


{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{$lang== 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.blogs.create')}}" class="mt-2 btn btn-primary form-control">
    {{__('messages.add_blog')}}
</a>
<div style="overflow-x:auto">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="cpl">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.writer')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.content')}}</th>
                <th scope="col">{{__('messages.cat')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog )
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td><img src="{{asset('storage/'.$blog->picture)}}" alt="image blog" style="width:100px;height:100px"></td>
                <td>{{$blog->user->name}}</td>
                <td>{{$blog->title}}</td>
                <td>
                    {{ substr($blog->description,0,20) }}
                </td>
                <td>
                    {{ substr($blog->content,0,20) }}
                </td>
                <td>
                    {{!$category=App\CategoryBlog::find($blog->category_blog_id) }}
                    {{$category->name}}
                </td>
                <td class="d-flex">
                    <a href="{{route('admin.blogs.show',$blog->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <a href="{{route('admin.blogs.edit',$blog->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.blogs.destroy',$blog->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                {{__('messages.no_blogs')}}
            </div>
            @endforelse
        </tbody>
    </table>
    {{$blogs->links()}}
</div>
@endsection

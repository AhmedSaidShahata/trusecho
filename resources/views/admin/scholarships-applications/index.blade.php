@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div style="overflow-x:auto ;">


    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">appscholarship</th>
                <th scope="col">fullname</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">nationality</th>
                <th scope="col">address</th>
                <th scope="col">father status</th>
                <th scope="col">mother status</th>
                <th scope="col">specialization</th>
                <th scope="col">university</th>
                <th scope="col">interview location</th>
                <th scope="col">user picture</th>
                <th scope="col">high school picture</th>
                <th scope="col">university picture</th>
                <th scope="col">letter picture</th>
                <th scope="col">language picture</th>
                <th scope="col">payment picture</th>
                <th scope="col">passport picture</th>
                <th scope="col">research</th>
                <th scope="col">degree</th>
                <th scope="col">Apply Date</th>
                <th scope="col">controls</th>

            </tr>
        </thead>
        <tbody>
            @forelse($appscholarships as $appscholarship)
            <tr>
                <td>
                    {{App\Scholarship::where(['id'=>$appscholarship->scholar_id])->get()->first()->title_en}}
                </td>
                <td>{{$appscholarship->fullname}}</td>
                <td>{{$appscholarship->email}}</td>
                <td>{{$appscholarship->phone}}</td>
                <td>{{$appscholarship->nationality}}</td>
                <td>{{$appscholarship->address}}</td>
                <td>{{$appscholarship->father_status}}</td>
                <td>{{$appscholarship->mother_status}}</td>
                <td>{{$appscholarship->mother_status}}</td>
                <td>{{$appscholarship->specialization}}</td>
                <td>{{$appscholarship->university}}</td>
                <td>{{$appscholarship->interview_location}}</td>
                <td>{{$appscholarship->user_picture}}</td>
                <td>{{$appscholarship->high_school_picture}}</td>
                <td>{{$appscholarship->university_picture}}</td>
                <td>{{$appscholarship->letter_picture}}</td>
                <td>{{$appscholarship->language_picture}}</td>
                <td>{{$appscholarship->payment_picture}}</td>
                <td>{{$appscholarship->passport_picture}}</td>
                <td>{{$appscholarship->research}}</td>
                <td>{{$appscholarship->degree}}</td>
                <td>{{$appscholarship->high_school_picture}}</td>
                <td>{{$appscholarship->created_at}}</td>

                <td class="d-flex">


                    <form method="POST" class="form-inline" action="{{route('admin.appscholarships.destroy',$appscholarship->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                No appscholarships Yet
            </div>

            @endforelse

        </tbody>
    </table>

</div>


@endsection

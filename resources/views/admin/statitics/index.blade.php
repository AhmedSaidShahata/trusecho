@extends('home')

@section('content')

<section class="statitics_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.users')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_users}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.users.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info2">
                    <div class="d-flex">
                        <div class="logo-info">

                            <i class="fas fa-comment"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.contacts')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_contacts}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.contacts.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="far fa-clipboard"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.blogs')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_blogs}}

                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.blogs.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.jobs')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_jobs}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.jobs.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">

                                {{__('messages.scholarships')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_scholarships}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.scholarships.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.organizations')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_organizations}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.organizations.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.services')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_services}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.services.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.opportunities')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_opportunities}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.opportunitys.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.faqs')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_faq}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.faqs.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.job_reports')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_job_reports}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.reportjobs.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>      <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info info3">
                    <div class="d-flex">
                        <div class="logo-info">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="text-information">
                                {{__('messages.service_reports')}}
                            </p>
                            <p class="numbers">
                                {{$count_all_service_reports}}
                            </p>
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{route('admin.reportservices.index')}}"> {{__('messages.more')}}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>








































<!-- <div class="popup ">
        <div class="row justify-content-center align-items-center w-100">
            <div class="text-center features col-md-3">
                <a href="{{route('admin.users.index')}}">
                    <div><i class="fas fa-users"></i></div>
                    <p>Users</p>
                </a>
            </div>
            <div class="text-center features col-md-3">

                <a href="{{route('admin.blogs.index')}}">
                    <div><i class="far fa-clipboard"></i></div>
                    <p>Blogs</p>
                </a>
            </div>
            <div class="text-center features col-md-3">


                <a href="{{route('admin.categories.index')}}">
                    <div><i class="far fa-clipboard"></i></div>
                    <p>Category Blog</p>
                </a>
            </div>
        </div>
    </div> -->

@endsection

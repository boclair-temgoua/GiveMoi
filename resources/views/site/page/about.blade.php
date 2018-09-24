@extends('inc.app')
@section('title', '- About Us')
@section('style')
<link rel="stylesheet" href="/assets/css/plugins/zoom.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
@endsection
@section('navbar')

@guest
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @else
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg bg-{{ Auth::user()->color_name }}" color-on-scroll="100" id="sectionsNav">
        @endguest
        @endsection

        @section('content')
        <div class="about-us">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($slidesabouts as $item)
                    <div class="carousel-item {{ ($loop->first)? 'active':'' }}">
                        <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{ asset('assets/img/slides/'.$item->slide_about) }}&apos;);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ml-auto mr-auto text-center">
                                        <h1 class="title">
                                            <b>About Us</b>
                                            <h4>Want to have a little overview of us and our products/services Online?</h4>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="main main-raised">
                <div class="container">

                    <!-- Teams Creators -->
                    <div class="about-team team-1">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto text-center">
                                <h2 class="title">
                                    <b>About the Creators</b>
                                </h2>
                                <h5 class="description">In a few lines the creators who hide behind this immagination of service ...</h5>
                            </div>
                        </div>
                        <!-- ########### Model 1 ############## -->
                        <div class="row">

                            @if(count($abouts) > 0)
                            @foreach($abouts as $about)
                            <div class="col-md-6">
                                <div class="card card-profile card-plain">
                                    <div class="card-avatar">
                                        <a href="https://www.linkedin.com/in/{{$about->linklink}}" target="_blank">
                                            <img class="img" src="{{ asset('assets/img/about/' .$about->image) }}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">{{$about->fullname}}</h4>
                                        <h6 class="category text-muted">{!! $about->role !!}</h6>
                                        <p class="card-description">
                                            {!! str_limit($about->body, 150,'&raquo') !!}
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <a href="https://www.linkedin.com/in/{{$about->linklink}}" class="btn btn-just-icon btn-round btn-linkedin" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <a href="https://www.facebook.com/{{$about->fblink}}" class="btn btn-just-icon btn-round btn-facebook" target="_blank">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="https://www.instagram.com/{{$about->instlink}}" class="btn btn-just-icon btn-round btn-instagram" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                            <!-- ########### Model 2 ############## -->
                            <!-- <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="card card-profile">
                                            <div class="card-header card-avatar">
                                                <a href="#pablo">
                                                    <img class="img" src="../assets/img/kit/pro/placeholder.jpg">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Boclair Temgoua</h4>
                                                <h6 class="card-category text-muted">Backend Developer</h6>
                                                <p class="card-description">
                                                    Description DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription
                                                </p>
                                            </div>
                                            <div class="card-footer justify-content-center">
                                                <a href="https://www.linkedin.com/in/boclair-temgoua-688b42b8/" class="btn btn-just-icon btn-round btn-linkedin" target="_blank">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                                <a href="https://www.facebook.com/boclairtemgoua12?fb_dtsg_ag=AdxVE9SthNAiDTen3nNwOgctOi9U8v_s3Aq7GdXpIR_PMQ%3AAdwCo2v-KZr8ErsUWMJO_sdgfdVuTxggK5th1BcsKgEl2w" class="btn btn-just-icon btn-round btn-facebook" target="_blank">
                                                    <i class="fa fa-facebook-square"></i>
                                                </a>
                                                <a href="https://www.instagram.com/boclairtemgoua/" class="btn btn-just-icon btn-round btn-instagram" target="_blank">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-profile">
                                            <div class="card-header card-avatar">
                                                <a href="#pablo">
                                                    <img class="img" src="../assets/img/kit/pro/placeholder.jpg">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Randrin Nzeukang</h4>
                                                <h6 class="card-category text-muted">Frontend Developer</h6>
                                                <p class="card-description">
                                                    Description DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription
                                                </p>
                                            </div>
                                            <div class="card-footer justify-content-center">
                                                <a href="https://www.linkedin.com/in/randrinnzeukang/" class="btn btn-just-icon btn-round btn-linkedin" target="_blank">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                                <a href="#https://www.facebook.com/decotino" class="btn btn-just-icon btn-round btn-facebook" target="_blank">
                                                    <i class="fa fa-facebook-square"></i>
                                                </a>
                                                <a href="#https://www.instagram.com/randrino1712/" class="btn btn-just-icon btn-round btn-instagram" target="_blank">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div> -->
                        </div>

                        <!-- Products / Services explication -->
                        <div class="about-services">
                            <div class="row">
                                <div class="col-md-10 ml-auto mr-auto text-center">
                                    <h2 class="title">
                                        <b>Why our products and services at the cutting edge of Technology?</b>
                                    </h2>
                                    <h5 class="description">Whether you are a beginner in an new activity and want to manage your business with peace of mind and with certainty in a few clicks, our products and services are the solution to your problems</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="features-3">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-5 phone-container">
                                                    <img src="../assets/img/about/product.png">
                                                </div>
                                            </div>
                                            <div class="row description" style="margin: 50px auto 0; max-width: 220px;">
                                                <p class="text-justify"><img src="../assets/img/about/1.png" width="15" height="15"> Your commercial site to expose your business / activity to all the public.</p>
                                                <p class="text-justify"><img src="../assets/img/about/2.png" width="15" height="15"> Your fully customizable CMS Admin Dashboard according to your requirements to control / manage the inflow and outflow of your business online.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info info-horizontal">
                                                <div class="icon icon-success">
                                                    <i class="material-icons">schedule</i>
                                                </div>
                                                <div class="description">
                                                    <h4 class="info-title">Fast Prototyping</h4>
                                                    <p>In a few days and according to your expectations, our team will configure your own prototype ready to be used for your new activity.</p>
                                                </div>
                                            </div>
                                            <div class="info info-horizontal">
                                                <div class="icon icon-danger">
                                                    <i class="material-icons">extension</i>
                                                </div>
                                                <div class="description">
                                                    <h4 class="info-title">Hundreds of Components</h4>
                                                    <p>Your requirements are our main concern. Depending on your pack purchased, a hundred of components makes your life easier to manage your new online business without stress.</p>
                                                </div>
                                            </div>
                                            <div class="info info-horizontal">
                                                <div class="icon icon-warning">
                                                    <i class="material-icons">verified_user</i>
                                                </div>
                                                <div class="description">
                                                    <h4 class="info-title">Easy to Use</h4>
                                                    <p>In one click in your dashboard, you can publish a service, register / see a new member, manage your order flow, customize the design of your commercial site.</p>
                                                </div>
                                            </div>
                                            <div class="info info-horizontal">
                                                <div class="icon icon-primary">
                                                    <i class="material-icons">attach_money</i>
                                                </div>
                                                <div class="description">
                                                    <h4 class="info-title">Save Time and Money</h4>
                                                    <p>No longer need long time to change a style, add a new feature to your business site. Let yourself be master of your own needs.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <a href="#pablo" class="btn btn-primary btn-round">
                                            <i class="material-icons">chevron_right</i>
                                            <b>Read More</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Procducts/Services -->
                        <div class="features-1">
                            <div class="row">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <h2 class="title">Why our product is the best</h2>
                                    <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                                </div>
                            </div>
                            <div class="row">
                                @if(count($presentations) > 0)
                                @foreach($presentations as $presentation)
                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-{!! $presentation->color_slug !!}">
                                            <i class="material-icons">{{$presentation->icon}}</i>
                                        </div>
                                        <h4 class="info-title">{{$presentation->title}}</h4>
                                        {!! str_limit($presentation->body, 150,'...') !!}
                                        <br>
                                        <div class="text-center">
                                            <a href="{{ route('presentation',$presentation->slug) }}" class="btn btn-{!! $presentation->color_slug !!} btn-round">
                                                <i class="material-icons">chevron_right</i>
                                                <b>Read More</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Some Photo Projects or Works -->

                        <!--<div class="about-office">
                            <div class="row text-center">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <h2 class="title">Our office is our second home</h2>
                                    <h5 class="description">Here are some pictures from our office. You can see the place looks like a palace and is fully equiped with everything you need to get the job done.</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="/assets/img/kit/pro/examples/office2.jpg">
                                </div>
                                <div class="col-md-4">
                                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="/assets/img/kit/pro/examples/office4.jpg">
                                </div>
                                <div class="col-md-4">
                                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="/assets/img/kit/pro/examples/office3.jpg">
                                </div>
                                <div class="col-md-6">
                                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="/assets/img/kit/pro/examples/office5.jpg">
                                </div>
                                <div class="col-md-6">
                                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="/assets/img/kit/pro/examples/office1.jpg">
                                </div>
                            </div>
                        </div>-->

                        <!-- Work with Us -->
                        <div class="about-contact">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <h2 class="text-center title">
                                        <b>Want to work with us?</b>
                                    </h2>
                                    <h5 class="text-center description">You can contact us for any collaboration with our team. We will get back to you in a couple of hours.</h5>

                                    @include('inc.alert')
                                     {!! Form::open(array('route' => 'user.save_work','files'=> 'true','method'=>'POST','class' =>'contact-form')) !!}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="bmd-label-floating">Your Fullname</label>
                                                   {!! Form::text('name', null, array('class' => 'form-control','id'=>'name','placeholder' => '', 'required' => '')) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email" class="bmd-label-floating">Your Email</label>
                                                    {!! Form::email('email', null, array('class' => 'form-control','id' => 'email','placeholder' => '')) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <select class="selectpicker" data-style="select-with-transition" title="Choose speciality" data-size="7" aria-hidden="true" name="speciality_id">
                                                    <option disabled>Choose Speciality</option>

                                                    @if(count($specialities) > 0)
                                                    @foreach($specialities as $item)
                                                    <option value="{{ $item->id }}">{{ $item->speciality_name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 ml-auto mr-auto text-center">
                                                <button class="btn btn-success btn-round">
                                                    <i class="material-icons">done_all</i>
                                                    <b>Send</b>
                                                </button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('inc._footer')
</div>
@endsection

@section('scripts')
<script src="/assets/js/plugins/zoom.js"></script>
@endsection



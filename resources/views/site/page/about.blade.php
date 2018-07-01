@extends('inc.app')
@section('title', '- About')

@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
@section('content')
<div class="about-us ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/pro/bg9.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">About {!! config('app.name') !!}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will get back to you in a couple of hours.</h4>
                    </div>
                </div>
            </div>
            <div class="about-team team-1">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Rencontrez notre équipe </h2>
                        <h5 class="description">This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</h5>
                    </div>
                </div>
                <div class="row">

                    @foreach($abouts as $about)
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="{{ asset('assets/img/' .$about->image) }}">
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
                                <a href="{{$about->twlink}}" class="btn btn-just-icon btn-link btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{$about->fblink}}" class="btn btn-just-icon btn-link btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{$about->instlink}}" class="btn btn-just-icon btn-link btn-instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="{{$about->googlelink}}" class="btn btn-just-icon btn-link btn-google">
                                    <i class="fab fa-google"></i>
                                </a>
                                <!--


                                <a href="#pablo" class="btn btn-just-icon btn-linkedin btn-round">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-dribbble btn-round">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                                -->
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="about-services features-2">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Nos services et produits</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information.</h5>
                    </div>
                </div>
                <div class="row">
                    @if(count($presentations) > 0)
                        @foreach($presentations as $presentation)
                            @foreach($presentation->colors as $color)
                    <div class="col-md-4">

                        <div class="info info-horizontal">
                            <div class="icon icon-{!! $color->slug !!}">
                                <i class="material-icons">{{$presentation->icon}}</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">{{$presentation->title}}</h4>
                                {!! str_limit($presentation->body, 150,'...') !!}<br>
                                <a href="{{ route('presentation',$presentation->slug) }}" class="text-{!! $color->slug !!}">Find more...</a>
                            </div>
                        </div>
                    </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>



            <div class="about-office">
                <div class="row text-center">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Our office is our second home</h2>
                        <h4 class="description">Here are some pictures from our office. You can see the place looks like a palace and is fully equiped with everything you need to get the job done.</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="../assets/img/kit/pro/examples/office2.jpg">
                    </div>
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="../assets/img/kit/pro/examples/office4.jpg">
                    </div>
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="../assets/img/kit/pro/examples/office3.jpg">
                    </div>
                    <div class="col-md-6">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="../assets/img/kit/pro/examples/office5.jpg">
                    </div>
                    <div class="col-md-6">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="../assets/img/kit/pro/examples/office1.jpg">
                    </div>
                </div>
            </div>





            <div class="about-contact">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="text-center title">Want to work with us?</h2>
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Your name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Your Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="selectpicker " data-style="select-with-transition" data-size="7">
                                        <option value="1" disabled>Speciality</option>>
                                        <option value="2">I&apos;m a Designer</option>
                                        <option value="3">I&apos;m a Developer</option>
                                        <option value="4">I&apos;m a Hero</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-round">
                                        Let&apos;s talk
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @include('inc._footer')
 @endsection

 @section('script')

 @endsection



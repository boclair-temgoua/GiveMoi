@extends('inc.app')
@section('title', ' - Testimonials')

@section('style')

@endsection
@section('content')
<div class="sections-page  section-white ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/pro/bg9.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Testimonials</h2>
                    <h5>Meet the amazing team behind this project and find out more about how we work.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="section section-basic">

            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <span class="card-title font-italic">&ldquo;La protection de vos données est extrêmement importante à nos yeux. Toutes les informations relatives à votre compte (nom, adresse, informations bancaires, etc.) sont soumises à un double cryptage aux normes de sécurité PCI-DSS. Vous pouvez aussi déterminer une limite de paiement et activer la vérification par SMS et l'identification par empreinte digitale. Enfin, Circle ne peut pas accéder à vos fonds ou les investir&rdquo;</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="subscribe-line subscribe-line-image" style="background-image: url(&apos;assets/img/kit/pro/bg7.jpg&apos;);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="text-center">
                                <h3 class="title">Abonnez-vous à la notre newsletter de {{ config('app.name') }}</h3>
                                <p class="description">
                                    <b>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles de
                                        <strong>{{ config('app.name') }}</strong>
                                    </b>
                                </p>
                            </div>
                            <div class="card card-raised card-form-horizontal">
                                <div class="card-body ">

                                    <form id="form-newsletter-subscribe" method="post" action="/api/newsletter/subscribe">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 ">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                    </div>
                                                    <input type="text" name="fullname" class="form-control" placeholder="Non complet...">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 ">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                    </div>
                                                    <input type="text" name="email" class="form-control" placeholder=" Email...">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 ">
                                                <button type="submit" class="btn btn-warning btn-round btn-block">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="cd-section" id="testimonials">
                <div class="testimonials-2 section-dark">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="carouselExampleIndicatorss" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($testimonials as $item)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ ($loop->first)? 'active':'' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($testimonials as $item)
                                        <div class="carousel-item {{ ($loop->first)? 'active':'' }}">
                                            <div class="card card-testimonial card-plain">
                                                <div class="card-avatar">

                                                    <a href="#pablo">
                                                        <img class="img" src="{{ asset('assets/img/' .$item->image) }}">
                                                    </a>


                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-description">{!! str_limit($item->body, 300,'&raquo') !!}</h5>
                                                    <h4 class="card-title">{!! $item->fullname !!}</h4>
                                                    <h6 class="card-category text-muted">{!! $item->role !!}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicatorss" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <i class="material-icons">keyboard_arrow_left</i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicatorss" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@include('inc._footer')
@endsection

@section('script')

@endsection
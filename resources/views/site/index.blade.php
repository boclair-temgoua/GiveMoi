@extends('inc.app')

@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
@endsection
@section('content')
<div class="landing-page">
    <div class="page-header header-filter" data-parallax="true"
         style=" background-image: url(&apos;/assets/img/kit/pro/bg8.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto text-center">
                    <h2 class="title"> {{ config('app.name') }}</h2>


                    @guest
                    <h3 class="description title">Inscrivez-vous et profitez au plus vite des services du sites</h3>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-raised btn-round">
                        Ouvrir facilement un compte
                    </a>
                    @else
                    <a href=" " class="btn btn-warning btn-raised btn-round">
                        <i class="material-icons">play_arrow</i> Verifiez vos transaction ici
                    </a>
                    @endguest

                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <h2 class="title">{{ config('app.name') }}</h2>
                        <h3 class="description title">Notre site est pour le moment en developpement entrer votre addres mail pour etre informer de la verssion finale.</h3>
                        <h3 class="title">Mais dès lors vous pouvez vous inscrire pour profiter de quelques fonctionaliter du site !</h3>
                    </div>
                </div>
                <br>
                <div class="subscribe-line subscribe-line-image" style="background-image: url(&apos;assets/img/kit/pro/bg7.jpg&apos;);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="text-center">
                                    <h3 class="title">Abonnez-vous à la notre newsletter de {{ config('app.name') }}</h3>
                                    @include('inc.alert')
                                    <p class="description">
                                        <b>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles de
                                            <strong>{{ config('app.name') }}</strong>
                                        </b>
                                    </p>
                                </div>
                                <div class="card card-raised card-form-horizontal">
                                    <div class="card-body ">

                                        <form id="form-newsletter-subscribe" method="post" action="{{ route('newsletter.store') }}" accept-charset="UTF-8">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-lg-8 col-md-6 ">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                        </div>
                                                        <input id="user_email" type="text" name="user_email" class="form-control{{ $errors->has('user_email') ? ' has-error' : '' }}" placeholder=" Email..." required>
                                                        @if ($errors->has('user_email'))
                                                        <span class="help-block">
                                                        <strong class="text-center">{{ $errors->first('user_email') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 ">
                                                    <button type="submit" class="btn btn-warning  btn-block btn-raised btn-round">Subscribe</button>
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
                <div class="col-md-12 ml-auto mr-auto">
                    <h2 class="title">{!! config('app.name') !!}</h2>
                    @guest
                    <h3 class="description card-title">Inscrivez-vous et profitez au plus vite des services du sites .</h3>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-raised btn-round">
                        Ouvrir facilement un compte
                    </a>
                    @else
                    <a href=" " class="btn btn-warning btn-raised btn-round">
                        <i class="material-icons">play_arrow</i> Verifiez vos transaction ici
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

 @include('inc._footer')
 @endsection

 @section('scripts')

 @endsection

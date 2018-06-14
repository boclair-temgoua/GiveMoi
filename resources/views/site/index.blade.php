@extends('inc.app')

@section('style')

@endsection
@section('content')
<div class="landing-page">
    <div class="page-header header-filter" data-parallax="true"
         style=" background-image: url(&apos;/assets/img/kit/pro/bg8.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto text-center">
                    <h2 class="title">GV {{ config('app.name') }}</h2>

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @guest
                    <a href="{{ route('register') }}" class="btn btn-warning btn-raised btn-round">
                        Créer un compte gratuitement
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
                        <h2 class="title">{{ config('app.name') }}</h2>
                        <h3 class="description card-title">GiveMoi est la solution parfait pour envoyer et recevoir de
                            l'argent aussi simplement et plus rapidement qu'un SMS.</h3>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">all_inclusive</i>
                                </div>
                                <h3 class="info-title">Gratuit</h3>
                                <p class="info-title">Creer un compte et utilisez GiveMoi gratuitement &#x1F60D;.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">flight_takeoff</i>
                                </div>
                                <h3 class="info-title">Rapide</h3>
                                <p class="info-title">Envoyez et Recevez de l&apos;argent par SMS à chaque fois que vous
                                    en avez besoin &#x1F601; depuis votre téléphone &#x1F4F1;.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <h3 class="info-title">Partenaires</h3>
                                <p class="info-title">Divide details about your product or agency work into parts. Write
                                    a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <span class="card-title font-italic">&ldquo;La protection de vos données est extrêmement importante à nos yeux. Toutes les informations relatives à votre compte (nom, adresse, informations bancaires, etc.) sont soumises à un double cryptage aux normes de sécurité PCI-DSS. &rdquo;</span>
                    </div>
                </div>
                <div class="col-md-12 ml-auto mr-auto">
                    <h2 class="title">GiveMoi</h2>
                    @guest
                    <h3 class="description card-title">Inscrivez-vous et profitez au plus vite de votre compte
                        GiveMoi.</h3>
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

 @include('inc.footer')
 @endsection

 @section('script')

 @endsection


@extends('inc.main')
@section('title', '| Mot de passe oublié')

@section('content')
<div class="page-header header-filter header-small" filter-color="warning" data-parallax="true" style="background-image: url(&apos;/assets/img/kit/password.jpg&apos;);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title">Forgot your password ?</h2>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="pricing-2">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto text-center">
                    <h4>Enter the e-mail address you are indicated when registering to receive a link to reset your password</h4>
                    <!--
                    <h4>Enter <b>l'adresse email</b> avec laquelle <b>vous avez créé votre compte GiveMoi</b><br>
                        Nous vous rappelons que <b>les connexions au site</b> s'effectuent selement avec <b style="color: red">pseudo</b> mais <b>aussi</b> avec <b style="color: red">votre email</b>
                    </h4>
                    -->
                </div>
                <div class="col-md-10 ml-auto mr-auto">
                    @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmails" class="bmd-label-floating">{{ __('E-mail address')}}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                 <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <div class="text-right">
                                <a class="text-info"
                                   href="{{ route('login') }}">{{ __('Do your remember your password ?') }}</a>
                            </div>
                        </div>
                        <br>
                        <div class="submit text-center">
                            <button class="btn btn-warning btn-raised btn-round" type="submit">
                                <span class="btn-label">
                                    <i class="material-icons">email</i>
                                  </span>
                                <b>{{ __('Send e-mail')}}</b>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('inc._footer')
</div>

@endsection

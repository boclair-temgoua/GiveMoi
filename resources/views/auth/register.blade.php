@extends('inc.main')
@section('title', '| Register')

@section('style')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')

<div class="login-page ">
    <div class="page-header header-filter"
         style="background-image: url(&apos;{{asset('assets/img/bg5.jpg')}}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 ml-auto mr-auto">
                    <div class="card card-signup">
                        <form  id="RegisterValidation"  method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card-header card-header-warning card-header-round text-center">
                                <h4 class="card-title">Inscription</h4>
                            </div>

                            @include('inc.alert')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 row-block">
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username" ">{{ __('Pseudo')}}</label>
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" minLength="3" placeholder="Username" required >

                                            @if ($errors->has('username'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6 row-block">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name">{{ __('Nom')}}</label>
                                            <input id="name" type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" value="{{ old('name') }}" minLength="3" maxlength="20" placeholder="name" required>

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">{{ __('Email address')}}</label>
                                    <input type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                           value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">{{ __('Mot de passe') }}</label>
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" value="{{ old('password') }}" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm">{{ __('Confirmez le mot de passe')
                                        }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm password" required>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="text-right">
                                        <a class="text-info text-center" href="{{ route('login') }}">{{ __('Vous avez
                                            dejas un compte ?') }}</a>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} text-center">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round " type="submit">
                                  <span class="btn-label">
                                    <i class="material-icons">check</i>
                                  </span>
                                    Connexion au compte
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('inc._footer')
    </div>
</div>
</div>
@endsection
@section('scripts')


@endsection

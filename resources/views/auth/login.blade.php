

@extends('inc.main')
@section('title', '| Login')


@section('style')

@endsection
@section('content')
@section('content')
<div class="login-page ">
    <div class="page-header header-filter"
         style="background-image: url(&apos;{{asset('assets/img/bg5.jpg')}}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <div class="card card-signup">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="card-header card-header-warning text-center">
                                <h4 class="card-title">Connexion</h4>

                                <div class="social-line">
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-just-icon btn-facebook btn-round"
                                       data-toggle="tooltip" title="Facebook login" data-placement="bottom"
                                       data-container="body">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="{{ url('auth/google') }}"
                                       class="btn btn-just-icon btn-google btn-round" data-placement="bottom"
                                       data-container="body">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </div>
                             </div>




                            @include('inc.alert')
                            <div class="card-body">
                                <div class="form-group{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="bmd-label-floating">{{ __('Email or Username')}}</label>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" >

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="text-center">{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="bmd-label-floating">{{ __('Mot de passe') }}</label>
                                    <input id="password" type="password" value="{{ old('password') }}"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" >

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <div class="text-right">
                                        <a class="text-info"
                                           href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked="checked"
                                           name="remember" {{ old('remember') ? 'checked' : '' }} > {{ __('Restez connecte') }}
                                    <span class="form-check-sign">
                                       <span class="check"></span>
                                 </span>
                                </label>
                            </div>
                            <br>
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
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
@endsection
@section('script')

@endsection

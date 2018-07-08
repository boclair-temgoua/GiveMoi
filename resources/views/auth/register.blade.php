@extends('inc.main')
@section('title', '| Register')

@section('style')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
<div class="signup-page sidebar-collapse">

    <div class="page-header header-filter" filter-color="warning" style="background-image: url(&apos;{{asset('assets/img/bg5.jpg')}}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    @if(count($presentations) > 0)
                                    @foreach($presentations as $presentation)
                                    @foreach($presentation->colors as $color)
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose">
                                            <i class="material-icons">{!! $presentation->icon !!}</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">{!! $presentation->title !!}</h4>
                                            {!! str_limit($presentation->body, 100,'[...]') !!}<br>
                                            <a href="{{ route('presentation',$presentation->slug) }}" class="text-{!! $color->slug !!}">Find more...</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                                    @endif
                                </div>
                                <div class="col-md-5 mr-auto">
                                    <div class="social text-center">
                                        <a href="{{ url('auth/facebook') }}" class="btn btn-just-icon btn-facebook btn-round"
                                           data-toggle="tooltip" title="Facebook login" data-placement="bottom"
                                           data-container="body">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="{{ url('auth/facebook') }}" class="btn btn-just-icon btn-twitter btn-round"
                                           data-toggle="tooltip" title="twitter login" data-placement="bottom"
                                           data-container="body">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="{{ url('auth/google') }}"
                                           class="btn btn-just-icon btn-google btn-round" data-placement="bottom"
                                           data-container="body">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                        <h4> or be classical </h4>
                                        @include('inc.alert')
                                    </div>
                                    <form  id="RegisterValidation"  method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-sm-6 row-block">
                                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                      </span>
                                                        </div>
                                                        <input id="username" type="text"
                                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                               name="username" value="{{ old('username') }}" minLength="3" placeholder="Username..." required >
                                                        @if ($errors->has('username'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 row-block">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                      </span>
                                                        </div>
                                                        <input id="name" type="text"
                                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                               name="name" value="{{ old('name') }}" minLength="3" maxlength="20" placeholder="Name..." required>
                                                        @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                         <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                      </span>
                                                </div>
                                                <input type="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                       value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email..." required>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 row-block">
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                        </div>
                                                        <input id="password" type="password"
                                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                               name="password" value="{{ old('password') }}" placeholder="Password..." required>
                                                        @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 row-block">
                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                        </div>
                                                        <input id="password-confirm" type="password" class="form-control"
                                                               name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm password..." required>
                                                        @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
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
                                        <div class="form-check{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="status" value="yes" checked required>
                                                <span class="form-check-sign">
                                                      <span class="check"></span>
                                                    </span>
                                                I agree to the
                                                <a href="/terms_conditions">terms and conditions</a>.
                                            </label>
                                            @if ($errors->has('status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="submit text-center">
                                            <button class="btn btn-warning btn-raised btn-round " type="submit">
                                              <span class="btn-label">
                                                <i class="material-icons">check</i>
                                              </span>
                                                Get Started
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('inc._footer')
    </div>
</div>
@endsection
@section('scripts')


@endsection

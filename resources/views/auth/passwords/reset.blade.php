


@extends('inc.main')
@section('title', '| Reset Password')


@section('style')

@endsection
@section('content')
@section('content')
<div class="login-page ">
    <div class="page-header header-filter"
         style="background-image: url(&apos;{{asset('assets/img/bg5.jpg')}}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="card-header card-header-warning text-center">
                                <h4 class="card-title">Reset Password</h4>
                            </div>


                            <div class="card-body">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                      </span>
                                        </div>
                                        <input type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                               value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email..."  required>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                             <strong style="padding-left: 20px;" class="text-center">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" value="{{ old('password') }}"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" placeholder="password..." required>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                            <strong style="padding-left: 20px;" class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input id="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                           name="password_confirmation" placeholder="Confirm password..." required>

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong style="padding-left: 20px;" class="text-center">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!--
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="bmd-label-floating">{{ __('Password') }}</label>
                                    <input id="password" type="password" value="{{ old('password') }}"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="bmd-label-floating">{{ __('Confirm password') }}</label>
                                    <input id="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                           name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                -->

                            </div>
                            <br>
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                          </span>
                                    <b>Reset Password</b>
                                </button>
                            </div>
                        </form>
                        <br>
                        <br>
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

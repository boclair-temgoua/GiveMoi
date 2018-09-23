@extends('inc.main')
@section('title', '| Login')


@section('style')
<style>

    .field-icon {
        float: right;
        margin-right: -17px;
        color: #0b75c9;
        margin-top: 9px;
        position: relative;
        z-index: 2;
        cursor:pointer;
        padding-right: 15px;
    }

</style>
@endsection
@section('content')
@section('content')
<div class="signup-page sidebar-collapse">

    <div class="page-header header-filter" filter-color="warning" data-parallax="true">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form id="RegisterValidation" accept-charset="UTF-8"  class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="card-header card-header-warning text-center">
                                <h4 class="card-title">Connect With</h4>
                                <div class="social-line">
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-just-icon btn-facebook btn-round"
                                       data-toggle="tooltip" title="Facebook Login" data-placement="bottom"
                                       data-container="body">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="{{ url('auth/google') }}"
                                       class="btn btn-just-icon btn-google btn-round" title="Google Login" data-toggle="tooltip" data-placement="bottom"
                                       data-container="body">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <p class="description text-center">
                                <b>Or Be Classical</b>
                            </p>

                            <div class="card-body">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">mail</i>
                                        </span>
                                    </div>
                                    <input id="username" type="text" placeholder="Username ..."
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}"
                                           minLength="3" maxlength="20" required="required">
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                            <strong  style="padding-left: 20px;" class="text-center">{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong style="padding-left: 20px;" class="text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group" id="app">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input id="password-field" type="password" value="{{ old('password') }}"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password ..."
                                           minLength="6" >
                                    <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password" title="show password"></span>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                            <strong style="padding-left: 20px;" class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <a class="text-info"
                                       href="{{ route('password.request') }}">{{ __('Forgot your password ?') }}</a>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" checked="checked"
                                               name="remember" {{ old('remember') ? 'checked' : '' }} > {{ __('Stay connected') }}
                                        <span class="form-check-sign">
                                                   <span class="check"></span>
                                            </span>
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button class="btn btn-warning btn-raised btn-round" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                          </span>
                                    <b>Get Started</b>
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
@section('scripts')

<!-- Show password -->
<script>

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

@endsection

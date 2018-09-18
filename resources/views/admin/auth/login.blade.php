<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.admin._head')
    <!-- iframe removal -->

    <!-- Show password -->
    <style>

        .field-icon {
            float: right;
            margin-right: -20px;
            margin-top: 27px;
            position: relative;
            z-index: 2;
            cursor:pointer;
            padding-right: 15px;
        }

    </style>
</head>

<body class="off-canvas-sidebar login-page">

@include('admin.auth.admin_nav')

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url(&apos;/assets/dashboard/assets/img/login.jpg&apos;); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form action="{{ route('admin.login')}}" method="post">
                                {!! csrf_field() !!}
                                <div class="card-header card-header-warning text-center">
                                    <i class="material-icons">group</i>
                                    <h4 class="card-title">
                                        <b>Login Administration</b>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">mail</i>
                                            </span>
                                        </div>
                                        <input id="username" type="text" class="form-control" name="username" value="{{ $username ?? old('username') }}" required autofocus placeholder="Pseudo or Email">

                                        @if ($errors->has('username'))
                                         <span class="help-block">
                                            <strong  style="padding-left: 20px; color: red;" class="text-center">{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="padding-left: 20px; color: red;" class="text-danger text-center">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input id="password-field" type="password" value="{{ $password ?? old('password') }}"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password..."
                                               minLength="6" >
                                        <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password" title="show password"></span>

                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong style="color: red;" class="text-center text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <div class="text-right">
                                        <a class="text-info" href="{{ route('admin.password.request') }}">{{ __('Forgot your password ?') }}</a>
                                    </div>
                                    <br>
                                    <div class="form-check" style="padding-left: 20px;">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Stay Connected') }}
                                            <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                    <br>
                                </div>
                                <div class="submit text-center">
                                    <button class="btn btn-warning btn-raised btn-round" type="submit">
                                        <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                        </span>
                                        <b>Login</b>
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


<!--   Core JS Files   -->
@include('layouts.admin._script')
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<!--- Password Show -->
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



<script type="text/javascript">
    setTimeout(function(){
        location.reload();
    },600000);
</script>
</body>
</html>

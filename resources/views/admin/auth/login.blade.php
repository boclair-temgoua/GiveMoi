<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.admin._head')
    <!-- iframe removal -->
</head>

<body class="off-canvas-sidebar login-page">

@include('admin.auth.admin_nav')

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url(&apos;/assets/dashboard/assets/img/login.jpg&apos;); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

        <div class="container">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <form action="{{ route('admin.login')}}" method="post">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-rose text-center">
                            <h4 class="card-title">Login Administration</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Pseudo ou email')}}</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="help-block text-center">
                                        <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                </span>
                                @endif

                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Mot de passe') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong class="text-center text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <div class="text-right">
                                    <a class="text-rose" href="{{ route('admin.password.request') }}">{{ __('Forgot your password ?') }}</a>
                                </div>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Stay connected') }}
                                    <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                </label>
                            </div>
                            <br>
                        </div>
                        <div class="submit text-center">
                            <button class="btn btn-rose btn-raised btn-round" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                          </span>
                                <b>Login</b>
                            </button>
                        </div>
                    </div>
                </form>
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
</body>
</html>
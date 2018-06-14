<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.admin._head')
    <!-- iframe removal -->
</head>

<body class="off-canvas-sidebar login-page">

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url(&apos;/assets/dashboard/assets/img/login.jpg&apos;); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <form class="form-horizontal" method="POST" action="{{ route('admin.password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-rose text-center">
                            <h4 class="card-title">Admin Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Email')}}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                                        <strong class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Mot de passe') }}</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong class="text-center">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round" value="Connexion dashboard">
                        </div>
                        <br>
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
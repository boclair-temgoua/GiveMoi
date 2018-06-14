<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.admin._head')
    <!-- iframe removal -->
</head>

<body class="off-canvas-sidebar login-page">

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/dashboard/assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                    {{ csrf_field() }}
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-rose text-center">
                            <h4 class="card-title">Admin Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Email')}}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <div class="text-right">
                                    <a class="text-rose" href="/admin/admin-login">{{ __('Tu te rappeles de ton mot de passe ?') }}</a>
                                </div>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round" value="Send Password Reset Link">
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
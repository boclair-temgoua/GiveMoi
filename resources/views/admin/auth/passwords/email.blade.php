<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.admin._head')
    <!-- iframe removal -->
</head>

<body class="off-canvas-sidebar login-page">

@include('admin.auth.admin_nav')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/dashboard/assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="col-md-6 col-sm-6 ml-auto mr-auto">
                @if (session('status'))
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    {{ session('status') }}
                </div>
                @endif
                <br/>
            </div>
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <div class="card card-login card-hidden">
                <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                    {{ csrf_field() }}

                        <div class="card-header card-header-rose text-center">
                             <i class="material-icons">lock_open</i>
                            <h4 class="card-title">
                                <b>Reset Admin Password</b>
                            </h4>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="bmd-label-floating">{{ __('Email')}}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-danger text-center">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="text-right">
                                    <a class="text-rose" href="{{ route('admin.login') }}">{{ __('Do your remember your password ?') }}</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="submit text-center">
                            <button class="btn btn-rose btn-raised btn-round" type="submit">
                                <span class="btn-label">
                                    <i class="material-icons">email</i>
                                </span>
                                <b>Send Reset Link</b>
                            </button>
                        </div>
                    <br>
                    </form>
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

<script type="text/javascript">
    setTimeout(function(){
        location.reload();
    },600000);
</script>
</body>
</html>

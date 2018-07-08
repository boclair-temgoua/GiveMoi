@extends('inc.app')

@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="login-page sidebar-collapse">

        <div class="page-header header-filter" style="background-image: url(&apos;{{asset('assets/img/bg5.jpg')}}&apos;); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="card card-login">
                            <form id="RegisterValidation" class="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                               <br>
                                <p class="description text-center">Or Be Classical</p>
                                @include('inc.alert')
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                        </span>
                                        </div>
                                        <input id="username" type="text" placeholder="username"
                                               class="form-control" name="username" value="{{ old('username') }}" >
                                        @if ($errors->has('username'))
                                        <span class="help-feedback">
                                            <strong class="text-center text-danger">{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">mail</i>
                                        </span>
                                        </div>
                                        <input id="username" type="text" placeholder="name@example.com"
                                               class="form-control" name="email" value="{{ old('email') }}" >
                                        @if ($errors->has('email'))
                                        <span class="help-feedback">
                                            <strong class="text-center text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                        </div>
                                        <input id="password" type="password" value="{{ old('password') }}"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" placeholder="password...">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong class="text-center">{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                        </div>
                                        <input id="confirm_password" type="password" value="{{ old('confirm_password') }}"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="confirm_password" placeholder="confirm password...">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong class="text-center">{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="footer text-center">
                                    <button type="submite" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</button>
                                </div>
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

    @endsection
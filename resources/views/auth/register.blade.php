@extends('inc.main')
@section('title', '- Register')

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
                        <h2 class="card-title text-center">New Registration</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    @if(count($presentations) > 0)
                                    @foreach($presentations as $presentation)


                                    <div class="info info-horizontal">
                                        <div class="icon icon-{{ $presentation->color_slug }}">
                                            <i class="material-icons">{!! $presentation->icon !!}</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">{!! $presentation->title !!}</h4>
                                            {!! str_limit($presentation->body, 100,'[...]') !!}<br>
                                            <a href="{{ route('presentation',$presentation->slug) }}" class="text-{{ $presentation->color_slug }}">Find more...</a>
                                        </div>
                                    </div>

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

                                    </div>
                                    <form  id="RegisterValidation"  method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="tz" id="tz">

                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                      </span>
                                                </div>
                                                <input id="username" type="text"
                                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                       name="username" value="{{ old('username') }}" minLength="3" placeholder="Username..."  >
                                                @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                      </span>
                                                </div>
                                                <input id="name" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="name" value="{{ old('name') }}" minLength="3" maxlength="20" placeholder="Name..." >
                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                 <span class="input-group-text">
                                                   <i class="material-icons">calendar_today</i>
                                                 </span>
                                                </div>
                                                <input type="text"
                                                       class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }} datepicker "
                                                       id="birthday" name="birthday"
                                                       value="{{ old('birthday') }}" placeholder="Birthday date">
                                                @if ($errors->has('birthday'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('birthday') }}</strong>
                                                </span>
                                                @endif
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
                                                       value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email..." >
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                </div>
                                                <input id="password" type="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       name="password" value="{{ old('password') }}" placeholder="Password..." >
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                </div>
                                                <input id="password_confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                       name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm password...">
                                                @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-right">
                                                <a class="text-info text-center" href="{{ route('login') }}">{{ __('Already have an Account?') }}</a>
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
                                                <input class="form-check-input" type="checkbox" name="status" value="yes" checked >
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
                                                <b>Get Started</b>
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

<script>
    $(document).ready(function () {

        $(".datepicker").datetimepicker({
            format: "DD/MM/YYYY",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        })

    });
</script>

<script>
    $(function () {
        // guess user timezone
        $('#tz').val(moment.tz.guess())
    })
</script>
@endsection

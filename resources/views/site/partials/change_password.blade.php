@extends('inc.app')
@section('title', '- Edit your password')

@section('style')

<style>

    .field-icon {
        float: right;
        margin-right: -17px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        cursor:pointer;
    }

</style>

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{{$user->color_name}}" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="signup-page sidebar-collapse">
        <div class="page-header header-filter"
             style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}?{{ time() }}&apos;); background-size: cover; background-position: top center;">
            <div class="container">

                <div class="col-md-6 ml-auto mr-auto">
                    <div style="padding-top: -100px;" class="profile text-center ">
                        <div class="avatar">

                            <div class="fileinput fileinput-new text-center"
                                 data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised">
                                    @if($user->avatar)
                                    <img src="{{ url($user->avatar)  }}?{{ time() }}" alt="...">
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                            </div>
                        </div>


                    </div>
                </div>
                {!! Form::open(['method' => 'PATCH', 'route' => ['user.change_password']]) !!}

                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="card card-login">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ml-auto mr-auto">

                                        <div class="col-md-12 ml-auto mr-auto text-center">
                                            <h3 class="card-title text-info">Update your password </h3>
                                            @include('inc.alert')
                                        </div>

                                             <div class="card-body ">
                                                 <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                                     {!! Form::label('current_password', trans('Current password'), ['class' => 'control-label bmd-label-floating']) !!}
                                                     {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                                     <p class="help-block"></p>
                                                     @if($errors->has('current_password'))
                                                     <p class="help-block text-danger">
                                                         {{ $errors->first('current_password') }}
                                                     </p>
                                                     @endif
                                                 </div>
                                                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                     {!! Form::label('password', trans('New password'), ['class' => 'control-label bmd-label-floating']) !!}
                                                     {!! Form::password('password', [ 'id' => 'password-field', 'class' => 'form-control', 'placeholder' => '']) !!}
                                                     <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password" title="show password"></span>
                                                     <p class="help-block"></p>
                                                     @if($errors->has('password'))
                                                     <p class="help-block text-danger">
                                                         {{ $errors->first('password') }}
                                                     </p>
                                                     @endif
                                                 </div>
                                                 <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                     {!! Form::label('new_password_confirmation', trans('Password confirm'), ['class' => 'control-label bmd-label-floating']) !!}
                                                     {!! Form::password('password_confirmation', ['id' => 'password-field','class' => 'form-control', 'placeholder' => '']) !!}
                                                     <p class="help-block"></p>
                                                     @if($errors->has('password_confirmation'))
                                                     <p class="help-block text-danger">
                                                         {{ $errors->first('password_confirmation') }}
                                                     </p>
                                                     @endif
                                                 </div>
                                             </div>

                                        <div class="submit text-center">
                                            <a href="{{ route('myaccount.profile') }}"
                                               class="btn btn-{{$user->color_name}} btn-raised btn-round">
                                                <i class="material-icons">undo</i>
                                                <b>Back to profile edit</b>
                                            </a>
                                            <button class="btn btn-success btn-raised btn-round" type="submit">
                                           <span class="btn-label">
                                             <i class="material-icons">save_alt</i>
                                           </span>
                                                <b>Update password</b>
                                            </button>
                                        </div>
                                        <br/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
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
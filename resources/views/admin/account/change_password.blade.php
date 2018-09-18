@extends('inc.admin._main')
@section('title', '- Edit Password')
@section('sectionTitle', 'Admin Profile')
@section('style')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
                    <div class="card">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">lock_outline</i>
                            </div>
                            <h4 class="card-title"><b>Change Password</b></h4>
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
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {!! Form::label('new_password_confirmation', trans('Password confirm'), ['class' => 'control-label bmd-label-floating']) !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password_confirmation'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="submit">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-raised btn-round">
                                <span class="btn-label">
                                    <i class="material-icons">save_alt</i>
                                </span>
                                    <b>Update password</b>
                                </button>
                            </div>
                            <br>
                        </div>
                        <br>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@include('inc.admin._footer')
@endsection

@section('script')
<script type="text/javascript">

    function setFormValidation(id){
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement : function(error, element) {
                $(element).append(error);
            },
        });
    }

    $(document).ready(function(){
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>
@endsection
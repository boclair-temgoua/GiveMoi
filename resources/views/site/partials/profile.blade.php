@extends('inc.app')
@section('title', '| Edit your profile')

@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{{$user->color_name}}" color-on-scroll="100" id="sectionsNav">
    @endsection
@section('content')
<div class="signup-page sidebar-collapse">
    <div class="page-header header-filter"
         style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}?{{ time() }}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-login">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-11 ml-auto mr-auto">
                                    {!! Form::model($user,['files'=> 'true', 'class' => 'form-horizontal']) !!}

                                    <div class="row">


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
                                                        <div>
                                                        <span class="btn btn-raised btn-round btn-{{ $user->color_name }} btn-file">
                                                            <span class="fileinput-new">
                                                                 <i class="material-icons">photo</i>
                                                                <b> Add Profile</b>
                                                            </span>
                                                            <span class="fileinput-exists">
                                                                <i class="material-icons">edit</i>
                                                                <b> Change</b>
                                                            </span>
                                                            <input id="avatar" type="file" class="form-control"
                                                                   name="avatar"/>
                                                             </span>
                                                            <br/>
                                                            <a href="#pablo"
                                                               class="btn btn-danger btn-round fileinput-exists"
                                                               data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                <b>Remove</b>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <br/>

                                    <!-- Tabs with icons on Card -->
                                    <div class="card card-nav-tabs ">
                                        <div class="card-header card-header-{{$user->color_name}}">
                                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                            <div class="nav-tabs-navigation">
                                                <div class="nav-tabs-wrapper">
                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#profile"
                                                               data-toggle="tab">
                                                                <i class="material-icons">face</i>
                                                                <b> Profile</b>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                                <i class="material-icons">lock_outline</i>
                                                                <b> Change password</b>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                                <i class="material-icons">photo</i>
                                                                <b> Change cover Image</b>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @include('inc.alert')

                                        <div class="card-body ">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="profile">

                                                    <div class="row">
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{__('Pseudo')}}</label>
                                                                <input id="username" type="text"
                                                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                                       name="username"
                                                                       value="{{ ($errors->any()? old('username') : $user->username) }}">

                                                                @if ($errors->has('username'))
                                                                <span class="invalid-feedback">
                                                                   <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{ __('Last name')}}</label>
                                                                <input id="name" type="text"
                                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                                       name="name"
                                                                       value="{{ ($errors->any()? old('name') : $user->name) }}">
                                                                @if ($errors->has('name'))
                                                                <span class="invalid-feedback">
                                                                   <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{ __('First name')}}</label>
                                                                {!! Form::text('first_name', null, ['class' => 'form-control','id' => 'first_name']) !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-5 row-block">
                                                            <div class="form-group">
                                                                <label for="name" class="bmd-label-floating">Email</label>
                                                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 row-block">
                                                            <div class="form-group">
                                                                <label for="cellphone" class="bmd-label-floating">{{ __('Phone')}}</label>
                                                                {!! Form::text('cellphone', null, ['class' => 'form-control','id' => 'cellphone']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label for="work" class="bmd-label-floating">{{ __('Work ?')}}</label>
                                                                {!! Form::text('work', null, ['class' => 'form-control','id'=>'work' ]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="fblink" class="bmd-label-floating">{{
                                                                    __('Facebook Username')}}</label>
                                                                <input id="fblink" type="text"
                                                                       class="form-control{{ $errors->has('fblink') ? ' is-invalid' : '' }}"
                                                                       name="fblink"
                                                                       value="{{ ($errors->any()? old('fblink') : $user->fblink) }}">
                                                                @if ($errors->has('fblink'))
                                                                <span class="invalid-feedback">
                                                                 <strong>{{ $errors->first('fblink') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="instalink" class="bmd-label-floating">{{
                                                                    __('Instagram Username')}}</label>
                                                                <input type="text"
                                                                       class="form-control{{ $errors->has('instalink') ? ' is-invalid' : '' }}"
                                                                       id="instalink" name="instalink"
                                                                       value="{{ ($errors->any()? old('instalink') : $user->instalink) }}">
                                                                @if ($errors->has('instalink'))
                                                                <span class="invalid-feedback">
                                                                     <strong>{{ $errors->first('instalink') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="birthday" class="bmd-label-floating">Birthday date</label>
                                                                {!! Form::text('birthday', $user->birthday ? $user->birthday->format('d/m/y') : null , ['class' => 'form-control datepicker']) !!}
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="twlink" class="bmd-label-floating">{{
                                                                    __('Twitter Username')}}</label>
                                                                <input type="text"
                                                                       class="form-control{{ $errors->has('twlink') ? ' is-invalid' : '' }}"
                                                                       id="twlink" name="twlink"
                                                                       value="{{ ($errors->any()? old('twlink') : $user->twlink) }}">
                                                                @if ($errors->has('twlink'))
                                                                <span class="invalid-feedback">
                                                                             <strong>{{ $errors->first('twlink') }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 row-block">
                                                            <label for="gender" class="bmd-label-floating">Sex</label>
                                                            {!! Form::select('gender', ['F' => 'Femelle', 'M' => 'Male'], null, ['class' => 'selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Sex']) !!}
                                                        </div>
                                                        <div class="col-sm-6 row-block">
                                                            <label for="color_name" class="control-label">Color favorite</label>
                                                            {!! Form::select('color_name', [
                                                            'info' => 'Info', 'danger' => 'Danger','warning' => 'Warning','rose'=>'Rose','dark'=>'Dark','success'=>'Success','primary'=>'Primary'
                                                            ], null, ['class' => 'selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Color', 'data-size'=>'6']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="media-body">

                                                        <label for="body" class="bmd-label-floating"> Tell something about you in 200 words</label>
                                                        <textarea id="example5"
                                                                  class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                                                                  name="body" rows="6"> {{ ($errors->any()? old('body') : $user->body) }}</textarea>
                                                        @if ($errors->has('body'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('body') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <br/>

                                                </div>
                                                <div class="tab-pane" id="messages">

                                                    <div class="row">

                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                              <i class="material-icons">lock_outline</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                                <div class="col-sm-10 checkbox-radios">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="password_options" value="keep"
                                                                                   checked> Do Not Change Password
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="password_options"
                                                                                   value="manual"> Manuel Set New
                                                                            Password
                                                                            <span class="circle">
                                                                               <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="password" class="form-control" id="password"
                                                           placeholder="Password( Select manuel set new Password! )"
                                                           name="password">
                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                          <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                    <br/>
                                                </div>
                                                <div class="tab-pane" id="settings">

                                                    <div class="row">


                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">


                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail img-raised">
                                                                            @if($user->avatarcover)
                                                                            <img src="{{ url($user->avatarcover)  }}?{{ time() }}" alt="...">
                                                                            @endif
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail  img-raised">

                                                                        </div>
                                                                        <div>
                                                                            <span class="btn btn-raised btn-round btn-{{ $user->color_name }} btn-file">
                                                                                <span class="fileinput-new">
                                                                                     <i class="material-icons">photo</i>
                                                                                    <b> Add Cover Image</b>
                                                                                </span>
                                                                                <span class="fileinput-exists">
                                                                                    <i class="material-icons">edit</i>
                                                                                    <b> Change</b>
                                                                                </span>
                                                                                <input id="avatarcover" type="file" class="form-control" name="avatarcover"/>
                                                                            </span>
                                                                            <br/>
                                                                            <a href="#pablo"
                                                                               class="btn btn-danger btn-round fileinput-exists"
                                                                               data-dismiss="fileinput">
                                                                                <i class="fa fa-times"></i>
                                                                                <b>Remove</b>
                                                                            </a>
                                                                        </div>
                                                                    </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit text-center">
                                        <a href="{{ route('/', Auth::user()->username) }}"
                                           class="btn btn-{{$user->color_name}} btn-raised btn-round">
                                            <i class="material-icons">undo</i>
                                            <b>Back to profile</b>
                                        </a>
                                        <button class="btn btn-success btn-raised btn-round" type="submit">
                                           <span class="btn-label">
                                             <i class="material-icons">save_alt</i>
                                           </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                   <br/>
                                    {!! Form::close() !!}
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
<!-- emojionearea -->
<script src="/assets/js/plugins/emojionearea.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>

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
@endsection
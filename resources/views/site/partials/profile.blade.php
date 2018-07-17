@extends('inc.main_account')
@section('title', '| Editer son profile')

@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
@endsection
@section('content')
<div class="signup-page sidebar-collapse">
    <div class="page-header header-filter" style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-11 ml-auto mr-auto">
                                    {!! Form::model($user,['files'=> true]) !!}

                                        <div class="row">
                                            <div class="follow">


                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                    <div>
                                                        <span class="btn btn-raised btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Add couverture</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="avatarcover" type="file" class="form-control" name="avatarcover"/>
                                                        </span>
                                                        <br/>
                                                        <a href="#pablo"
                                                           class="btn btn-danger btn-round fileinput-exists"
                                                           data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ml-auto mr-auto">
                                                <div class="profile text-center">
                                                    <br>
                                                    <div class="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                                            @if($user->avatar)
                                                            <img src="{{ url($user->avatar)  }}" alt="...">
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                        <div>
                                                        <span class="btn btn-raised btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Add Profile</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="avatar" type="file" class="form-control" name="avatar"/>
                                                        </span>
                                                            <br/>
                                                            <a href="#pablo"
                                                               class="btn btn-danger btn-round fileinput-exists"
                                                               data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @include('inc.alert')
                                        <div class="row">
                                            <div class="col-md-6 row-block">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Pseudo')}}</label>
                                                    <input id="username" type="text"  class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ ($errors->any()? old('username') : $user->username) }}">
                                                    @if ($errors->has('username'))
                                                    <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 row-block">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Nom')}}</label>
                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ ($errors->any()? old('name') : $user->name) }}">
                                                    @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 row-block">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Prenom')}}</label>
                                                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ ($errors->any()? old('lastname') : $user->lastname) }}" >
                                                    @if ($errors->has('lastname'))
                                                    <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('lastname') }}</strong>
                                                 </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 row-block">
                                                <div class="form-group">
                                                    <label for="cellphone" class="bmd-label-floating">{{ __('Phone')}}</label>
                                                    <input type="text" class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" id="cellphone" name="cellphone" value="{{ ($errors->any()? old('cellphone') : $user->cellphone) }}">
                                                    @if ($errors->has('cellphone'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cellphone') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 row-block">
                                                <div class="form-group">
                                                    <label for="work" class="bmd-label-floating">{{ __('What do you do?')}}</label>
                                                    <input type="text" class="form-control{{ $errors->has('work') ? ' is-invalid' : '' }}" id="work" name="work" value="{{ ($errors->any()? old('work') : $user->work) }}">
                                                    @if ($errors->has('work'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('work') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group">
                                                    <label for="fblink" class="bmd-label-floating">{{ __('Facebook Username')}}</label>
                                                    <input id="fblink" type="text" class="form-control{{ $errors->has('fblink') ? ' is-invalid' : '' }}" name="fblink" value="{{ ($errors->any()? old('fblink') : $user->fblink) }}" >
                                                    @if ($errors->has('fblink'))
                                                    <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('fblink') }}</strong>
                                                 </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group">
                                                    <label for="instalink" class="bmd-label-floating">{{ __('Instagram Username')}}</label>
                                                    <input type="text" class="form-control{{ $errors->has('instalink') ? ' is-invalid' : '' }}" id="instalink" name="instalink" value="{{ ($errors->any()? old('instalink') : $user->instalink) }}">
                                                    @if ($errors->has('instalink'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('instalink') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group">
                                                    <label for="twlink" class="bmd-label-floating">{{ __('Twitter Username')}}</label>
                                                    <input type="text" class="form-control{{ $errors->has('twlink') ? ' is-invalid' : '' }}" id="twlink" name="twlink" value="{{ ($errors->any()? old('twlink') : $user->twlink) }}">
                                                    @if ($errors->has('twlink'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('twlink') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Email</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ ($errors->any()? old('email') : $user->email) }}" >
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    <div class="submit text-center">
                                        <button class="btn btn-rose btn-raised btn-round" type="submit">
                                            <span class="btn-label">
                                              <i class="material-icons">save_alt</i>
                                            </span>
                                        </button>
                                    </div>



                                    <div class="row">

                                        <div class="text-center">
                                            <h4 class="card-title text-dark">
                                                <b style="color: #002fff">Password Edite</b>
                                            </h4>
                                            <h4>Enter your <b>Password</b> <b style="color: red">Or</b> Select <b>Auto Generate Password</b> to <b style="color: red">automatically generate the password.</b><br>
                                            </h4>
                                        </div>

                                        <div class="input-group form-control-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                <label for="exampleInput1" class="bmd-label-floating">Password</label>
                                                <br>
                                                <div class="col-sm-10 checkbox-radios">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="password_options" value="keep" checked> Do Not Change Password
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="password_options" value="auto"> Auto-Generate New Password
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="password_options" value="manual" > Manuel Set New Password
                                                            <span class="circle">
                                                               <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="password"  placeholder="Password( Select manuel set new Password! )"  name="password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                          <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <div class="media-body">

                                        <label for="body" class="bmd-label-floating">Dis quelque chose à propos de toi en 200 mots</label>
                                        <textarea id="example5" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"  name="body" rows="6"  > {{ ($errors->any()? old('body') : $user->body) }}</textarea>
                                        @if ($errors->has('body'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <br>
                                 <div class="submit text-center">
                                     <button class="btn btn-rose btn-raised btn-round" type="submit">
                                           <span class="btn-label">
                                             <i class="material-icons">save_alt</i>
                                           </span>
                                                 Mettre a jour
                                     </button>
                                 </div>
                                 <div class="submit text-center">
                                     <a href="{{ route('/', Auth::user()->username) }}" class="btn btn-info btn-raised btn-round">
                                         retourner au profil
                                     </a>
                                 </div>
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
@section('script')
<!-- emojionearea -->
<script src="/assets/js/plugins/emojionearea.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>

<script>
    $(document).ready(function() {

        $(".datepicker").datetimepicker({format:"DD/MM/YYYY",icons:{time:"fa fa-clock-o",date:"fa fa-calendar",up:"fa fa-chevron-up",down:"fa fa-chevron-down",previous:"fa fa-chevron-left",next:"fa fa-chevron-right",today:"fa fa-screenshot",clear:"fa fa-trash",close:"fa fa-remove"}})

    });
</script>
@endsection


<div class="card-body">
    <div class="tab-content">
        <div class="tab-pane active" id="about">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="picture-container">
                        <div class="picture">
                            @if(Auth::user()->avatar)
                            <img src="{{ url(Auth::user()->avatar)  }}" class="picture-src" id="wizardPicturePreview" title="" />
                            @endif
                            <input type="file" name="avatar" id="wizard-picture">
                        </div>
                        <h6 class="description">Choose Picture</h6>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="exampleInput1" class="bmd-label-floating">Username (required)</label>
                            {!! Form::text('username', null, array('class' => 'form-control','id'=>'exampleInput11','placeholder' => '', 'required' => '')) !!}
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">record_voice_over</i>
                        </span>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="exampleInput11" class="bmd-label-floating">Name</label>
                            {!! Form::text('name', null, array('class' => 'form-control','id'=>'exampleInput11','placeholder' => '', 'required' => '')) !!}
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 mt-3">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInput1" class="bmd-label-floating">Email (required)</label>
                            {!! Form::email('email', null, array('class' => 'form-control','id' => 'exampleemalil','placeholder' => '', 'required' => '')) !!}
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 mt-3">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">how_to_reg</i>
                        </span>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInput1" class="bmd-label-floating">Chose role</label>
                            {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $admin->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}

                            @if ($errors->has('roles'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('roles') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-header text-center">
                    <h4 class="card-title text-dark">
                        <b style="color: #002fff">Password Create</b>
                    </h4>
                    <h4>Enter your <b>Password</b> <b style="color: red">Or</b> Select <b>Auto Generate Password</b> to <b style="color: red">automatically generate the password.</b><br>
                    </h4>
                </div>
                <div class="col-lg-10 mt-3">
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
                                <!--
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="password_options" value="manual" > Manuel Set New Password
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <input type="password" class="form-control" id="password"  placeholder="Password( Select manuel set new Password! )"  v-if="!auto_password" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
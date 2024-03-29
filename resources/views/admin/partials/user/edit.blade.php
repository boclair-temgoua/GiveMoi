@extends('inc.admin._main')
@section('title', '- User Create')
@section('style')
@parent
<link rel="stylesheet" href="/assets/dashboard/assets/css/plugins/emojionearea.min.css">


@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-8 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <form id="RegisterValidation" role="form" method="POST" action="{{route('user.update',$user->id)}}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Edit User
                            </h3>
                            <h5 class="card-description">This information will let us know more about you.</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    <input type="file" id="wizard-picture">
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
                                                    <input type="text" class="form-control" id="exampleInput1" name="username" value="{{ $user->username }}">
                                                    @if ($errors->has('username'))
                                                    <span class="help-block">
                                                         <strong class="text-danger text-center">{{ $errors->first('username') }}</strong>
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
                                                    <input type="text" class="form-control" id="exampleInput11" name="name" value="{{ $user->name }}">
                                                    @if ($errors->has('name'))
                                                    <span class="help-block">
                                                         <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
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
                                                    <input type="email" class="form-control" id="exampleemalil" name="email" value="{{ $user->email }}">
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
                                                        <input type="password" class="form-control" id="password"  placeholder="password"  v-if="!auto_password" name="password">
                                                        @if ($errors->has('password'))
                                                        <span class="help-block">
                                                         <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-rose btn-raised btn-round" value="Update User">
                            </div>
                        </div>
                        <div class="submit text-center">
                            <a href="{{route('user.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Users</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
@include('inc.admin._footer')
</div>
</div>

@endsection

@section('script')
@parent


<script type="text/javascript">
    $(document).ready(function() {

        //init wizard

        demo.initMaterialWizard();

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initCharts();

    });
</script>
<script>
    $(document).ready(function() {
        // Initialise the wizard
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.card-wizard').addClass('active');
        }, 600);
    });
</script>
@endsection




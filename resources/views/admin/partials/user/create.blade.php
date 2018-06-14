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
                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('user.store') }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Create User
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
                                                    <input type="text" class="form-control" id="exampleInput1" value="{{ old('username') }}" name="username" required>
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
                                                    <input type="text" class="form-control" id="exampleInput11" name="name" value="{{ old('name') }}" required>
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
                                                    <input type="email" class="form-control" id="exampleemalil" name="email" value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                         <strong class="text-danger">{{ $errors->first('email') }}</strong>
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
                                                <div class="form-group">
                                                    <label for="exampleInput1" class="bmd-label-floating">Password</label>
                                                    <input type="password" class="form-control" id="password"  v-if="!auto_password" name="password">
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <div class="form-check mr-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"  v-model=""  name="auto_generate" {{ old('remember') ? 'checked' : '' }} > Auto Generate Password
                                                        <span class="form-check-sign">
                                                              <span class="check"></span>
                                                            </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Create user">
                            </div>
                        </div>
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
<script src="/assets/dashboard/assets/js/plugins/emojionearea.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>
@endsection




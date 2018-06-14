@extends('inc.admin._main')
@section('title', '- Creation du Role')



@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                <form id="RegisterValidation" role="form" method="POST" action="{{ route('administrators.store') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">Create Administrator</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="exampleInput2" class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" minLength="3" required="true"/>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                             <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="exampleInput2" class="bmd-label-floating">Username</label>
                                <input type="text" class="form-control" name="username" id="username"  value="{{ old('username') }}" minLength="3" required="true"/>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
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
                            <div class="card-header text-center">
                                <h4 class="card-title text-dark">
                                    <b style="color: #002fff">Password Create</b>
                                </h4>
                                <h4>Enter your <b>Password</b> <b style="color: red">Or</b> Select <b>Auto Generate Password</b> to <b style="color: red">automatically generate the password.</b><br>
                                </h4>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="exampleInput1" class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" id="password"  v-if="!auto_password" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                     <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                 </span>
                                @endif
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
                            <div class="card-header">
                                <h4 class="card-title text-dark">
                                    <b style="color: #ff193f">Select The Role</b>
                                </h4>
                            </div>

                            @foreach($roles as $role)
                            <div class="card-footer text-right">
                                <div class="form-check mr-auto">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->id}}">{{ $role->display_name}}
                                        <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            @endforeach

                        </div>




                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Create Admin">
                        </div>
                        <br>
                        <div class="submit text-center">
                            <a href="{{route('administrators.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Administrators</a>
                        </div>
                        </div>
                    </div>
            <br>
                </form>
            </div>
        </div>
    </div>
</div>
@include('inc.admin._footer')
</div>
</div>

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
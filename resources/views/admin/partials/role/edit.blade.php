@extends('inc.admin._main')
@section('title', '- Creation du Role')



@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                <form id="RegisterValidation" role="form" method="POST" action="{{route('roles.update',$role->id)}}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">Role Update</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label for="display_name"  class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="display_name"  id="display_name" minLength="3" value="{{ $role->display_name}}" required="true"/>
                                @if ($errors->has('display_name'))
                                <span class="help-block">
                                     <strong class="text-danger text-center">{{ $errors->first('display_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description"  class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="description"  id="description" value="{{ $role->description}}" minLength="3" required="true"/>
                                @if ($errors->has('description'))
                                <span class="help-block">
                                   <strong class="text-danger text-center">{{ $errors->first('description') }}</strong>
                                 </span>
                                @endif
                            </div>
                            <div class="card-header text-center">
                                <h4 class="card-title text-dark">
                                    <b class="text-success">Admin Permissions</b>
                                </h4>
                            </div>


                            @include('admin.partials.role.form')
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Update Role">
                            </div>
                            <br>
                            <div class="submit text-center">
                                <a href="{{route('roles.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Role</a>
                            </div>
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
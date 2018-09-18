@extends('inc.admin._main')
@section('title', '- Creation de la Permission')
@section('sectionTitle', 'Permissions')
@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                <form id="RegisterValidation" role="form" method="POST" action="{{ route('permissions.store') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">Permission Create</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label for="display_name"  class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="display_name"  id="display_name" minLength="3" placeholder="Name of the Permission" required="true"/>
                                @if ($errors->has('display_name'))
                                <span class="help-block">
                                    <strong class="text-danger text-center">{{ $errors->first('display_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!--
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description"  class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="description"  id="description" placeholder="Description" minLength="3" required="true"/>
                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong class="text-danger text-center">{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            -->

                            <!--
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <select class="selectpicker" name="for" id="for" data-style="select-with-transition" title="Permission for" data-size="7">
                                    <option disabled>Choose Permission</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            -->






                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Create Permission">
                        </div>
                        <br>
                        <div class="submit text-center">
                            <a href="{{route('permissions.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Permissions</a>
                        </div>
                        <br>
                    </div>
            </form>
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
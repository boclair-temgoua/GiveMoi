@extends('inc.admin._main')
@section('title', '- Update permission')
@section('sectionTitle', 'Permissions')
@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @can('edit-permission')
        <div class="row">
                <div class="col-md-10 col-sm-6 ml-auto mr-auto">
           {!! Form::model($permission, ['files'=> 'true','method' => 'PATCH','route' => ['permissions.update', $permission->id], 'id' => 'RegisterValidation']) !!}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">
                                <b>Update Permission</b>
                            </h4>
                        </div>
                        <div class="card-body ">

                            @include('admin.partials.permission.form')

                        </div>
                        <br>
                        <div class="submit">
                            <div class="text-center">
                                <a href="{{route('permissions.index')}}" class="btn btn-info btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">undo</i>
                                    </span>        
                                    <b>Back to Permission Table</b>
                                </a>
                                <button type="submit" class="btn btn-success btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">save_alt</i>
                                    </span>        
                                    <b>Update Permissions</b>
                                </button>
                            </div>
                            <br>
                        </div>
                    </div>
                {!! Form::close() !!}
               </div>
        </div>
        @else
        <div class="submit text-center">
            @include('inc.admin.components.alert_permission')
        </div>
        @endcan
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
@extends('inc.admin._main')
@section('title', '- Creation du Role')
@section('sectionTitle', 'Roles')
@section('style')
@endsection

@section('content')
<div class="content">
    @include('inc.admin.components.status_admin')
    <div class="container-fluid">

        <!-- le can('est la protection de la permission ') -->
        @can('edit-role')

        <!-- form init -->
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">

                @include('inc.alert')

                {!! Form::model($role, ['files'=> 'true','method' => 'PATCH','route' => ['roles.update', $role->id], 'id' => 'RegisterValidation']) !!}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">
                                <b>Update Role</b>
                            </h4>
                        </div>

                        @include('admin.partials.role.form')

                        <div class="submit">
                            <div class="text-center">
                                <a href="{{route('roles.index')}}" class="btn btn-info btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">undo</i>
                                    </span>
                                    <b>Back to Roles Table</b>
                                </a>
                                <button type="submit" class="btn btn-success btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">save_alt</i>
                                    </span>
                                    <b>Update Role</b>
                                </button>
                            </div>
                            <br>
                        </div>
                        <br>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- end form -->
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
@endsection
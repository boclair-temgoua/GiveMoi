@extends('inc.admin._main')
@section('title', '- Creation du Role')



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
                            <h4 class="card-title">Role Update</h4>
                        </div>


                        @include('admin.partials.role.form')

                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Update Role">
                        </div>
                        <div class="submit text-center">
                            <a href="{{route('roles.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Role</a>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
@endsection
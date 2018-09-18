@extends('inc.admin._main')
@section('title', '- administrator update')
@section('sectionTitle', 'Administrators')
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
        @include('inc.admin.components.status_admin')
        <br/>
        <div class="col-md-10 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    {!! Form::model($admin, ['files'=> 'true','method' => 'PATCH','route' => ['administrators.update', $admin->id], 'id' => 'RegisterValidation']) !!}
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                <b>Update Data Ddministrator</b>
                            </h3>
                            <h5 class="card-description">This information will let us know more about you.</h5>
                        </div>

                        @include('admin.partials.administrator.form')

                    <div class="submit">
                        <div class="text-center">
                            <a href="{{route('administrators.index')}}" class="btn btn-info btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">undo</i>
                                    </span>
                                <b>Back to Administrators</b>
                            </a>
                            <button type="submit" class="btn btn-success btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">save_alt</i>
                                    </span>
                                <b>Update Admin</b>
                            </button>
                        </div>
                    </div>
                    <br>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
@include('inc.admin._footer')
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
<script>
    $(document).ready(function () {

        $(".datepicker").datetimepicker({
            format: "DD/MM/YYYY",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        })

    });
</script>
@endsection




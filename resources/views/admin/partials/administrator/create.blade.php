@extends('inc.admin._main')
@section('title', '- Aser Create')
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
                     {!! Form::open(array('route' => 'administrators.store','files'=> 'true','method'=>'POST')) !!}

                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Create data Administrator
                            </h3>
                            <h5 class="card-description">This information will let us know more about you.</h5>

                            @include('inc.alert')

                        </div>

                        @include('admin.partials.administrator.form',['admin' => new \App\Model\admin\admin()])


                        <div class="submit text-center">
                            <input type="submit" class="btn btn-rose btn-raised btn-round"  value="Create Admin">
                        </div>
                        <div class="submit text-center">
                            <a href="{{route('administrators.index')}}" class="btn btn-facebook btn-raised btn-round">Back to the table Administrators</a>
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
</div>
</div>

@endsection

@section('script')


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
@endsection
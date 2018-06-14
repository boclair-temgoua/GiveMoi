
<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/bootstrap-material-design.js"></script>



<!--  Google Maps Plugin
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
-->
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="/assets/js/plugins/moment.min.js"></script>
<!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js"></script>
<!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--    Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--    Plugin for Small Gallery in Product Page -->
<script src="/assets/js/plugins/jquery.flexisel.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="/assets/js/material-kit.js?v=2.0.3"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Forms Validations Plugin -->
<script src="/assets/js/plugins/jquery.validate.min.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="/assets/js/plugins/sweetalert2.js"></script>
<script src="/assets/js/plugins/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
{!! Toastr::message() !!}
@include('sweetalert::alert')

@section('scripts')


@show
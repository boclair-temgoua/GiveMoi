<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.site.head')

</head>
<body>

@include('inc.nav_account')

@section('content')

@show

@include('layouts.site.script')

</body>
</html>

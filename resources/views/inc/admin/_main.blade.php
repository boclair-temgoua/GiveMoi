<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.admin._head')

@yield('style')
</head>
<body>
<div class="wrapper">


@include('inc.admin._dashboard')
@include('inc.admin._nav')



@section('content')

@show



@include('layouts.admin._script')
@yield('script')
</body>
</html>
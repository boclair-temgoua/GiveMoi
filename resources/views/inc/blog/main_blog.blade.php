<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
 @include('layouts.blog.head_blog')
</head>
<body>

@include('inc.blog.nav_blog')
@section('content')

@show




@include('inc.blog.footer_blog')

@include('layouts.blog.script_blog')

</body>
</html>
@extends('inc.app')
<?php $titleTag = htmlspecialchars($presentation->title); ?>
@section('title',"| $titleTag" )

@section('style')
<link rel="stylesheet" href="/assets/css/plugins/zoom.css">
@endsection
@section('navbar')

@foreach($presentation->colors as $color)
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{!! $color->slug !!}" color-on-scroll="100" id="sectionsNav">
    @endforeach
@endsection
@section('content')
<div class="about-us ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{ url('assets/img/about/' .$presentation->image) }}&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{!! $presentation->title !!}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">

        <div class="container">

            <div class="section section-text">
                <div class="section col-md-12 ml-auto mr-auto text-center">
                    <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="{{ url('assets/img/about/' .$presentation->image) }}">
                </div>
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                      {!! htmlspecialchars_decode($presentation->body)!!}
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
@include('inc._footer')
@endsection

@section('scripts')
    <!-- Zoom Validations Plugin -->
    <script src="/assets/js/plugins/zoom.js"></script>
@endsection
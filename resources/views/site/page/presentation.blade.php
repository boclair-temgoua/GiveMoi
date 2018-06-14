@extends('inc.app')
@section('title', '- Presentation')

@section('style')

@endsection
@section('content')
<div class="about-us ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/pro/bg9.jpg&apos;);">
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
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                      {!! htmlspecialchars_decode($presentation->body)!!}
                    </div>
                </div>
            </div>

        </div>
    </div>




@include('inc._footer')
@endsection

@section('script')

@endsection
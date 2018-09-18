@extends('inc.app')
@section('title',"- Conditions and terms " )

@section('style')

@endsection

@section('navbar')

@guest
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
@else
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{{ Auth::user()->color_name }}" color-on-scroll="100" id="sectionsNav">
@endguest
    @endsection
    @section('content')
    <div class="ecommerce-page sidebar-collapse">
    @if(count($conditions) > 0)
    @foreach($conditions as $condition)
        <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{ url('assets/img/conditions/' .$condition->cover_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <div class="brand text-center">
                            <h1>{{ $condition->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto ">
                            {!! \Michelf\Markdown::defaultTransform($condition->body) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif




        @include('inc._footer')
    </div>
@endsection

@section('scripts')

@endsection
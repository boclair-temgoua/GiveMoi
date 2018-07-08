@extends('inc.app')
@section('title',"| Conditions and terms " )

@section('style')

@endsection

@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    @if(count($conditions) > 0)
    @foreach($conditions as $condition)
    <div class="page-header header-filter" data-parallax="true" style="background-image: url(&apos;{{ url('assets/img/conditions/' .$condition->cover_image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
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
                {!! \Michelf\Markdown::defaultTransform($condition->body) !!}
            </div>
        </div>
    </div>
    @endforeach
    @endif




@include('inc._footer')
@endsection

@section('scripts')

    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('document').ready(function(){
                $('.infinite-scroll').jscroll({
                    autoTrigger: true,
                    debug: true,
                    padding: 0,
                    nextSelector: '.pagination li.active + li a',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });


            });
        });
    </script>
@endsection
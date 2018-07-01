@extends('inc.app')
@section('title',"| Events" )

@section('style')

@endsection

@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
@endsection
@section('content')
<div  class="pricing ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/bg2.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Let&apos;s get started</h1>
                    <h4>To get started, you will need to choose a plan for your needs. You can opt in for the monthly of annual options and go with one fo the three listed below.</h4>

                    @include('inc.alert')
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">

        <div class="container">

            <div class="infinite-scroll">
                <div class="row">
                    @if(count($events) > 0)
                    @foreach($events as $event)
                    <div class="col-lg-4">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">

                                <a href="{{ route('topic.events',$event->slug) }}">
                                    <img class="img" src="{{ asset('assets/img/event/' .$event->cover_image) }}">

                                    <div class="card-title text-center">
                                        {{ str_limit($event->title, 100,'...')}}
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                @foreach($event->colors as $color)
                                <h6 class="card-category text-{!! $color->slug !!} text-center">{{ $event->name }}</h6>
                                <h6 class="card-title text-center text-{!! $color->slug !!}">Lieux: {{ $event->country }} {{ $event->city }}</h6>
                                @endforeach
                                <p class="card-description">
                                    {!! htmlspecialchars_decode(str_limit($event->summary, 150,'...')) !!}
                                </p>
                            </div>


                            <div class="stats ml-auto">
                                <i class="material-icons text-rose">favorite</i> 2.4K &#xB7;
                                @foreach($event->colors as $color)
                                <i class="material-icons text-{!! $color->slug !!}">forum</i> {{ $event->comments()->count() }} &#xB7;
                                @endforeach
                            </div>

                            <div class="card-footer">
                                <div class="author">
                                    <a href="{{ route('/', $event->user->username) }}">
                                        <img src="{{ url($event->user->avatar)  }}" alt="..." class="avatar img-raised">
                                        <span>{{ $event->user->username }}</span>
                                    </a>
                                </div>
                                <div class="stats ml-auto">
                                    <i class="material-icons">schedule</i> {{ $event->created_at->diffForHumans()  }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="submit text-center">
                    {!! $events->links() !!}
                </div>
            </div>
        </div>
    </div>
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
                    loadingHtml: '<img class="center-block" src="https://demos.laraget.com/images/loading.gif" alt="Loading..." />',
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




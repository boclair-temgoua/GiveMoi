@extends('inc.main_account')

@section('style')

@endsection
@section('content')
<div  class="pricing ">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/bg2.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Let&apos;s get started</h1>
                    <h4>To get started, you will need to choose a plan for your needs. You can opt in for the monthly of annual options and go with one fo the three listed below.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title">
                        <h2 id="coloredShadows">Dynamic Shadows&#x2122;</h2>
                        <h4>Material Kit PRO is coming with the famous colored shadows. That means each image from the cards is getting an unique color shadow. You don&apos;t have to do anything to activate them, just enjoy the new look of your website.</h4>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">


                @if(count($events) > 0)

                @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="{{ route('events.show',$event->slug) }}">
                                <img class="img" src="../assets/img/kit/pro/examples/card-blog1.jpg">
                                <div class="card-title text-center">
                                    {{ $event->title }}
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-{{ $event->color }} text-center">{{ $event->name }}</h6>
                            <h6 class="card-title text-center text-{{ $event->color }}">Lieux: {{ $event->country }} {{ $event->city }}</h6>
                            <p class="card-description">
                                {!! htmlspecialchars_decode(str_limit($event->body, 100,'...')) !!}
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="author">
                                <a href="#pablo">
                                    <img src="../assets/img/kit/pro/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                    <span> </span>
                                </a>
                            </div>
                            <div class="stats ml-auto">
                                <i class="material-icons">favorite</i> 2.4K &#xB7;
                                <i class="material-icons">schedule</i> {{ $event->created_at->diffForHumans()  }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            {{ $events->links()}}
            <br>
        </div>
    </div>
@include('inc._footer')
@endsection

@section('script')

@endsection
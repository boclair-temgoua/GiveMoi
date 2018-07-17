@extends('inc.app')
@section('title', "- all articles")

@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="ecommerce-page sidebar-collapse">
        <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/examples/clark-street-merc.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <div class="brand">
                            <h1 class="title">Ecommerce Page!</h1>
                            <h4>Free global delivery for all products. Use coupon
                                <b>25summer</b> for an extra 25% Off</h4>

                            @include('inc.alert')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <!-- section -->
            <div class="section">
                <div class="container">
                    <div class="cards">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-background" style="background-image: url(../assets/img/examples/color1.jpg)">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Productivy Apps</h6>
                                        <a href="#pablo">
                                            <h3 class="card-title">The best trends in fashion 2017</h3>
                                        </a>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-white btn-round">
                                            <i class="material-icons">subject</i> Read
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-md-4">
                                <div class="card card-background" style="background-image: url(../assets/img/examples/color3.jpg)">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Fashion News</h6>
                                        <h3 class="card-title">Kanye joins the Yeezy team at Adidas</h3>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-white btn-round">
                                            <i class="material-icons">subject</i> Read
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-md-4">
                                <div class="card card-background" style="background-image: url(../assets/img/examples/color2.jpg)">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Productivy Apps</h6>
                                        <a href="#pablo">
                                            <h3 class="card-title">Learn how to use the new colors of 2017</h3>
                                        </a>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-white btn-round">
                                            <i class="material-icons">subject</i> Read
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card card-background" style="background-image: url(../assets/img/dg3.jpg)">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Tutorials</h6>
                                        <a href="#pablo">
                                            <h3 class="card-title">Trending colors of 2017</h3>
                                        </a>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-white btn-round">
                                            <i class="material-icons">subject</i> Read
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card card-background" style="background-image: url(../assets/img/dg1.jpg)">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Productivy Style</h6>
                                        <a href="#pablo">
                                            <h3 class="card-title">Fashion &amp; Style 2017</h3>
                                        </a>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-white btn-round">
                                            <i class="material-icons">subject</i> read
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">



                                @if(count($articles) > 0)
                                @foreach($articles as $item)
                                <div class="col-lg-4 ">
                                    <div class="card card-blog">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" data-action="zoom" src="/assets/img/examples/card-blog2.jpg">
                                            </a>
                                        </div>
                                        <div class="card-body ">


                                            @foreach($item->categories as $category)
                                            <a href="{{ route('topic.category', ['slug' => $category->slug ]) }}">
                                                @foreach($item->colors as $color)
                                                <span class="badge badge-{!! $color->slug !!}">
                                                        {{ $category->name }}
                                                </span>
                                                @endforeach
                                            </a>
                                            @endforeach

                                            <h4 class="card-title">
                                                <a href="{{ route('topic.articles',$item->slug) }}">{{ str_limit($item->title, 100,'...')}}</a>
                                            </h4>
                                            <p class="card-description">
                                                {!! htmlspecialchars_decode(str_limit($item->body, 150,'')) !!}<a href="{{ route('topic.articles',$item->slug) }}" class="text-dark">[...]</a>
                                            </p>
                                        </div>
                                        <div class="card-footer ">
                                            <div class="author">
                                                <a href="{{ route('/', $item->user->username) }}">
                                                    <img src="{{ url($item->user->avatar)  }}" alt="{{ $item->user->username }}" class="avatar img-raised">
                                                    <span title="{!! $item->user->name !!}">{{ str_limit($item->user->name, 13,'...')}}</span>
                                                </a>
                                            </div>
                                            <div class="stats ml-auto">
                                                <i class="material-icons">schedule</i> 5 min read
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- section -->
        </div>
        <!-- end-main-raised -->

@include('inc._footer')
@endsection

@section('scripts')

@endsection
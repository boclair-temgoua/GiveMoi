@extends('inc.app')
@section('title', '| followers')
@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-inverse" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="blog-post ">

        <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{$user->avatarcover }}&apos;);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h3 class="title">{{ $user->name }}</h3>
                        <small class="title">Member Since {{ $user->created_at->format('F Y') }}</small><br>
                        <b class="card-category-social">{!! htmlspecialchars_decode($user->body) !!}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section section-blog-info">
                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="card-avatar">
                                            <a href="#pablo">
                                                <img class="img" src="{{ url($user->avatar)  }}">
                                            </a>
                                            <div class="ripple-container"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="card-title">{{ $user->name }}</h4>
                                        <p class="description">{{ $user->body}}</p>
                                    </div>
                                    <div class="col-md-2">

                                        @guest
                                        <button class="btn btn-facebook btn-round follow float-right" data-toggle="modal" data-target="#loginModal">
                                            <i class="material-icons">add</i>
                                            <strong>
                                                Follow
                                            </strong>
                                        </button>
                                        @else
                                        @if(Auth::check())
                                        <button class="btn btn-facebook btn-round follow float-right"  data-id="{{ $user->id }}">
                                            <i class="material-icons">add</i>
                                            <strong>
                                                @if(auth()->user()->isFollowing($user))
                                                UnFollow
                                                @else
                                                Follow
                                                @endif
                                            </strong>
                                        </button>
                                        @endif
                                        @endguest

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section-comments">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="media-area">
                                <h3 class="title text-center">{{ $user->followers()->get()->count() }} {{ str_plural('Follower', $user->followers->count()) }}</h3>
                                @if(count($followers) > 0)
                                @foreach($user->followers as $item)
                                <div class="media">
                                    <a class="float-left" href="{{ route('/', $item->username) }}">
                                        <div class="avatar">
                                            <img class="media-object" src="{{ url($item->avatar)  }}" alt="...">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ route('/', $item->username) }}">
                                            <h4 class="media-heading">{{ $item->name }}</h4>
                                        </a>
                                        <small><a href="{{ route('/@{username}/followers',$item->username) }}" class="text-dark">Followed by</a> <b>{{ $item->followers()->get()->count() }}</b>
                                            {{ str_plural('people', $item->followers->count()) }}
                                        </small>

                                        <h6 class="text-muted"></h6>
                                        <p>{!! htmlspecialchars_decode($item->body) !!}</p>
                                        <div class="media-footer">

                                            <a href="{{ route('/', $item->username) }}" class="btn btn-facebook btn-link float-right">
                                                <i class="material-icons">whatshot</i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <!-- end media-post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('inc._footer')
@include('inc.login_modal')
@endsection

@section('scripts')

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.follow').click(function(){
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).data('id');
                console.log(id);
                var reference= $(this);
                jQuery.ajax({
                    type:'POST',
                    url:'/profiles/toggle',
                    data:{user_id:id},
                    success:function(data){
                        if(jQuery.isEmptyObject(data.success.attached)){
                            reference.find("strong").text("Follow");
                        }else{
                            reference.find("strong").text("UnFollow");
                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">

    </script>
@endsection
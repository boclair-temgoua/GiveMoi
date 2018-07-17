@extends('inc.main_account')
<?php $titleTag = htmlspecialchars($user->name); ?>
@section('title',"- $titleTag" )

@section('style')


@endsection
@section('content')
<div  class="profile-page sidebar-collapse">
   <div class="page-header header-filter" data-parallax="true" style="background-image: url(&apos;{{ url($user->avatarcover)  }}&apos;);"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                @if($user->avatar)
                                <img src="{{ url($user->avatar)  }}" alt="{!! $user->username !!}" class="img-raised rounded-circle img-fluid">
                                @endif
                            </div>
                            <div class="name">
                                @if(Auth::guest())
                                <button class="btn btn-rose btn-round follow" data-toggle="modal" data-target="#loginModal">
                                    <strong>
                                        Suivre
                                    </strong>
                                </button>
                                @else
                                @if(Auth::check())
                                <button class="btn btn-rose btn-round follow"  data-id="{{ $user->id }}">
                                    <strong>
                                        @if(auth()->user()->isFollowing($user))
                                        <b>{{ $user->followers()->get()->count() }}</b> Ne plus suivre
                                        @else
                                        <b>{{ $user->followers()->get()->count() }}</b> Suivre
                                        @endif
                                    </strong>
                                </button>
                                @endif
                                @endguest


                                @if(!Auth::guest())
                                @if(Auth::user()->id == $user->id)
                                <a href="{{route('myaccount.profile')}}" class="btn btn-fab btn-rose btn-round" rel="tooltip" title="Edit your'are profile">
                                    <i class="material-icons">settings</i>
                                </a>
                                @endif
                                @endif
                                <h3 class="title">{{ $user->name }}</h3>
                                <p >Member Since {{ $user->created_at->format('j F Y') }}</p>
                                <p >Pays: Cameroun  <img src="/assets/img/flags/cm.png" alt="{!! $user->username !!}" class="img-raised img-fluid" style="width: 32px; height: 32px; position: absolute; top: 15px; left: 30px;border-radius: 50px "></p>
                                <h6>{!! $user->work  !!}</h6>
                                <a href="https://facebook.com/{{ $user->fblink }}" class="btn btn-just-icon btn-link btn-facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://instagram.com/{{ $user->instalink }}" class="btn btn-just-icon btn-link btn-instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com/{{ $user->twlink }}" class="btn btn-just-icon btn-link btn-twitter" target="_blank"><i class="fab fa-twitter"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{!! $user->body !!}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center nav-pills-danger" role="tablist">
                                <!--
                      color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                  -->
                                <li class="nav-item">
                                    <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">speaker_group</i> Evenements
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#media" role="tab" data-toggle="tab">
                                        <i class="material-icons">folder_open</i> Posts Articles
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="tab-content tab-space">
                    <div class="tab-pane active work" id="work">
                        <div class="row">
                            <div class="col-md-7 ml-auto mr-auto ">



                                <div class="submit text-center">
                                    <h4 class="title text-center">All Events
                                        @if(!Auth::guest())
                                        @if(Auth::user()->id == $user->id)
                                        <a href="{{route('events.create')}}" class="text-info"> Add</a> new event
                                        @endif
                                        @endif
                                    </h4>
                                </div>
                                @include('inc.alert')
                                <div class="row collections">
                                    @if(count($events) > 0)
                                    @foreach($events as $event)
                                    <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url(&apos;{{ asset('assets/img/event/' .$event->cover_image) }}')">
                                            <a href="#pablo"></a>
                                            <div class="card-body">


                                                @if(!Auth::guest())
                                                @if(Auth::user()->id == $event->user->id)
                                                <label class="badge card-title">
                                                    {!! $event->status? '<span style="color: #55B559">Event posted</span>' : '<span style="color: red">Event non posted</span>' !!}
                                                </label>
                                                @endif
                                                @endif
                                                <br>
                                                <div class="stats text-center">
                                                    @if(!Auth::guest())
                                                    @if(Auth::user()->id == $event->user->id)
                                                    <a href="{{ route('events.edit',$event->id) }}" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" title="Edit your event">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    @endif
                                                    @endif
                                                    <a href="{{ route('topic.events',$event->slug) }}" class="btn btn-info btn-just-icon btn-fill btn-round" target="_blank" title="View your event">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    @if(!Auth::guest())
                                                    @if(Auth::user()->id == $event->user->id)
                                                    <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#delete" data-catid="{{ $event->id }}" data-placement="bottom" title="Delete your event" >
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    @endif
                                                    @endif
                                                    <br>
                                                    <br>
                                                </div>

                                                @foreach($event->colors as $color)
                                                <label class="badge badge-{!! $color->slug !!}">{!! $event->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</label>
                                                @endforeach
                                                <a href="{{ route('events.show',$event->slug) }}">
                                                    <h6 class="card-title"> {{ str_limit($event->title, 40,'[...]') }}</h6>
                                                </a>
                                                <br>
                                                <span class="text-white">
                                                    {!! htmlspecialchars_decode(str_limit($event->summary, 103,'[...]')) !!}
                                                 </span>

                                                <br>
                                                <br>
                                                <div class="card-stats text-white">
                                                    <div class="author">
                                                        <a href="#{!! $event->user->username !!}">
                                                            <img src="{{ url($event->user->avatar)  }}" alt="{!! $event->user->username !!}" class="avatar img-raised">
                                                        </a>
                                                    </div>
                                                    <div class="stats ml-auto">
                                                        <i class="material-icons text-rose">favorite</i> 2.4K &#xB7;
                                                        @foreach($event->colors as $color)
                                                        <i class="material-icons text-{!! $color->slug !!}">forum</i> {{ $event->comments()->count() }}
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="submit text-center">
                                        <h4 class="title text-center">Your don't have events !
                                            @if(!Auth::guest())
                                            @if(Auth::user()->id == $user->id)
                                            <a href="{{route('events.create')}}" class="text-info"> create</a> now
                                            @endif
                                            @endif
                                        </h4>
                                    </div>
                                    @endif

                                </div>

                                <div class="submit text-center">
                                    <h4 class="title text-center">All articles
                                        @if(!Auth::guest())
                                        @if(Auth::user()->id == $user->id)
                                        <a href="{{route('articles.create')}}" class="text-info"> Add</a> new article
                                        @endif
                                        @endif
                                    </h4>
                                </div>
                                <div class="row collections">
                                    @if(count($articles) > 0)
                                    @foreach($articles as $article)
                                    <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url(&apos;')">
                                            <a href="#pablo"></a>
                                            <div class="card-body">


                                                @foreach($article->categories as $category)
                                                <a href="{{ route('topic.category', ['slug' => $category->slug ]) }}">
                                                    @foreach($article->colors as $color)
                                                    <span class="badge badge-{!! $color->slug !!} badge-pill">
                                                        {{ $category->name }}
                                                </span>
                                                    @endforeach
                                                </a>
                                                @endforeach
                                                <br>
                                                @if(!Auth::guest())
                                                @if(Auth::user()->id == $article->user->id)
                                                <label class="badge card-title">
                                                    {!! $article->status? '<span style="color: #55B559">Article posted</span>' : '<span style="color: red">Event non posted</span>' !!}
                                                </label>
                                                @endif
                                                @endif
                                                <br>
                                                <div class="stats text-center">
                                                    @if(!Auth::guest())
                                                    @if(Auth::user()->id == $article->user->id)
                                                    <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" title="Edit your article">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    @endif
                                                    @endif
                                                    <a href="{{ route('topic.articles',$article->slug) }}" class="btn btn-info btn-just-icon btn-fill btn-round" target="_blank" title="View your article">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    @if(!Auth::guest())
                                                    @if(Auth::user()->id == $article->user->id)
                                                    <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#deleteArticle" data-artid="{{ $article->id }}" data-placement="bottom" title="Delete your article" >
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    @endif
                                                    @endif
                                                    <br>
                                                    <br>
                                                </div>

                                                @foreach($article->colors as $color)
                                                <label class="badge badge-{!! $color->slug !!}">{!! $article->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</label>
                                                @endforeach
                                                <a href=" ">
                                                    <h6 class="card-title"> {{ str_limit($article->title, 40,'[...]') }}</h6>
                                                </a>
                                                <br>
                                                <span class="text-white">
                                                    {!! htmlspecialchars_decode(str_limit($article->summary, 103,'')) !!}<a href="{{ route('topic.articles',$article->slug) }}" class="text-white" target="_blank">[...]</a>
                                                 </span>

                                                <br>
                                                <br>
                                                <div class="card-stats text-white">
                                                    <div class="author">
                                                        <a href="#{!! $article->user->username !!}">
                                                            <img src="{{ url($article->user->avatar)  }}" alt="{!! $article->user->username !!}" class="avatar img-raised">
                                                        </a>
                                                    </div>
                                                    <div class="stats ml-auto">
                                                        @foreach($article->colors as $color)
                                                        <i class="material-icons text-{!! $color->slug !!}">visibility</i>{{ Counter::showAndCount('article', $article->id) }} {{ str_plural('vue', $article->articles_count) }} &#xB7;
                                                        <i class="material-icons text-{!! $color->slug !!}">forum</i> {{ $article->comments()->count() }}
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="submit text-center">
                                        <h4 class="title text-center">Don't have articles !
                                            @if(!Auth::guest())
                                            @if(Auth::user()->id == $user->id)
                                            <a href="{{route('articles.create')}}" class="text-info"> create</a> now
                                            @endif
                                            @endif
                                        </h4>
                                    </div>
                                    @endif

                                </div>






                            </div>

                            <div class="col-md-2 mr-auto ml-auto stats">
                                <h4 class="title">Stats</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('/@{username}/followings',$user->username) }}" class="text-dark">
                                            <b>{{ $user->followings()->get()->count() }}</b> {{ str_plural('Abonnement', $user->followings->count()) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('/@{username}/followers',$user->username) }}" class="text-dark">
                                            <b>{{ $user->followers()->get()->count() }}</b> {{ str_plural('Abonné', $user->followers->count()) }}
                                        </a>
                                    </li>

                                    @if(count($events) > 0)
                                    <li>
                                        <b>{{ $event->user->events_count }}</b> {{ str_plural('Event', $event->user->events_count) }}
                                    </li>
                                    @endif
                                    @if(count($articles) > 0)
                                    <li>
                                        <b>{{ $article->user->articles_count }}</b> {{ str_plural('Article', $article->user->articles_count) }}
                                    </li>
                                    @endif
                                    <li>
                                        <b>4</b> Collections</li>
                                    <li>
                                        <b>331</b> Influencers</li>
                                    <li>
                                        <b>1.2K</b> Likes
                                    </li>
                                </ul>
                                <hr>
                                <h4 class="title">About his Work</h4>
                                <p class="description">French luxury footwear and fashion. The footwear has incorporated shiny, red-lacquered soles that have become his signature.</p>


                                <!-- Categories -->
                                @if(count($articles) > 0)
                                <hr>
                                <h4 class="title">{{ str_plural('All your category', $article->user->categories_count) }}</h4>
                                @foreach($articles as $article)

                                @foreach($article->categories as $category)
                                <a href="{{ route('topic.category', ['slug' => $category->slug ]) }}">
                                    @foreach($article->colors as $color)
                                    <span class="badge badge-{!! $color->slug !!}">
                                      {{ $category->name }}
                                    </span>
                                    @endforeach
                                </a>
                                @endforeach

                                @endforeach

                                @endif
                                <!-- End -->

                                <!-- Tags -->
                                @if(count($articles) > 0)
                                <hr>
                                <h4 class="title">{{ str_plural('All your tag', $article->user->tags_count) }}</h4>
                                @foreach($articles as $article)
                                @foreach($article->Tags as $tag)
                                <a href="{{ route('topic.tag', ['slug' => $tag->slug ]) }}">
                                    @foreach($article->colors as $color)
                                    <span class="badge badge-{!! $color->slug !!}">
                                      {{ $tag->name }}
                                    </span>
                                    @endforeach
                                </a>
                                @endforeach
                                @endforeach
                                @endif
                                <!-- End -->


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('inc._footer')
@include('inc.login_modal')
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('events.destroy', 'slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">

                    Are you sure you want to delete this Event?
                    <input type="hidden" name="event_id" id="cat_id" value=" ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="deleteArticle" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('articles.destroy', 'slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">

                    Are you sure you want to delete this Article?
                    <input type="hidden" name="article_id" id="art_id" value=" ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

    //Follow and following
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
                        reference.find("strong").text("{{ $user->followers()->get()->count() }} Suivre");
                    }else{
                        reference.find("strong").text("{{ $user->followers()->get()->count() }} Ne plus suivre");
                    }
                }
            });
        });
    });

    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)

        modal.find('.modal-body #cat_id').val(cat_id);

    })
    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)

        modal.find('.modal-body #cat_id').val(cat_id);

    })

    //Delete article modal
    $('#deleteArticle').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var art_id = button.data('artid')
        var modal = $(this)

        modal.find('.modal-body #art_id').val(art_id);

    })
    $('#deleteArticle').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var art_id = button.data('artid')
        var modal = $(this)

        modal.find('.modal-body #art_id').val(art_id);

    })
</script>

@endsection
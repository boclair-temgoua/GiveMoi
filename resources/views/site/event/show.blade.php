@extends('inc.app')
<?php $titleTag = htmlspecialchars($event->title); ?>
@section('title',"| $titleTag" )

@section('style')
<link rel="stylesheet" href="/assets/css/plugins/zoom.css">



@endsection
@section('navbar')

@foreach($event->colors as $color)
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{!! $color->slug !!}" color-on-scroll="100" id="sectionsNav">
@endforeach

@endsection
@section('content')
        <div class="blog-post ">

            <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{ url('assets/img/event/' .$event->cover_image) }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h3 class="title">{!! $event->title !!}</h3>
                            <a href="{{ route('events') }}" class="btn btn-rose btn-round ">
                                <i class="material-icons">arrow_back_ios</i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="main main-raised">
            <div class="container">
                @if(!Auth::guest())
                @if(Auth::user()->id == $event->user_id)
                <a href="{{ route('events.edit',$event->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit your event" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" >
                    <i class="material-icons">edit</i>
                </a>
                @endif
                @endif








                <a href="#pablo" class="btn btn-danger btn-link float-right">
                    <i class="material-icons">favorite</i> 243
                </a>

                <div class="section section-text">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{ url($event->user->avatar)  }}">
                                        </a>
                                        <div class="ripple-container"></div>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h4 class="card-title text-left">
                                        <a href="{{ route('/', $event->user->username) }}">
                                            {{ $event->user->name }}
                                        </a>
                                        <small>&#xB7; {!! $event->user->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</small>
                                    </h4>
                                    <p class="description text-left">{{ $event->user->body}}</p>
                                </div>
                                <div class="col-md-2">



                                    @if(Auth::guest())
                                    <button class="btn btn-{!! $color->slug !!} btn-round follow" data-toggle="modal" data-target="#loginModal">
                                        <strong>
                                            Suivre
                                        </strong>
                                    </button>
                                    @else
                                    @if(Auth::check())
                                    <button class="btn btn-{!! $color->slug !!} btn-round follow"  data-id="{{ $event->user->id }}">
                                        <strong>
                                            @if(auth()->user()->isFollowing($event->user))
                                            Ne plus suivre
                                            @else
                                            Suivre
                                            @endif
                                        </strong>
                                    </button>
                                    @endif
                                    @endguest


                                </div>
                            </div>
                        </div>
                    </div>



                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <h2 class="title">{{ $event->title }}</h2>
                                <p>{{ $event->summary }}</p>
                            </div>
                        </div>

                        <div class="section col-md-12 ml-auto mr-auto text-center">
                            <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src="{{ url('assets/img/event/' .$event->cover_image) }}">
                        </div>

                        <div class="col-md-10 ml-auto mr-auto">
                            {!! \Michelf\Markdown::defaultTransform($event->body) !!}
                        </div>

                </div>
                <div class="section section-blog-info">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-tags">



                                        @if(count($event->categories ) > 0)
                                        @foreach($event->categories as $category)
                                        <a href="{{ route('topic.category', $category->slug) }}">
                                            @foreach($event->colors as $color)
                                            <span class="badge badge-{!! $color->slug !!} badge-pill">
                                            {{ $category->name }}
                                        </span>
                                            @endforeach
                                        </a>
                                        @endforeach
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="card-avatar">
                                            <a href="#pablo">
                                                <img class="img" src="{{ url($event->user->avatar)  }}">
                                            </a>
                                            <div class="ripple-container"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="card-title">
                                            <a href="{{ route('/', $event->user->username) }}">
                                                {{ $event->user->name }}
                                            </a>
                                            <small>&#xB7; {!! $event->user->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</small>
                                        </h4>
                                        <p class="description">{{ $event->user->body}}</p>
                                    </div>
                                    <div class="col-md-2">

                                        @if(Auth::guest())
                                        <button class="btn btn-{!! $color->slug !!} btn-round follow" data-toggle="modal" data-target="#loginModal">
                                            <strong>
                                                Suivre
                                            </strong>
                                        </button>
                                        @else
                                        @if(Auth::check())
                                        <button class="btn btn-{!! $color->slug !!} btn-round follow"  data-id="{{ $event->user->id }}">
                                            <strong>
                                                @if(auth()->user()->isFollowing($event->user))
                                                Ne plus suivre
                                                @else
                                                Suivre
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

                <!--- Init comment Post -->
                <div class="section section-comments">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="media-area">


                                <h3 class="title text-center">{{$event->comments->count()}} {{ str_plural('comment', $event->comments->count()) }}</h3>
                                @forelse ($event->comments as $comment)
                                <div class="media">
                                    <a class="float-left" href="{{ route('/', $comment->user->username) }}">
                                        <div class="avatar">
                                            <img class="media-object" src="{{ url($comment->user->avatar)  }}" alt="...">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="{{ route('/', $comment->user->username) }}" class="text-{!! $color->slug !!}">
                                                {{ $comment->user->username }}
                                            </a>
                                            <small>&#xB7; {!! $comment->created_at->diffForHumans() !!}</small>
                                        </h4>
                                        <h6 class="text-muted"></h6>

                                       {!! \Michelf\Markdown::defaultTransform($comment->comment) !!}




                                        <div class="media-footer">


                                            @if(!Auth::guest())
                                            @if(Auth::user()->id == $comment->user_id)
                                            <a href="#pablo" class="btn btn-danger btn-link float-right"  data-toggle="modal" data-target="#delete" data-catid="{{ $comment->id }}" data-placement="bottom" title="Delete your event">
                                                <i class="material-icons">delete</i> delete
                                            </a>
                                            @endif
                                            @endif


                                            <!-- how many users like this comment -->




                                            <a href="#pablo" class="btn btn-{!! $color->slug !!} btn-link float-right" rel="tooltip"  data-placement="bottom"  title="Reply to Comment">
                                                <i class="material-icons">reply</i> Reply
                                            </a>

                                        </div>

                                    </div>
                                </div>
                                @empty
                                <h3 class="text-center">
                                    <h4 class="title text-center">Post the first comment</h4>
                                </h3>
                                @endforelse
                            </div>




                            @guest
                            <h3 class="text-center">
                               <h4 class="title text-center">Please
                                   <a href="{{ route('login') }}" class="text-info" data-toggle="modal" data-target="#loginModal">sign in</a> or
                                   <a href="" class="text-info">Create an account</a> to leave a comment
                               </h4>
                            </h3>
                            @else

                     <!-- End Post comment -->
                    <!--init create comment create -->

                            @include('site.comment.form')

                            @endguest
                    <!-- End create comment -->


                            <!-- end media-post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Init delete -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('comments.destroy', '$comment->id') }}" method="post" accept-charset="UTF-8">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-body">

                        Are you sure you want to delete Your comment?
                        <input type="hidden" name="comment_id" id="cat_id" value=" ">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- End -->
@include('inc._footer')


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">

                        <div class="card-header card-header-{!! $color->slug !!} text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            <h4 class="card-title">Connexion</h4>
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-google btn-round"  data-placement="bottom" data-container="body">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-twitter btn-round"  data-placement="bottom" data-container="body">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-facebook btn-round"  data-placement="bottom" data-container="body">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('login')}}" accept-charset="UTF-8" method="POST">
                            @csrf
                            <p class="description text-center">Ou </p>
                            <div class="card-body">
                                <div class="form-group{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}" id="username" name="username" placeholder="Email or Pseudo"  value="{{ old('username') }}" required autofocus>
                                        @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>

                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password..." name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <a class="text-{!! $color->slug !!}" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" checked="checked"
                                               name="remember" {{ old('remember') ? 'checked' : '' }} > {{ __('Restez connecte') }}
                                        <span class="form-check-sign">
                                                   <span class="check"></span>
                                            </span>
                                    </label>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <button class="btn btn-{!! $color->slug !!} btn-raised" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                          </span>
                                    Connexion
                                </button>
                            </div>
                            <div class="text-left">
                                <span>Nouveau chez <b>{{ config('app.name') }}?</b> </span>
                                <a class="text-info" href="{{ route('register') }}">{{ __('Inscris toi ici') }}</a>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    @endsection
@section('scripts')


    <script>
        $(document).ready(function () {
            // moved AjaxSetup here
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=csrf-token"]').attr('content')}
            });
            $('.send').click(function () {
                $('form').submit(function (e) {
                    // e.preventDefault(); in correct function
                    e.preventDefault();
                    var formdata = $(this).serialize();
                    $.ajax({
                        url: '/comments',
                        type: "POST",
                        data: {
                            // you didn't use your 'var formdata'
                            formdata: formdata,
                            'csrf-token"': $('input[name=csrf-token"]').val()
                        },
                        success: function (response) {
                            alert('works');
                        }
                    });
                });
            });
        });
    </script>







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
                            reference.find("strong").text("Suivre");
                        }else{
                            reference.find("strong").text("Ne plus suivre");
                        }
                    }
                });
            });
        });
    </script>


    <script type="text/javascript">

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
    </script>


@endsection


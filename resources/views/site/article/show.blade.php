@extends('inc.app')
<?php $titleTag = htmlspecialchars($article->title); ?>
@section('title',"- $titleTag" )

@section('style')
<link rel="stylesheet" href="/assets/css/plugins/zoom.css">



@endsection
@section('navbar')

@foreach($article->colors as $color)
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{!! $color->slug !!}" color-on-scroll="100" id="sectionsNav">
    @endforeach

    @endsection
    @section('content')
    <div class="blog-post ">

        <div class="page-header header-filter header-small" data-parallax="true"  style="background-image: url(&apos;{{ url('assets/img/event/' .$article->cover_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h3 class="title">{!! $article->title !!}</h3>
                        <a href="{{ route('articles') }}" class="btn btn-rose btn-round ">
                            <i class="material-icons">arrow_back_ios</i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                @if(!Auth::guest())
                @if(Auth::user()->id == $article->user_id)
                <a href="{{ route('articles.edit',$article->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit your event" class="btn btn-link  btn-success btn-round btn-just-icon " >
                    <i class="material-icons">edit</i>
                </a>

                <button type="button" class="btn btn-link  btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#deleteArticle" data-artid="{{ $article->id }}" data-placement="bottom" title="Delete your article" >
                    <i class="material-icons">delete</i>
                </button>
                @endif
                @endif









                @foreach($article->colors as $color)
                <a href="#" class="btn btn-{!! $color->slug !!} btn-link float-right">
                    <i class="material-icons">visibility</i> {{ Counter::showAndCount('article', $article->slug) }} {{ str_plural('red', $article->articles_count) }}
                </a>
                @endforeach


                <div class="section section-text">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="{{ route('/', $article->user->username) }}">
                                            <img class="img" src="{{ url($article->user->avatar)  }}">
                                        </a>
                                        <div class="ripple-container"></div>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h4 class="card-title text-left">
                                        <a href="{{ route('/', $article->user->username) }}">
                                            {{ $article->user->name }}
                                        </a>
                                        <small>&#xB7; {!! $article->user->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</small>
                                    </h4>
                                    <p class="description text-left">{{ $article->user->body}}</p>
                                </div>
                                <div class="col-md-2">






                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto">
                            <h2 class="title">{{ $article->title }}</h2>
                            <p>{{ $article->summary }}</p>
                        </div>
                    </div>

                    <div class="section col-md-12 ml-auto mr-auto text-center">
                        <img class="img-raised rounded img-fluid" data-action="zoom" alt="Raised Image" src=" ">
                    </div>

                    <div class="col-md-10 ml-auto mr-auto">
                        {!! \Michelf\Markdown::defaultTransform($article->body) !!}
                    </div>

                </div>
                <div class="section section-blog-info">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-tags">



                                        @if(count($article->tags ) > 0)
                                        @foreach($article->tags as $tag)
                                        <a href="{{ route('topic.tag', ['slug' => $tag->slug ]) }}">
                                            @foreach($article->colors as $color)
                                            <span class="badge badge-{!! $color->slug !!} badge-pill">
                                            {{ $tag->name }}
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
                                            <a href="{{ route('/', $article->user->username) }}">
                                                <img class="img" src="{{ url($article->user->avatar)  }}">
                                            </a>
                                            <div class="ripple-container"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="card-title">
                                            <a href="{{ route('/', $article->user->username) }}">
                                                {{ $article->user->name }}
                                            </a>
                                            <small>&#xB7; {!! $article->user->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</small>
                                        </h4>
                                        <p class="description">{{ $article->user->body}}</p>
                                    </div>
                                    <div class="col-md-2">



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
                                <h3 class="title text-center">3 Comments</h3>
                                <div class="media">
                                    <a class="float-left" href="#pablo">
                                        <div class="avatar">
                                            <img class="media-object" src="/assets/img/faces/card-profile4-square.jpg" alt="...">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Tina Andrew
                                            <small>&#xB7; 7 minutes ago</small>
                                        </h4>
                                        <h6 class="text-muted"></h6>
                                        <p>Chance too good. God level bars. I&apos;m so proud of @LifeOfDesiigner #1 song in the country. Panda! Don&apos;t be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>
                                        <div class="media-footer">
                                            <a href="#pablo" class="btn btn-primary btn-link float-right" rel="tooltip" title="Reply to Comment">
                                                <i class="material-icons">reply</i> Reply
                                            </a>
                                            <a href="#pablo" class="btn btn-danger btn-link float-right">
                                                <i class="material-icons">favorite</i> 243
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="float-left" href="#pablo">
                                        <div class="avatar">
                                            <img class="media-object" alt="Tim Picture" src="/assets/img/faces/card-profile1-square.jpg">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Camber
                                            <small>&#xB7; Yesterday</small>
                                        </h4>
                                        <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                        <p> Don&apos;t forget, You&apos;re Awesome!</p>
                                        <div class="media-footer">
                                            <a href="#pablo" class="btn btn-primary btn-link float-right" rel="tooltip" title="Reply to Comment">
                                                <i class="material-icons">reply</i> Reply
                                            </a>
                                            <a href="#pablo" class="btn btn-link float-right">
                                                <i class="material-icons">favorite</i> 25
                                            </a>
                                        </div>
                                        <div class="media">
                                            <a class="float-left" href="#pablo">
                                                <div class="avatar">
                                                    <img class="media-object" alt="64x64" src="/assets/img/faces/card-profile4-square.jpg">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Tina Andrew
                                                    <small>&#xB7; 12 Hours Ago</small>
                                                </h4>
                                                <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                                <p> Don&apos;t forget, You&apos;re Awesome!</p>
                                                <div class="media-footer">
                                                    <a href="#pablo" class="btn btn-primary btn-link float-right" rel="tooltip" title="Reply to Comment">
                                                        <i class="material-icons">reply</i> Reply
                                                    </a>
                                                    <a href="#pablo" class="btn btn-link btn-secondary float-right">
                                                        <i class="material-icons">favorite</i> 2
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="title text-center">Post your comment</h3>
                            <div class="media media-post">
                                <a class="author float-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" alt="64x64" src="/assets/img/faces/card-profile6-square.jpg">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <div class="form-group label-floating bmd-form-group">
                                        <label class="form-control-label bmd-label-floating" for="exampleBlogPost"> Write some nice stuff or nothing...</label>
                                        <textarea class="form-control" rows="5" id="exampleBlogPost"></textarea>
                                    </div>
                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-round btn-wd float-right">Post Comment</a>
                                    </div>
                                </div>
                            </div>
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








    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-center">Similar Stories</h2>
                    <br>
                    <div class="row">
                        @if(count($articles) > 0)
                        @foreach($articles as $item)
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="img img-raised" src="/assets/img/examples/blog6.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
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
                                        <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                                    </h4>
                                    <p class="card-description">
                                        Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                        <a href="#pablo"> Read More </a>
                                    </p>
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
@include('inc._footer')




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
        //script delete article Modal

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


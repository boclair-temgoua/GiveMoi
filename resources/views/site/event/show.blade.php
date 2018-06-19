
@extends('inc.app')
@section('title',' Event' )

@section('style')

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
            <a href="{{ route('events.edit',$event->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit your event" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" ><i class="material-icons">edit</i></a>
                @endif
            @endif



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
                                <h4 class="card-title text-left">{{ $event->user->name }}</h4>
                                <p class="description">{{ $event->user->body}}</p>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-rose pull-right btn-round">Follow</button>
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
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ url('assets/img/event/' .$event->cover_image) }}">
                    </div>

                    <div class="col-md-10 ml-auto mr-auto">
                        {!! htmlspecialchars_decode($event->body) !!}
                    </div>

            </div>
            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">
                                    Tags:

                                    <span class="badge badge-primary badge-pill"> {!! ($event->tag)? $event->tag:'-' !!}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-tags">
                                    @if(count($event->categories ) > 0)


                                    @foreach($event->categories as $category)
                                    <a href="{{ route('topic.category', $category->slug) }}"><span class="badge badge-success badge-pill"> {{ $category->name}}</span></a>
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
                                    <h4 class="card-title">{{ $event->user->name }}</h4>
                                    <p class="description">{{ $event->user->body }}</p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default pull-right btn-round">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="comments">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="media-area">
                            <h3 class="title text-center">10 Comments</h3>
                            <div class="media">
                                <a class="float-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" src="/assets/img/kit/pro/faces/avatar.jpg" alt="...">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Tina Andrew
                                        <small>&#xB7; 7 minutes ago</small>
                                    </h4>
                                    <p>Chance too good. God level bars. I&apos;m so proud of @LifeOfDesiigner #1 song in the country. Panda! Don&apos;t be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>
                                    <p>All praises and blessings to the families of people who never gave up on dreams. Don&apos;t forget, You&apos;re Awesome!</p>
                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-link float-right" rel="tooltip" title="Reply to Comment">
                                            <i class="material-icons">reply</i> Reply
                                        </a>
                                        <a href="#pablo" class="btn btn-danger btn-link float-right">
                                            <i class="material-icons">favorite</i> 243
                                        </a>
                                    </div>
                                    <div class="media media-post">
                                        <a class="author float-left" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object" alt="64x64" src="/assets/img/kit/pro/faces/kendall.jpg">
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <textarea class="form-control" placeholder="Write a nice reply or go home..." rows="4"></textarea>
                                            <div class="media-footer">
                                                <a href="#pablo" class="btn btn-primary float-right">
                                                    <i class="material-icons">reply</i> Reply
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <a class="float-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" alt="Tim Picture" src="/assets/img/kit/pro/faces/marc.jpg">
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
                                        <a href="#pablo" class="btn btn-link btn-secondary float-right">
                                            <i class="material-icons">favorite</i> 25
                                        </a>
                                    </div>
                                    <div class="media">
                                        <a class="float-left" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object" alt="64x64" src="/assets/img/kit/pro/faces/avatar.jpg">
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Tina Andrew
                                                <small>&#xB7; 2 Days Ago</small>
                                            </h4>
                                            <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                            <p> Don&apos;t forget, You&apos;re Awesome!</p>
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
                                </div>
                            </div>
                            <div class="media">
                                <a class="float-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" alt="64x64" src="/assets/img/kit/pro/faces/kendall.jpg">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Rosa Thompson
                                        <small>&#xB7; 2 Days Ago</small>
                                    </h4>
                                    <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                    <p> Don&apos;t forget, You&apos;re Awesome!</p>
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
                            <div class="pagination-area">
                                <ul class="pagination justify-content-center text-center">
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">&#xAB;</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">2</a>
                                    </li>
                                    <li class="active page-item">
                                        <a href="#pablo" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link">&#xBB;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="text-center">Post your comment
                            <br>
                            <small>- Logged In User -</small>
                        </h3>
                        <div class="media media-post">
                            <a class="author float-left" href="#pablo">
                                <div class="avatar">
                                    <img class="media-object" alt="64x64" src="/assets/img/kit/pro/faces/avatar.jpg">
                                </div>
                            </a>
                            <div class="media-body">
                                <textarea class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                                <div class="media-footer">
                                    <a href="#pablo" class="btn btn-primary btn-wd float-right">Post Comment</a>
                                </div>
                            </div>
                        </div>
                        <!-- end media-post -->
                        <h3 class="text-center">Post your comment
                            <br>
                            <small>- Not Logged In User -</small>
                        </h3>
                        <div class="media media-post">
                            <a class="author float-left" href="#pablo">
                                <div class="avatar">
                                    <img class="media-object" alt="64x64" src="/assets/img/kit/pro/placeholder.jpg">
                                </div>
                            </a>
                            <div class="media-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Your email">
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                                    <div class="media-footer">
                                        <h6>Sign in with</h6>
                                        <a href="" class="btn btn-just-icon btn-round btn-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="" class="btn btn-just-icon btn-round btn-facebook">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="" class="btn btn-just-icon btn-round btn-google">
                                            <i class="fab fa-google-plus-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-primary float-right">Post Comment</a>
                                    </div>
                                </form>
                            </div>
                            <!-- end media-body -->
                        </div>
                        <!-- end media-post -->
                    </div>
                </div>
            </div>
            <div id="comments">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">

                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://givemoi.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                    </div>
                </div>
            </div>





            <!--

            <div class="section section-comments">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="media-area">
                            <h3 class="title text-center">3 Comments</h3>
                            <div class="media">
                                <a class="float-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" src="../assets/img/kit/pro/faces/card-profile4-square.jpg" alt="...">
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
                                        <img class="media-object" alt="Tim Picture" src="../assets/img/kit/pro/faces/card-profile1-square.jpg">
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
                                                <img class="media-object" alt="64x64" src="../assets/img/kit/pro/faces/card-profile4-square.jpg">
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
                                    <img class="media-object" alt="64x64" src="../assets/img/kit/pro/faces/card-profile6-square.jpg">
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


                    </div>
                </div>
            </div>
            -->
        </div>
    </div>




    <!--
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-center">Similar Stories</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="img img-raised" src="../assets/img/kit/pro/examples/blog6.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Enterprise</h6>
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
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="img img-raised" src="../assets/img/kit/pro/examples/blog8.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-success">
                                        Startups
                                    </h6>
                                    <h4 class="card-title">
                                        <a href="#pablo">Lyft launching cross-platform service this week</a>
                                    </h4>
                                    <p class="card-description">
                                        Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                        <a href="#pablo"> Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="img img-raised" src="../assets/img/kit/pro/examples/blog7.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-danger">
                                        <i class="material-icons">trending_up</i> Enterprise
                                    </h6>
                                    <h4 class="card-title">
                                        <a href="#pablo">6 insights into the French Fashion landscape</a>
                                    </h4>
                                    <p class="card-description">
                                        Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                        <a href="#pablo"> Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->



@include('inc._footer')
@endsection
@section('scripts')



@endsection


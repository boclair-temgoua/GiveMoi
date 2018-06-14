
@extends('inc.app')
@section('title','Blog' )

@section('style')

@endsection
@section('content')
<div class="blog-post ">

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/material-kit/bg2.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{!! $event->title !!}</h1>
                    <a href="{{ route('events.index') }}" class="btn btn-rose btn-round btn-lg">
                        <i class="material-icons">arrow_back_ios</i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">

            <a href="{{ route('events.edit',$event->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit your event" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" ><i class="material-icons">edit</i></a>
            <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#delete" data-catid="{{ $event->id }}" data-placement="bottom" title="Delete your event" >
                <i class="material-icons">delete</i>
            </button>
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">


                    </div>
                </div>
            </div>

            {!! $event->body !!}
            <hr>
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


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('events.destroy',$event->id) }}" method="post" accept-charset="UTF-8">
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
@include('inc._footer')
@endsection
@section('scripts')


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


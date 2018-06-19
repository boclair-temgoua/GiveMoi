@extends('inc.app')

@section('style')

@endsection
@section('content')
<div class="blog-posts">
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;../assets/img/kit/pro/bg10.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">A Place for Entrepreneurs to Share and Discover New Stories</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">

                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <ul class="nav nav-pills nav-pills-primary">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pill1" data-toggle="tab">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill2" >World</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill3" >Arts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill3" data-toggle="tab">Tech</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill3" data-toggle="tab">Business</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="pill1"></div>
                            <div class="tab-pane" id="pill2"></div>
                            <div class="tab-pane" id="pill3"></div>
                            <div class="tab-pane" id="pill4"></div>
                        </div>
                    </div>

            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="card card-raised card-background" style="background-image: url('../assets/img/kit/pro/examples/office2.jpg')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Worlds</h6>
                            <a href="#pablo">
                                <h3 class="card-title">The Best Productivity Apps on Market</h3>
                            </a>
                            <span class="card-title">
                                 <p >
                                     Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                 </p>
                            </span>
                            <a href="#pablo" class="btn btn-white btn-link">
                                <i class="material-icons">face</i> Boclair Temgoua
                            </a>
                            <a href="#pablo" class="btn btn-white btn-link">
                                <i class="material-icons">watch_later</i> 2 min ago
                            </a>
                            <a href="#pablo" class="btn btn-danger btn-round">
                                <i class="material-icons">format_align_left</i> Read Article
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-raised card-background" style="background-image: url('../assets/img/kit/pro/examples/blog8.jpg')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Business</h6>
                            <a href="#pablo">
                                <h3 class="card-title">The Best Productivity Apps on Market</h3>
                            </a>
                            <br>
                            <span class="text-white">
                               <p >
                                   Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                               </p>
                            </span>
                            <br>
                            <h6 class="card-category text-info">Lieu: Douala Cameroun</h6>
                            <a href="#pablo" class="btn btn-white btn-link">
                                <i class="material-icons">face</i> Boclair Temgoua
                            </a>
                            <div class="card-stats">
                                <div class="author">
                                    <a href="#pablo" class="text-white">
                                        <img src="assets/img/kit/pro/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                        <span>Zegue Temgoua </span>
                                    </a>
                                </div>
                                <div class="stats ml-auto text-white">
                                    <i class="material-icons">watch_later</i> 15 Mai
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-raised card-background" style="background-image: url('../assets/img/kit/pro/examples/office2.jpg')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Worlds</h6>
                            <a href="#pablo">
                                <h3 class="card-title">The Best Productivity Apps on Market</h3>
                            </a>
                            <span class="card-title">
                                        <p >
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round">
                                <i class="material-icons">format_align_left</i> Read Article
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-raised card-background" style="background-image: url('../assets/img/kit/pro/examples/blog8.jpg')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Business</h6>
                            <h3 class="card-title">Working on Wallstreet is Not So Easy</h3>
                            <span class="card-title">
                                        <p >
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                            </span>
                            <a href="#pablo" class="btn btn-primary btn-round">
                                <i class="material-icons">format_align_left</i> Read Article
                            </a>
                        </div>
                    </div>
                </div>

            </div>
                <div class="card-body">
                    <div class="toolbar">
                        <div class="submit text-center">

                            <div class="pagination-area">
                                <ul class="pagination justify-content-center text-center">
                                    <li class="page-item">
                                        <a href="#pablo" class="page-link"><i class="material-icons">arrow_back</i> Previous</a>
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
                                        <a href="#pablo" class="page-link">Next <i class="material-icons">arrow_forward</i></a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                </div>
        </div>

    </div>
  </div>
</div>
<footer class="footer ">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
    </div>
</footer>
@endsection

@section('script')

@endsection
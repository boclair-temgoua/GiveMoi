@extends('inc.app')

@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="profile-page sidebar-collapse">

        <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile">







                                <div class="avatar">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                        <div class="fileinput-new  img-circle ">
                                            <img  style="border-radius: 50%;" src="./assets/img/placeholder.jpg" alt="...">
                                        </div>

                                        <div style="border-radius: 50%; border: 3px solid black" class="fileinput-preview fileinput-exists  img-circle ">


                                        </div>

                                        <span class="btn btn-raised btn-round btn-default btn-file">
                                            <span class="fileinput-new">Add Photo</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="..." />
                                          </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>

                                    </div>
                                </div>






                                <div class="name">
                                    <h3 class="title">Christian Louboutin</h3>
                                    <h6>Designer</h6>
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="description text-center">
                        <p>An artist of considerable range, Chet Faker &#x2014; the name taken by Melbourne-raised, Brooklyn-based Nick Murphy &#x2014; writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile-tabs">
                                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                            <i class="material-icons">camera</i> Studio
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                            <i class="material-icons">palette</i> Work
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                            <i class="material-icons">favorite</i> Favorite
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active text-center gallery" id="studio">
                            <div class="row">
                                <div class="col-md-3 ml-auto">
                                    <img src="../assets/img/examples/studio-1.jpg" class="rounded">
                                    <img src="../assets/img/examples/studio-2.jpg" class="rounded">
                                </div>
                                <div class="col-md-3 mr-auto">
                                    <img src="../assets/img/examples/studio-5.jpg" class="rounded">
                                    <img src="../assets/img/examples/studio-4.jpg" class="rounded">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center gallery" id="works">
                            <div class="row">
                                <div class="col-md-3 ml-auto">
                                    <img src="../assets/img/examples/olu-eletu.jpg" class="rounded">
                                    <img src="../assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                                    <img src="../assets/img/examples/cynthia-del-rio.jpg" class="rounded">
                                </div>
                                <div class="col-md-3 mr-auto">
                                    <img src="../assets/img/examples/mariya-georgieva.jpg" class="rounded">
                                    <img src="../assets/img/examples/clem-onojegaw.jpg" class="rounded">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center gallery" id="favorite">
                            <div class="row">
                                <div class="col-md-3 ml-auto">
                                    <img src="../assets/img/examples/mariya-georgieva.jpg" class="rounded">
                                    <img src="../assets/img/examples/studio-3.jpg" class="rounded">
                                </div>
                                <div class="col-md-3 mr-auto">
                                    <img src="../assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                                    <img src="../assets/img/examples/olu-eletu.jpg" class="rounded">
                                    <img src="../assets/img/examples/studio-1.jpg" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('inc._footer')
    </div>

@endsection

@section('scripts')

@endsection
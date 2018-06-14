@extends('inc.main_account')

@section('style')

@endsection
@section('content')
<div  class="profile-page ">
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/kit/pro/bg3.jpg');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="/assets/img/kit/pro/faces/christian.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">Christian Louboutin</h3>
                                <h6>Designer</h6>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fab fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="follow">
                            <button class="btn btn-fab btn-primary btn-round" rel="tooltip" title="Follow this user">
                                <i class="material-icons">settings</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>An artist of considerable range, Chet Faker &#x2014; the name taken by Melbourne-raised, Brooklyn-based Nick Murphy &#x2014; writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center nav-pills-danger" role="tablist">
                                <!--
                      color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                  -->
                                <li class="nav-item">
                                    <a class="nav-link " href="#work" >
                                        <i class="material-icons">speaker_group</i> Evenements
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#work" >
                                        <i class="material-icons">folder_open</i> Posts Articles
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <br>
                <div class="card-body">
                    <div class="toolbar">
                        <div class="submit text-center">
                            <a href="{{route('events.create')}}" class="btn btn-rose btn-raised btn-round">Creeer un Evenement</a>
                        </div>
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                </div>


                <div class="tab-content tab-space">
                    @if(count($events) > 0)
                    <div class="submit text-center">
                        <a href="{{route('events.create')}}" class="btn btn-rose btn-raised btn-round">Create new event</a>
                    </div>
                    <div class="row">


                              @foreach($events as $event)
                        <div class="col-md-6 col-lg-4">
                            <div class="rotating-card-container manual-flip">
                                <div class="card card-rotate">
                                    <div class="front front-background" style="background-image: url('/assets/img/kit/pro/examples/card-blog6.jpg');">
                                        <div class="card-body">
                                            <h6 class="card-category">Full Background Card</h6>
                                            <a href="#pablo">
                                                <h3 class="card-title">{{$event->title}}</h3>
                                            </a>
                                            <p class="card-description text-white">
                                                {!! htmlspecialchars_decode(str_limit($event->body, 100,'...')) !!}
                                            </p>
                                            <div class="stats text-center">
                                                <button type="button" name="button" class="btn btn-danger btn-fill btn-round btn-rotate">
                                                    <i class="material-icons">refresh</i> Rotate...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back back-background" style="background-image: url('/assets/img/kit/pro/examples/card-blog6.jpg');">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Manage Event
                                            </h5>
                                            <p class="card-description">As an Admin, you have shortcuts to edit, view or delete the posts.</p>
                                            <div class="stats text-center">
                                                <a href="{{ route('events.show',$event->slug) }}" class="btn btn-info btn-just-icon btn-fill btn-round">
                                                    <i class="material-icons">subject</i>
                                                </a>
                                                <a href="{{ route('events.edit',$event->id) }}" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#delete" data-catid="{{ $event->id }}" data-placement="bottom" title="Delete your event" >
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <br>
                                                <br>
                                                <button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate">
                                                    <i class="material-icons">refresh</i> Back...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="name">
                            <p class="title text-center">You don't have events</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('inc._footer')
    </div>
@endsection

@section('scripts')



@endsection
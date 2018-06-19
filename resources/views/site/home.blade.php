@extends('inc.main_account')
@section('title', '| profile')

@section('style')

@endsection
@section('content')
<div  class="profile-page ">
    <div class="page-header header-filter" data-parallax="true" style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}&apos;);"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                @if(Auth::user()->avatar)
                                <img src="{{ url(Auth::user()->avatar)  }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                @endif
                            </div>
                            <div class="name">
                                <h3 class="title">{{ Auth::user()->name }}</h3>
                                <p >Member Since {{ Auth::user()->created_at->format('j F Y') }}</p>
                                <h6>{!! Auth::user()->work  !!}</h6>
                                <a href="https://facebook.com/{{ Auth::user()->fblink }}" class="btn btn-just-icon btn-link btn-facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://instagram.com/{{ Auth::user()->instalink }}" class="btn btn-just-icon btn-link btn-instagram"><i class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com/{{ Auth::user()->twlink }}" class="btn btn-just-icon btn-link btn-twitter"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="follow">
                            <a href="{{route('myaccount.profile')}}" class="btn btn-fab btn-rose btn-round" rel="tooltip" title="Edit your'are profile">
                                <i class="material-icons">settings</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{!! Auth::user()->body !!}</p>
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


                <div class="tab-content tab-space">
                    <div class="tab-pane active work" id="work">
                        <div class="row">
                            <div class="col-md-7 ml-auto mr-auto ">
                                <div class="submit text-center">
                                    <a href="{{route('events.create')}}" class="btn btn-rose btn-raised btn-round">Create new event</a>
                                </div>
                                <br>
                                @include('inc.alert')
                                <div class="row collections">
                                    @if(count($events) > 0)
                                    @foreach($events as $event)
                                    <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url(&apos;{{ asset('assets/img/event/' .$event->cover_image) }}')">
                                            <a href="#pablo"></a>
                                            <div class="card-body">


                                                <div class="stats text-center">
                                                    <a href="{{ route('topic.events',$event->slug) }}" class="btn btn-info btn-just-icon btn-fill btn-round">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="{{ route('events.edit',$event->id) }}" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#delete" data-catid="{{ $event->id }}" data-placement="bottom" title="Delete your event" >
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    <br>
                                                    <br>
                                                </div>

                                                @foreach($event->categories as $category)
                                                <label class="badge badge-{{ $event->color }}">{{ $category->name }} {!! $event->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</label>
                                                @endforeach
                                                <a href="{{ route('events.show',$event->slug) }}">
                                                    <h6 class="card-title"> {{ str_limit($event->title, 40,'...') }}</h6>
                                                </a>
                                                <br>
                                                <span class="text-white">
                                                   {!! htmlspecialchars_decode(str_limit($event->summary, 100,'...')) !!}
                                                </span>


                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="submit text-center">
                                        <h4 class="title text-center">You don't have events?<a href="{{route('events.create')}}" class="text-info"> create</a> now</h4>
                                    </div>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-2 mr-auto ml-auto stats">
                                <h4 class="title">Stats</h4>
                                <ul class="list-unstyled">
                                    @if(count($events) > 0)
                                    <li>
                                        <b>{{ $event->user->events_count }}</b> Events
                                    </li>
                                    @endif
                                    <li>
                                        <b>4</b> Collections</li>
                                    <li>
                                        <b>331</b> Influencers</li>
                                    <li>
                                        <b>1.2K</b> Likes</li>
                                </ul>
                                <hr>
                                <h4 class="title">About his Work</h4>
                                <p class="description">French luxury footwear and fashion. The footwear has incorporated shiny, red-lacquered soles that have become his signature.</p>
                                <hr>
                                <h4 class="title">Focus</h4>
                                <span class="badge badge-primary">Footwear</span>
                                <span class="badge badge-rose">Luxury</span>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

@include('inc._footer')
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
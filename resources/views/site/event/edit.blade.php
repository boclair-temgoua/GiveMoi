@extends('inc.app')

@section('style')

@endsection

@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
@endsection
@section('content')
<div  class="signup-page sidebar-collapse">
    <div class="page-header header-filter" style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <div class="col-md-12 ml-auto mr-auto text-center">
                                        <h3 class="card-title text-info">Editer l'evenement en un clic </h3>
                                        <p class="card-title">La creation de vos Evenements doivent respecter les <a href="">conditions d'utilisation</a> vu de quoi ils seront tous simplement suprimer .</p>
                                        @include('inc.alert')
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 ml-auto mr-auto">
                                    <form id="RegisterValidation" role="form" method="POST" action="{{route('events.update',$event->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label class="bmd-label-floating">{{ __('Title')}}</label>
                                            <input id="title" type="text"
                                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" value="{{ $event->title }}" >
                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                            <label class="bmd-label-floating">{{ __('Summary')}}</label>
                                            <input id="summary" type="text"
                                                   class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}"
                                                   name="summary" value="{{ $event->summary }}" >
                                            @if ($errors->has('summary'))
                                            <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('summary') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="bmd-label-floating">{{ __('Name')}}</label>
                                                    <input id="name" type="text"
                                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                           name="name" value="{{ $event->name }}" >
                                                    @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                    <label class="bmd-label-floating">{{ __('Country')}}</label>
                                                    <input id="country" type="text"
                                                           class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                           name="country" value="{{ $event->country }}">
                                                    @if ($errors->has('country'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 row-block">
                                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                    <label class="bmd-label-floating">{{ __('City')}}</label>
                                                    <input id="city" type="text"
                                                           class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                           name="city" value="{{ $event->city }}" >
                                                    @if ($errors->has('city'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 row-block">
                                                <select class="selectpicker " data-style="select-with-transition" title="Choose Color" id="" name="colors[]" data-size="7">
                                                    <option disabled>Choose color</option>
                                                    @foreach($colors as $color)
                                                    <option value="{{ $color->id }}"
                                                            @foreach ($event->colors as $eventColor)
                                                        @if ($eventColor->id == $color->id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                        >{{ $color->slug }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4  row-block">
                                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose Category" data-size="7" aria-hidden="true" name="categories[]">
                                                    <option disabled>Choose Category</option>

                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @foreach ($event->categories as $eventCategory)
                                                        @if ($eventCategory->id == $category->id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                        >{{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-4  row-block">
                                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose Tag" data-size="7" aria-hidden="true" name="tags[]">
                                                    <option disabled>Choose Category</option>

                                                    @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                            @foreach ($event->tags as $eventTag)
                                                        @if ($eventTag->id == $tag->id)
                                                        selected
                                                        @endif
                                                        @endforeach >
                                                        {{ $tag->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ml-auto mr-auto">
                                                <div class="profile text-center">
                                                    <br>

                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail img-raised">
                                                            <img src="{{ url('assets/img/event/' .$event->cover_image) }}" alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                                        <div>
                                                        <span class="btn btn-raised btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="cover_image" type="file" class="form-control" name="cover_image">
                                                        </span>
                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit text-center">
                                            <div class="form-check">
                                                <label class="form-check-label text-rose">
                                                    <input class="form-check-input" type="checkbox" name="status" value="1"  @if($event->status == 1)
                                                    {{'checked'}}
                                                    @endif> Post Your Event !
                                                    <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="form-control-label bmd-label-floating" for="example5"></label>
                                            <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ $event->body }}</textarea>
                                        </div>

                                        <div class="submit text-center">
                                            <input type="submit" class="btn btn-warning btn-raised btn-round " value="Update event">
                                        </div>
                                        <div class="submit text-center">
                                            <a href="{{ route('myaccount.home') }}" class="btn btn-info btn-round btn-raised">
                                                <i class="material-icons">arrow_back_ios</i> Back profile page
                                            </a>
                                        </div>

                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 @include('inc._footer')
 @endsection

 @section('scripts')
 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace( 'article-ckeditor' );
 </script>

 @endsection
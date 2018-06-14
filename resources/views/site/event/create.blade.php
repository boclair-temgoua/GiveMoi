@extends('inc.main_account')

@section('style')

@endsection
@section('content')
<div  class="login-page  ">
    <div class="page-header header-filter" style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <div class="col-md-12 ml-auto mr-auto text-center">
                                        <h3 class="card-title text-info">Creer un evenement en un clic </h3>
                                        <p class="card-title">La creation de vos Evenements doivent respecter les <a href="">conditions d'utilisation</a> vu de quoi ils seront tous simplement suprimer .</p>
                                        @include('inc.alert')
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-10 ml-auto mr-auto">
                                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                                        {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="bmd-label-floating">{{ __('Title')}}</label>
                                        <input id="title" type="text"
                                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               name="title" value="{{ old('title') }}" >
                                        @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 row-block">
                                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">{{ __('Country')}}</label>
                                                <input id="country" type="text"
                                                       class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                       name="country" value="{{ old('country') }}">
                                                @if ($errors->has('country'))
                                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 row-block">
                                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">{{ __('City')}}</label>
                                                <input id="city" type="text"
                                                       class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                       name="city" value="{{ old('city') }}" >
                                                @if ($errors->has('city'))
                                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 row-block">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">{{ __('Name')}}</label>
                                                <input id="name" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="name" value="{{ old('name') }}" >
                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 row-block">
                                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">{{ __('Color')}}</label>
                                                <input id="color" type="text"
                                                       class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}"
                                                       name="color" value="{{ old('color') }}" >
                                                @if ($errors->has('color'))
                                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('color') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <div class="profile text-center">
                                                <br>
                                                <div class="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle img-raised">

                                                        <img src="" alt="...">

                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                    <div>
                                                        <span class="btn btn-raised btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Selectioner une image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="image" type="file" class="form-control" name="image">
                                                        </span>
                                                        <br/>
                                                        <a href="#pablo"
                                                           class="btn btn-danger btn-round fileinput-exists"
                                                           data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="form-control-label bmd-label-floating" for="example5"></label>
                                        <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ old('body') }}</textarea>
                                    </div>

                                    <div class="submit text-center">
                                        <input type="submit" class="btn btn-warning btn-raised btn-round " value="Continuer">
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
@extends('inc.admin._main')
@section('title', '- Conditions and term ')



@section('style')
@parent



@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="header text-center ml-auto mr-auto">
            <h3 class="title">Conditions Utilisation</h3>
            <p class="category">Create Condition utilisation</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{route('conditions.update',$condition->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Condition create </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label class="bmd-label-floating">{{ __('Title')}}</label>
                                        <input id="title" type="text"
                                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               name="title" value="{{ $condition->title }}" >
                                        @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <div class="profile text-center">
                                                <br>

                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-raised">
                                                        <img src="{{ url('assets/img/conditions/' .$condition->cover_image) }}" alt="...">
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
                                    <br>
                                    <div class="col-md-12 ml-auto mr-auto">
                                        <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ $condition->body }}</textarea>
                                    </div>
                                </div>

                                <div class="submit text-center">
                                    <input type="submit" class="btn btn-info btn-raised btn-round" value="Update Condition utilisation">
                                </div>
                                <div class="submit text-center">
                                    <a href="{{route('conditions.index')}}" class="btn btn-facebook btn-raised btn-round">Back for condition table</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.admin._footer')
</div>
</div>

@endsection

@section('script')
@parent



@endsection
@extends('inc.admin._main')
@section('title', '- About presentation created')



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
            <h3 class="title">Abouts</h3>
            <p class="category">Creations des presentations de service</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('presentation.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Created une prestation de service </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-4 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="name"  class="bmd-label-floating">Service</label>
                                            <input type="text" class="form-control" name="title" id="title"  value="{{ old('title') }}" minLength="3" required="true"/>
                                            @if ($errors->has('title'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                            <label for="slug"  class="bmd-label-floating">Icon Materialise disigne</label>
                                            <input type="text" class="form-control" name="icon"  id=icon  value="{{ old('icon') }}" minLength="2" required="true" />
                                            @if ($errors->has('icon'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('icon') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker" name="color" id="color" data-style="select-with-transition" title="Select color Icon" data-size="7">
                                                <option disabled>Choose Color icon</option>
                                                <option value="rose">rose</option>
                                                <option value="info">info</option>
                                                <option value="danger">danger</option>
                                                <option value="warning">warning</option>
                                            </select>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 ml-auto mr-auto">

                                        <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ old('body') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-info btn-raised btn-round" value="Create new presentation">
                            </div>
                            <div class="submit text-center">
                                <a href="{{route('about.index')}}" class="btn btn-facebook btn-raised btn-round">Back for your table presentation</a>
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
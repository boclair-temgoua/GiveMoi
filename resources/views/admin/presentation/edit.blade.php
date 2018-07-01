@extends('inc.admin._main')
@section('title', '- About presentation Update')



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
            <h3 class="title">Presentations</h3>
            <p class="category">Edition des presentations de service</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{route('presentation.update',$presentation->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Edit presentation </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-4 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="name"  class="bmd-label-floating">Service</label>
                                            <input type="text" class="form-control" name="title" id="title"  value="{{ $presentation->title }}" minLength="3" required="true"/>
                                            @if ($errors->has('title'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                            <label for="slug"  class="bmd-label-floating">Icon Materialise disigne <i class="material-icons text-{{ $presentation->color}}">{{ $presentation->icon}}</i></label>
                                            <input type="text" class="form-control" name="icon"  id=icon  value="{{ $presentation->icon }}" minLength="2" required="true" />
                                            @if ($errors->has('icon'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('icon') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker " data-style="select-with-transition" title="Choose Color" id="" name="colors[]" data-size="7">
                                                <option disabled>Choose color</option>
                                                @foreach($colors as $color)
                                                <option value="{{ $color->id }}"
                                                        @foreach ($presentation->colors as $presentationColor)
                                                    @if ($presentationColor->id == $color->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    >{!! $color->slug !!}
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
                                                        <img src="{{ url('assets/img/about/' .$presentation->image) }}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                                    <div>
                                                        <span class="btn btn-raised btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="image" type="file" class="form-control" name="image">
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12 ml-auto mr-auto">

                                        <textarea class="ckeditor" id="editor1" name="body" type="text" rows="12" cols="80"   >{{ $presentation->body }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-info btn-raised btn-round" value="Update presentation">
                            </div>
                            <div class="submit text-center">
                                <a href="{{route('presentation.index')}}" class="btn btn-facebook btn-raised btn-round">Back for your table presentation</a>
                            </div>
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
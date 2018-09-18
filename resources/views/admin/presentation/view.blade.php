@extends('inc.admin._main')
@section('title', '- About presentation Update')
@section('sectionTitle', 'About Presentations')
@section('style')
@parent
@endsection

@section('init')
<!-- Site wrapper -->
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="content">
            @include('inc.admin.components.status_admin')
            <div class="container-fluid">
                @can('view-presentation')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form>
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>Presentation View</b>
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="name"  class="bmd-label-floating">Service</label>
                                                <input type="text" class="form-control" name="title" id="title"  value="{{ $presentation->title }}" minLength="3" required="true" disabled/>
                                                @if ($errors->has('title'))
                                                <span class="help-block">                                                     <strong class="text-danger">{{ $errors->first('title') }}</strong>                                                 </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                                <label for="slug"  class="bmd-label-floating">Icon Materialise disigne <i class="material-icons text-{{ $presentation->color}}">{{ $presentation->icon}}</i></label>
                                                <input type="text" class="form-control" name="icon"  id=icon  value="{{ $presentation->icon }}" minLength="2" required="true" disabled />
                                                @if ($errors->has('icon'))
                                                <span class="help-block">
+                                                        <strong class="text-danger">{{ $errors->first('icon') }}</strong>
+                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4 ">
                                            {!! Form::select('color_id', old('color_id') ? old('color_id') : App\Model\user\partial\color::pluck('slug','id'),null, ['data-style'=>'select-with-transition', 'class' => 'selectpicker', 'required' => '','title'=> '' ]) !!}
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <br>
                                            <textarea class="ckeditor" id="editor1" name="body" type="text" rows="12" cols="80"   >{{ $presentation->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit text-center">
                                    <a href="{{route('presentation.index')}}" class="btn btn-info btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">undo</i>
                                    </span>
                                        <b>Back to Presentation Table</b>
                                    </a>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="submit text-center">
                    @include('inc.admin.components.alert_permission')
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

@include('inc.admin._footer')
@endsection

@section('script')
@parent
@endsection

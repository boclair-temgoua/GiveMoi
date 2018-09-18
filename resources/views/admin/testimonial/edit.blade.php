@extends('inc.admin._main')
@section('title', '- Testimonial Edit')
@section('sectionTitle', 'Testimonials')
@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
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
                @can('edit-testimonial')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        @include('inc.alert')
                        <br>
                        <form id="RegisterValidation" role="form" method="POST" action="{{route('testimonial.update',$testimonial->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">question_answer</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>Edit Testimonial</b>
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-6 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                            <label for="name"  class="bmd-label-floating">Full name</label>
                                            <input type="text" class="form-control" name="fullname" id="fullname"  value="{{ $testimonial->fullname  }}" minLength="3" required="true"/>
                                            @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('fullname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                            <label for="slug"  class="bmd-label-floating">Role</label>
                                            <input type="text" class="form-control" name="role"  id="role"  value="{{ $testimonial->role }}" minLength="3"  />
                                            @if ($errors->has('role'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <div class="profile text-center">
                                                <br>
                                                <div class="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle img-raised">
                                                        <img src="{{ asset('assets/img/testimonial/' .$testimonial->image) }}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                    <div>
                                                        <span class="btn btn-raised btn-round btn-warning btn-file">
                                                            <span class="fileinput-new">
                                                                <i class="material-icons">insert_photo</i>
                                                                <b>Add Image</b>
                                                            </span>
                                                            <span class="fileinput-exists">
                                                                <i class="material-icons">photo_library</i>
                                                                <b>Change</b>
                                                            </span>
                                                            <input id="image" type="file" class="form-control" name="image">
                                                        </span>
                                                        <br/>
                                                        <a href="#pablo"
                                                           class="btn btn-danger btn-round fileinput-exists"
                                                           data-dismiss="fileinput">
                                                            <i class="fa fa-times"></i>
                                                            <b>Remove</b>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                                        <textarea class="form-control" name="body" type="text" rows="12" cols="80"  id="example5">{{ $testimonial->body }}</textarea>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <a href="{{route('testimonial.index')}}" class="btn btn-info btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">undo</i>
                                            </span>
                                            <b>Back to Testimonial Table</b>
                                        </a>
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">save_alt</i>
                                            </span>
                                            <b>Update Testimonial</b>
                                        </button>
                                    </div>
                                    <br>
                                </div>
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
<!-- emojionearea -->
<script src="/assets/js/plugins/emojionearea.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>
@endsection
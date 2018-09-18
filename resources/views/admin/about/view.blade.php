@extends('inc.admin._main')
@section('title', '- About View')
@section('sectionTitle', 'About Members')
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{route('about.update',$about->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                            <div class="card">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>View Member</b>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name"  class="bmd-label-floating">Full name</label>
                                                <input type="text" class="form-control" name="fullname" id="fullname"  value="{{ $about->fullname  }}" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                                <label for="slug"  class="bmd-label-floating">Role</label>
                                                <input type="text" class="form-control" name="role"  id="role"  value="{{ $about->role }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name"  class="bmd-label-floating">Facebook link </label>
                                                <input type="text" class="form-control" name="fblink" id="fblink"   value="{{ $about->fblink  }}"  disabled/>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="slug"  class="bmd-label-floating">Google+ link</label>
                                                <input type="text" class="form-control" name="googlelink" id="fgooglelink"   value="{{ $about->googlelink }}" disabled />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="slug"  class="bmd-label-floating">Twitter link</label>
                                                <input type="text" class="form-control" name="twlink" id="twlink"  value="{{ $about->twlink  }}"  disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name"  class="bmd-label-floating">Instagram link</label>
                                                <input type="text" class="form-control" name="instlink" id="instlink"  value="{{ $about->instlink  }}" disabled />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="slug"  class="bmd-label-floating">Linkedin link</label>
                                                <input type="text" class="form-control" name="linklink" id="linklink" value="{{ $about->linklink  }}" disabled />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="slug"  class="bmd-label-floating">Dribble link</label>
                                                <input type="text" class="form-control" name="dribbblelink" id="dribbblelink"  value="{{ $about->dribblelink }}"  disabled />
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
                                                        <img src="{{ asset('assets/img/about/' .$about->image) }}" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                                        <textarea class="form-control" id="article-ckeditor" name="body" type="text" rows="12" cols="80" >{{ $about->body }}</textarea>
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <br>
                                            <textarea class="form-control" id="article-ckeditor" name="body" type="text" rows="12" cols="80" disabled>{{ $about->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit text-center">
                                    <a href="{{route('about.index')}}" class="btn btn-info btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">undo</i>
                                        </span>
                                        <b>Back to Table Member</b>
                                    </a>
                                    <br>
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
@endsection

@section('script')
@parent
@endsection

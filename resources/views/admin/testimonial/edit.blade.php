@extends('inc.admin._main')
@section('title', '- Testimonial Edit')



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
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Edited Testimonials</h4>
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
                                                            <span class="fileinput-new">Add Profile</span>
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
                                    <br>
                                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                                        <textarea class="form-control" name="body" type="text" rows="12" cols="80"  id="example5">{{ $testimonial->body }}</textarea>
                                    </div>
                                </div>
                                <div class="submit text-center">
                                    <input type="submit" class="btn btn-info btn-raised btn-round" value="Mettre a jour le menbre de la Tim">
                                </div>
                                <div class="submit text-center">
                                    <a href="{{route('testimonial.index')}}" class="btn btn-facebook btn-raised btn-round">Retour a la table du Goupe</a>
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
</div>
</div>

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
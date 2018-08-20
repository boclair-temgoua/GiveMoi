@extends('inc.admin._main')
@section('title', '- Admin Testimonial created')




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
        <div class="header text-center ml-auto mr-auto">
            <h3 class="title">Testimonials</h3>
            <p class="category">Created Testimonial</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('testimonial.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card ">
                                <div class="card-header card-header-rose card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Created Testimonial</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-6 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                            <label for="name"  class="bmd-label-floating">Full name</label>
                                            <input type="text" class="form-control" name="fullname" id="fullname"  value="{{ old('fullname') }}" minLength="3" required="true"/>
                                            @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('fullname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                            <label for="slug"  class="bmd-label-floating">Role</label>
                                            <input type="text" class="form-control" name="role"  id="role"  value="{{ old('role') }}" minLength="3" required="true" />
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

                                                        <img src="{{ asset('assets/img/kit/pro/placeholder.jpg')}}" alt="...">

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
                                        <div class="col-md-12 col-sm-12 ml-auto mr-auto form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                            <textarea class="form-control" name="body" type="text" rows="12" cols="80"  id="example5">{{ old('body') }}</textarea>
                                            @if ($errors->has('body'))
                                            <span class="help-block">
                                                    <strong class="text-danger ">{{ $errors->first('body') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-info btn-raised btn-round" value="Creer le Temoignage">
                            </div>
                            <br>
                            <div class="submit text-center">
                                <a href="{{route('testimonial.index')}}" class="btn btn-facebook btn-raised btn-round">Retour a la table des Temoignages</a>
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




<script type="text/javascript">

    function setFormValidation(id){
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement : function(error, element) {
                $(element).append(error);
            },
        });
    }

    $(document).ready(function(){
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>

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
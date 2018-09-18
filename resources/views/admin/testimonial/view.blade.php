@extends('inc.admin._main')
@section('title', '- Testimonial View')



@section('style')
@parent
<link rel="stylesheet" href="/assets/dashboard/assets/css/plugins/emojionearea.min.css">


@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="header text-center ml-auto mr-auto">
            <h3 class="title">Abouts</h3>
            <p class="category">Testimonial View</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="" enctype="multipart/form-data" accept-charset="UTF-8">
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Testimonials View</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="name"  class="bmd-label-floating">Full name</label>
                                            <input type="text" class="form-control" name="fullname" id="fullname"  value="{{ $testimonial->fullname  }}" disabled/>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="slug"  class="bmd-label-floating">Role</label>
                                            <input type="text" class="form-control" name="role"  id="role"  value="{{ $testimonial->role }}" disabled  />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <div class="profile text-center">
                                                <br>
                                                <div class="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle img-raised">
                                                        <img src="{{ asset('assets/img/' .$testimonial->image) }}" alt="...">
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
                            </div>
                            <br>
                            <div class="submit text-center">
                                <a href="{{route('testimonial.index')}}" class="btn btn-facebook btn-raised btn-round">Retour a la table du Goupe</a>
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



<script src="/assets/dashboard/assets/js/plugins/emojionearea.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>
@endsection
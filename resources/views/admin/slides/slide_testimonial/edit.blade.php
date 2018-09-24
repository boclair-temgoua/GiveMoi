@extends('inc.admin._main')
@section('title', '| Create Slide')



@section('style')

@endsection
@section('content')
<div class="content">
    @include('inc.admin.components.status_admin')
    <div class="container-fluid">
        @can('edit-slide')
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">Add Slide -
                            <small class="category">Create your Slide</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <br>
                        @include('inc.alert')
                        <form id="RegisterValidation"  role="form" method="POST" action="{{ route('update_slide_testimonial',$slidestestimonial->id) }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}


                            @include('admin.slides.slide_testimonial.form')
                            <div class="submit">
                                <div class="text-center">
                                    <a href="{{route('slide_testimonial')}}" class="btn btn-info btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">undo</i>
                                                </span>
                                        <b>Back to Table image slide</b>
                                    </a>
                                    <button type="submit" class="btn btn-success btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">save_alt</i>
                                                </span>
                                        <b>Update image slide</b>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
</div>

@include('inc._footer')
</div>
</div>
@endsection
@section('script')


@endsection

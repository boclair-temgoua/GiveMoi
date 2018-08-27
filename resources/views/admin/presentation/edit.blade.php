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
        <div class="content">
            @include('inc.admin.components.status_admin')
            <div class="container-fluid">

                @can('edit-presentation')
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

                                @include('admin.presentation.form')

                            <div class="submit text-center">
                                <input type="submit" class="btn btn-info btn-raised btn-round" value="Update presentation">
                            </div>
                            <div class="submit text-center">
                                <a href="{{route('presentation.index')}}" class="btn btn-facebook btn-raised btn-round">Back for your table presentation</a>
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


@endsection
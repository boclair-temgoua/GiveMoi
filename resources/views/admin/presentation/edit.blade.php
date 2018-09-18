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
                @can('edit-presentation')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                         {!! Form::model($presentation, ['files'=> 'true','method' => 'PATCH','route' => ['presentation.update',$presentation->id], 'id' => 'RegisterValidation']) !!}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>Edit Presentation</b>
                                    </h4>
                                </div>

                                @include('admin.presentation.form')

                                <div class="submit">
                                    <div class="text-center">
                                        <a href="{{route('presentation.index')}}" class="btn btn-info btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">undo</i>
                                            </span>
                                            <b>Back to Presentation Table</b>
                                        </a>
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">save_alt</i>
                                            </span>
                                            <b>Update New Presentation</b>
                                        </button>
                                    </div>
                                    <br>
                                </div>
                        {!! Form::close() !!}
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
@extends('inc.admin._main')
@section('title', '- About presentation created')
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
                @can('create-presentation')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('presentation.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>Create New Presentation</b>
                                    </h4>
                                    <br/>
                                    @include('inc.alert')
                                </div>

                                @include('admin.presentation.form',['presentation' => new \App\Model\user\presentation()])

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
                                            <b>Create New Presentation</b>
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



@endsection
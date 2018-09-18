@extends('inc.admin._main')
@section('title', '- Admin about edit')
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
            @include('inc.admin.components.status_admin')
            <div class="container-fluid">
                @can('edit-about')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        {!! Form::model($about, ['files'=> 'true','method' => 'PATCH','route' => ['about.update',$about->id], 'id' => 'RegisterValidation']) !!}

                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title"><b>Edit Member</b></h4>
                                </div>

                                @include('admin.about.form')

                                <div class="submit">
                                    <div class="text-center">
                                        <a href="{{route('about.index')}}" class="btn btn-info btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">undo</i>
                                            </span>
                                            <b>Back to Table Member</b>
                                        </a>
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                            <span class="btn-label">
                                                <i class="material-icons">save_alt</i>
                                            </span>
                                            <b>Edit Member</b>
                                        </button>
                                    </div>
                                    <br>
                                </div>
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

@endsection

@section('script')
@parent


@endsection
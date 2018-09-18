@extends('inc.admin._main')
@section('title', '- About created')
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

                @can('create-about')
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">person_add</i>
                                    </div>
                                    <h4 class="card-title"><b>Create New Member</b></h4>
                                </div>

                                @include('admin.about.form',['about' => new \App\Model\user\about()])


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
                                            <b>Create New Member</b>
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
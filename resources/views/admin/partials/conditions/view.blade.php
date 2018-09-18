@extends('inc.admin._main')
@section('title', '- Conditions and term ')
@section('sectionTitle', 'Terms And Conditions')
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
                        {!! Form::model($condition, ['files'=> 'true','method' => 'PATCH','route' => ['conditions.update',$condition->id], 'id' => 'RegisterValidation']) !!}

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">filter_none</i>
                                </div>
                                <h4 class="card-title">
                                    <b>View Condition</b>
                                </h4>
                                <br>
                                @include('inc.alert')
                            </div>
                            <div class="card-body ">

                                @include('admin.partials.conditions.form')
                                <br>
                                <div class="submit">
                                    <div class="text-center">
                                        <a href="{{route('conditions.index')}}" class="btn btn-info btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">undo</i>
                                                </span>
                                            <b>Back to Conditions Table</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
@extends('inc.admin._main')
@section('title', '- Conditions and term ')
@section('sectionTitle', 'Terms And Conditions')

@section('style')
@parent

<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('init')
<!-- Site wrapper -->
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        <div class="content">
            <div class="container-fluid">
                @if(auth()->user()->can('create-condition_utilisation'))
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('conditions.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">
                                        <b>Create Condition</b>
                                    </h4>
                                    <br>
                                    @include('inc.alert')
                                </div>

                                <div class="card-body">

                                    @include('admin.partials.conditions.form',['condition' => new \App\Model\user\condition()])
                                    <br>
                                    <div class="submit">
                                        <div class="text-center">
                                            <a href="{{route('conditions.index')}}" class="btn btn-info btn-raised btn-round">
                                                 <span class="btn-label">
                                                     <i class="material-icons">undo</i>
                                                 </span>
                                                <b>Back to Conditions Table</b>
                                            </a>
                                            <button type="submit" class="btn btn-success btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">save_alt</i>
                                                </span>
                                                <b>Create Condition</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="submit text-center">
                    @include('inc.admin.components.alert_permission')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('inc.admin._footer')
@endsection
@section('script')
@parent


<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>

@endsection
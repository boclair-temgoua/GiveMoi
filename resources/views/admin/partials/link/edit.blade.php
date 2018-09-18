@extends('inc.admin._main')
@section('title', '- Edit Link')
@section('sectionTitle', 'Links')
@section('style')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                <form id="RegisterValidation" role="form" method="POST" action="{{route('link.update',$link->id)}}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="card ">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">http</i>
                            </div>
                            <h4 class="card-title"><b>Edit Link</b></h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name"  class="bmd-label-floating">Name Page</label>
                                <input type="text" class="form-control" name="name" id="name"  value="{{ $link->name }}" minLength="3" required="true"/>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label for="link"  class="bmd-label-floating"><b>Link</b></label>
                                <input type="text" class="form-control" name="link" id="link" value="{{ $link->link }}" minLength="3" required="true"/>
                                @if ($errors->has('link'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="submit">
                            <div class="text-center">
                                <a href="{{route('link.index')}}" class="btn btn-info btn-raised btn-round">
                                <span class="btn-label">
                                    <i class="material-icons">undo</i>
                                </span>
                                    <b>Back to Table Link</b>
                                </a>
                                <button type="submit" class="btn btn-success btn-raised btn-round">
                                <span class="btn-label">
                                    <i class="material-icons">save_alt</i>
                                </span>
                                    <b>Update Link</b>
                                </button>
                            </div>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('inc.admin._footer')
@endsection

@section('script')
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
@endsection
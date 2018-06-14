@extends('inc.admin._main')
@section('title', '- Edition du Lien')



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
                                <i class="material-icons">more_horiz</i>
                            </div>
                            <h4 class="card-title">Edition du Lien</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name"  class="bmd-label-floating">Non de la page</label>
                                <input type="text" class="form-control" name="name" id="name"  value="{{ $link->name }}" minLength="3" required="true"/>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label for="link"  class="bmd-label-floating">Lien</label>
                                <input type="text" class="form-control" name="link"  id="link" value="{{ $link->link }}" minLength="3" required="true"/>
                                @if ($errors->has('link'))
                                <span class="help-block">
                                        <strong class="text-danger text-center">{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="submit text-center">
                        <input type="submit" class="btn btn-info btn-raised btn-round" value="Mettre a jour le Lien">
                    </div>
                    <br>
                    <div class="submit text-center">
                        <a href="{{route('link.index')}}" class="btn btn-facebook btn-raised btn-round">Retour a la table des Liens</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@include('inc.admin._footer')
</div>
</div>

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
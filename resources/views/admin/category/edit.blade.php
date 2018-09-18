@extends('inc.admin._main')
@section('title', '| Edit Category')
@section('sectionTitle', 'Categories')
@section('style')
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-sm-6 ml-auto mr-auto">
                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('category.update',$category->id) }}" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card ">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">filter_none</i>
                                </div>
                                <h4 class="card-title"><b>Edit Category</b></h4>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="name"  class="bmd-label-floating">Titre categories</label>
                                    <input type="text" class="form-control" name="name" id="name"  value="{{ $category->name }}" minLength="3" required="true"/>
                                </div>
                                <div class="form-group">
                                    <label for="slug"  class="bmd-label-floating">Sous titre</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}"  />
                                </div>
                            </div>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-info btn-raised btn-round" value="Mettre a jour la categorie">
                        </div>
                        <br>
                        <div class="submit text-center">
                            <a href="{{route('category.index')}}" class="btn btn-facebook btn-raised btn-round">Retour a la table des Categories</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('inc._footer')
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
@extends('inc.admin._main')
@section('title', '- Admin Colors')


@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Colors</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            @include('inc.alert')
                            <div class="submit text-center">


                                <button class="btn btn-rose btn-raised btn-round " data-toggle="modal"
                                        data-target="#createModal">
                                    Créer un Color
                                </button>


                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="150px">No</th>
                                    <th>Color name</th>
                                    <th>Color</th>
                                    <th>Status color</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th width="150px">No</th>
                                    <th>Color name</th>
                                    <th>Color</th>
                                    <th>Status color</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>


                                @foreach($colors as $lk)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $lk->color_name}}</td>
                                    <td>{{ $lk->slug}}</td>
                                    <td>
                                        @if($lk->status==1)
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info">couleur activé</span>
                                        </div>
                                        @else
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger">couleur desactivé</span>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        <a href="{{ route('unactive_color',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_color',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endif

                                        <a href="#" class="show-modal btn btn-link  btn-info btn-round btn-just-icon"
                                           data-id="{{$lk->id}}"
                                           data-color_name="{{ $lk->color_name}}"
                                           data-slug="{{ $lk->slug}}" title="Show color">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <button type="button" class="btn btn-link  btn-success btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#editedModal"
                                                data-mycolor_name="{{ $lk->color_name }}"
                                                data-myslug="{{ $lk->slug }}"
                                                data-lkid="{{ $lk->id }}" title="Editer la couleur">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal"
                                                data-target="#delete"
                                                data-catid="{{ $lk->id }}" title="Delete color">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>

{{-- Modal Form Create Color --}}
<!-- Create Color -->
<div class="modal fade" id="createModal" tabindex="-1" role="">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="deleteLabel">Create new color</h5>
            </div>
            <div class="modal-body">
                <form id="RegisterValidation" role="form" method="POST" action="{{ route('color.store') }}">
                    {{ csrf_field() }}

                    @include('admin.partials.color.form')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-rose btn-raised">Create Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Form Update Color --}}
<!-- Update Color -->
<div class="modal fade" id="editedModal" tabindex="-1" role="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editedLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="RegisterValidation" role="form" method="POST" action="{{route('color.update','slug')}}"
                      accept-charset="UTF-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <input type="hidden" name="color_id" id="lk_id" value="">
                    @include('admin.partials.color.form')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-info btn-raised ">Update Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Update Tag-->
{{-- Modal Form Show Color --}}
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Name color :</label>
                    <b id="ti"/>
                </div>
                <div class="form-group">
                    <label for="">Slug :</label>
                    <b id="by"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('color.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Color?
                    <input type="hidden" name="color_id" id="cat_id" value=" ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>

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


<script type="text/javascript">

        //Delete function
 $('#delete').on('show.bs.modal', function (event) {

        $('.modal-title').text('Delet Color');
        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)


        modal.find('.modal-body #cat_id').val(cat_id);

    })
    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)

        modal.find('.modal-body #cat_id').val(cat_id);

    })

        // Edit function
    $('#editedModal').on('show.bs.modal', function (event) {

        $('.modal-title').text('Edit color');
        var button = $(event.relatedTarget)
        var color_name = button.data('mycolor_name')
        var slug = button.data('myslug')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #color_name').val(color_name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #lk_id').val(lk_id);


    });

      // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('color_name'));
        $('#by').text($(this).data('slug'));
        $('.modal-title').text('Show Color');
    });
</script>





@endsection
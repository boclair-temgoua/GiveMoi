@extends('inc.admin._main')
@section('title', '- Admin Colors')
@section('sectionTitle', 'Colors')
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
                            <i class="material-icons">colorize</i>
                        </div>
                        <h4 class="card-title">
                            <b>All Colors</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            @include('inc.alert')
                            <div class="submit text-center">

                                @can('create-color')
                                <button class="btn btn-rose btn-raised btn-round " data-toggle="modal"
                                        data-target="#createModal">
                                    <i class="material-icons">color_lens</i>
                                    <b>Create Color</b>
                                </button>
                                @endcan


                            </div>
                            <!--  Here you can write extra buttons/actions for the toolbar   -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><b>Color name</b></th>
                                        <th><b>Color</b></th>
                                        <th>
                                            @can('unpublish-color')
                                            @can('publish-color')
                                            <b>Status color</b>
                                            @endcan
                                            @endcan
                                        </th>
                                        <th><b>Create Date</b></th>
                                        <th><b>Edited by</b></th>
                                        <th class="disabled-sorting text-right"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Color name</th>
                                        <th>Color</th>
                                        <th>
                                            @can('unpublish-color')
                                            @can('publish-color')
                                            <b>Status color</b>
                                            @endcan
                                            @endcan

                                        </th>
                                        <th><b>Create Date</b></th>
                                        <th><b>Edited by</b></th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    
                                @foreach($colors as $lk)
                                <tr>
                                    <td>{{ $lk->color_name}}</td>
                                    <td>{{ $lk->slug}}</td>
                                    <td>
                                        @if($lk->status==1)
                                        @can('unpublish-color')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info"><b>Active</b></span>
                                        </div>
                                        @endcan
                                        @else

                                        @can('publish-color')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger"><b>Deactive</b></span>
                                        </div>
                                        @endcan
                                        @endif
                                    </td>
                                    <td>{!! str_limit( \Carbon\Carbon::parse($lk->updated_at)->diffForHumans(), 20,'...') !!}</td>

                                    <td><b>{!! str_limit($lk->name, 16,'...') !!}</b></td>


                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        @can('unpublish-color')
                                        <a href="{{ route('unactive_color',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan

                                        @else
                                        @can('publish-color')
                                        <a href="{{ route('active_color',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @endif

                                        <button type="button" class="btn btn-link  btn-info btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#viewModal"
                                                data-mycolor_name="{{ $lk->color_name }}"
                                                data-myslug="{{ $lk->slug }}"
                                                data-lkid="{{ $lk->id }}" title="Show color">
                                            <i class="material-icons">visibility</i>
                                        </button>
                                        @can('edit-color')
                                        <button type="button" class="btn btn-link  btn-success btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#editedModal"
                                                data-mycolor_name="{{ $lk->color_name }}"
                                                data-myslug="{{ $lk->slug }}"
                                                data-lkid="{{ $lk->id }}" title="Edit color">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        @endcan
                                        @can('delete-color')
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal"
                                                data-target="#delete"
                                                data-catid="{{ $lk->id }}" title="Delete color">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                        @endcan
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
                <h5 class="modal-title" id="deleteLabel"><v>Create new Color</v></h5>
            </div>
            <div class="modal-body">
                <form id="RegisterValidation" role="form" method="POST" action="{{ route('color.store') }}">
                    {{ csrf_field() }}

                    @include('admin.partials.color.form')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                        <button type="submit" class="btn btn-rose btn-raised"><b>Create Color</b></button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                        <button type="submit" class="btn btn-info btn-raised "><b>Update Color</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Update color-->
<!-- View color -->
<div class="modal fade" id="viewModal" tabindex="-1" role="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editedLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="RegisterValidation" role="form" method="POST" action=" " accept-charset="UTF-8">

                    @include('admin.partials.color.form')

                </form>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                    <button type="submit" class="btn btn-danger"><b>Yes Delete</b></button>
                </div>
            </form>

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

    // View function
    $('#viewModal').on('show.bs.modal', function (event) {

        $('.modal-title').text('show color');
        var button = $(event.relatedTarget)
        var color_name = button.data('mycolor_name')
        var slug = button.data('myslug')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #color_name').val(color_name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #lk_id').val(lk_id);


    });

</script>
@endsection
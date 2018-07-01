@extends('inc.admin._main')
@section('title', '- Tags')


@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('inc.admin.alert_admin')

                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Tags</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round " data-toggle="modal"
                                        data-target="#createModal">
                                    Créer un Tag
                                </button>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Date de creation</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Date de creation</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($tags as $lk)
                                <tr>
                                    <td>{{ $lk->name}}</td>
                                    <td>{{ $lk->slug}}</td>
                                    <td>{{ $lk->created_at->diffForHumans() }}</td>
                                    <td class="td-actions text-right">

                                        <button type="button" class="btn btn-link  btn-success btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#editedModal"
                                                data-myname="{{ $lk->name }}"
                                                data-myslug="{{ $lk->slug }}" data-lkid="{{ $lk->id }}">
                                            <i class="material-icons">edit</i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                            <i class="material-icons">delete</i>
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
<!-- Create Tag -->
<div class="modal fade" id="createModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Create New Tag</h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('tag.store') }}">
                        {{ csrf_field() }}
                        <div class="card-body">

                            @include('admin.tag.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-rose btn-raised ">Create Tag</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End create Tag -->
<!-- Update Tag -->
<div class="modal fade" id="editedModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editedLabel">Update Tag</h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{route('tag.update','slug')}}"
                          accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">

                            <input type="hidden" name="tag_id" id="lk_id" value="">
                            @include('admin.tag.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-rose btn-raised ">Update Tag</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Update Tag -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tag.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Tag?
                    <input type="hidden" name="tag_id" id="cat_id" value=" ">
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

    $('#delete').on('show.bs.modal', function (event) {

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
</script>
<script type="text/javascript">

    $('#editedModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('myname')
        var slug = button.data('myslug')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #lk_id').val(lk_id);

    })
</script>


@endsection
@extends('inc.admin._main')
@section('title', '- All Categories')
@section('sectionTitle', 'Categories')
@section('style')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">label</i>
                        </div>
                        <h4 class="card-title"><b>All Categories</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round" data-toggle="modal" data-target="#createModal">
                                    <span class="btn-label">
                                        <i class="material-icons">category</i>
                                    </span>
                                    <b>Create New Category</b>
                                </button>
                            </div>
                            <!-- Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><b>Name</b></th>
                                        <th><b>Slug</b></th>
                                        <th><b>Create Date</b></th>
                                        <th class="disabled-sorting text-right"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Create Date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($categories as $lk)
                                    <tr>
                                        <td>{{ $lk->name}}</td>
                                        <td>{{ $lk->slug}}</td>
                                        <td>{!! $lk->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" class="btn btn-link  btn-success btn-round btn-just-icon "
                                                    data-toggle="modal" data-target="#editedModal"
                                                    data-myname="{{ $lk->name }}"
                                                    data-myslug="{{ $lk->slug }}" data-lkid="{{ $lk->id }}">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
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

<!-- Create Categories -->
<div class="modal fade" id="createModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('category.store') }}">
                        {{ csrf_field() }}
                        <br>
                        <h5 class="modal-title text-center" id="editedLabel">
                              <b>Create Category</b>
                        </h5>
                        <div class="card-body">
                            
                            @include('admin.category.form')
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                            <button type="submit" class="btn btn-rose btn-raised"><b>Create Category</b></button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Create Categories -->

<!-- Update Tag Categories -->
<div class="modal fade" id="editedModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editedLabel">
                    <b>Update Category</b>
                </h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{route('category.update','slug')}}"
                          accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">

                            <input type="hidden" name="category_id" id="lk_id" value="">
                            @include('admin.tag.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                            <button type="submit" class="btn btn-rose btn-raised"><b>Update Category</b></button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Update Tag Categories -->

<!--Delete Category -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">
                    <b>Delete Confirmation</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Category?
                    <input type="hidden" name="category_id" id="cat_id" value=" ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                    <button type="submit" class="btn btn-danger"><b>Yes Delete</b></button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End Delete Category -->
@include('inc.admin._footer')
@endsection

@section('script')
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
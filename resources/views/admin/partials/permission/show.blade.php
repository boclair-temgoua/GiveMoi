@extends('inc.admin._main')
@section('title', '- Permissions')



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
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Permissions</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                            <div class="submit text-center">
                                <a href="{{route('permissions.create')}}" class="btn btn-warning btn-raised btn-round">Create New Permission</a>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Display Name</th>
                                    <th>Name</th>
                                    <th>Create_at</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Display Name</th>
                                    <th>Name</th>
                                    <th>Create_at</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $lk)
                                <tr>
                                    <td>{{ $lk->display_name}}</td>
                                    <td>{{ $lk->name}}</td>
                                    <td>{{ $lk->created_at->diffForHumans()}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" class="btn btn-link  btn-info btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#viewModal" data-mydisplay_name="{{ $lk->display_name }}">
                                            <i class="material-icons">visibility</i>
                                        </button>
                                        <button type="button" class="btn btn-link  btn-success btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#editedModal" data-mydisplay_name="{{ $lk->display_name }}"
                                                data-lkid="{{ $lk->id }}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                            <i class="material-icons">close</i>
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

<!-- Update Permission -->
<div class="modal fade" id="editedModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Permission</h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{route('permissions.update',$lk->id)}}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">

                            <input type="hidden" name="permission_id" id="lk_id" value="">
                            @include('admin.partials.permission.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-rose btn-raised ">Update Permission</button>
                        </div>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--End Update Permission -->
<!-- Create Permission -->
<div class="modal fade" id="createModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Create New Permission</h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form id="RegisterValidation" role="form" method="POST" action="{{ route('permissions.store') }}">
                        {{ csrf_field() }}
                        <div class="card-body">

                            @include('admin.partials.permission.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-rose btn-raised ">Create  Permission</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End create Permission -->

<!-- View Permission -->
<div class="modal fade" id="viewModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Permission</h5>
            </div>
            <br>
            <div class="card card-signup card-plain">
                <div class="modal-body">
                    <form>
                        <div class="card-body">

                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label for="display_name"  class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="display_name"  id="display_name" minLength="3" placeholder="Name of the Permission" disabled required="true"/>
                                @if ($errors->has('display_name'))
                                <span class="help-block">
                                    <strong class="text-danger text-center">{{ $errors->first('display_name') }}</strong>
                                </span>
                                @endif
                              </div>
                             </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End View Permission -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('permissions.destroy',$lk->id) }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Permission?
                    <input type="hidden" name="permission_id" id="cat_id" value=" ">
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
        var display_name = button.data('mydisplay_name')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #display_name').val(display_name);
        modal.find('.modal-body #lk_id').val(lk_id);

    })
</script>
<script type="text/javascript">

    $('#viewModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var display_name = button.data('mydisplay_name')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #display_name').val(display_name);
        modal.find('.modal-body #lk_id').val(lk_id);

    })
</script>



@endsection
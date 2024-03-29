@extends('inc.admin._main')
@section('title', '- Admin Users')
@section('sectionTitle', 'Users')




@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <h4 class="card-title">
                            <b>All Users</b>
                        </h4>
                    </div>
                    <div class="card-body">


                        <div class="toolbar">



                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th><b>Name</b></th>
                                    <th><b>Username</b></th>
                                    <th><b>Email </b></th>
                                    <th><b>Profile</b></th>
                                    <th><b>Age</b></th>
                                    <th><b>Sex</b></th>
                                    <th><b>Member since</b></th>
                                    <th class="disabled-sorting text-right">

                                        @can('view-user')
                                        @can('delete-user')
                                        <b>Actions</b>
                                        @endcan
                                        @endcan

                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Member since</th>
                                    <th class="text-right">

                                        @can('view-user')
                                        @can('delete-user')
                                        <b>Actions</b>
                                        @endcan
                                        @endcan

                                    </th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($users as $lk)
                                <tr>
                                    <td>{{ $lk->name}}</td>
                                    <td>{{ $lk->username}}</td>
                                    <td>{{ $lk->email}}</td>
                                    <td><img src="{{ URL::to($lk->avatar) }}?{{ time() }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                    <td><b>{{ $lk->age}} ans</b></td>
                                    <td>{{ $lk->sex}}</td>
                                    <td>{!! \Carbon\Carbon::parse($lk->created_at)->diffForHumans() !!}</td>
                                    <td class="td-actions text-right">

                                        @can('view-user')
                                        <a href="{{ route('user.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        @endcan

                                        @can('delete-user')
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
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
<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel"><b>Delete Confirmation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.destroy',$lk->id) }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this User?
                    <input type="hidden" name="user_id" id="cat_id" value=" ">
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



<script>
    $(document).ready(function() {
        // Initialise the wizard
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.card-wizard').addClass('active');
        }, 600);
    });
</script>
@endsection

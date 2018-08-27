@extends('inc.admin._main')
@section('title', '- Roles')



@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <b/>
        @can('all-role')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Roles</h4>
                    </div>
                    <div class="card-body">

                        @can('delete-multiple-role')
                        <div class="submit text-right">
                            <button class="btn btn-danger btn-raised btn-round delete-all "
                                    data-url="">
                                <i class="material-icons">delete_forever</i>
                                Delete select
                            </button>
                        </div>
                        @endcan
                        <div class="toolbar">
                            @can('create-role')
                            <div class="submit text-center">
                                <a href="{{route('roles.create')}}" class="btn btn-warning btn-raised btn-round">Create New Role</a>
                            </div>
                            @endcan
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    @can('delete-multiple-role')
                                    <th>Select</th>
                                    @endcan
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    @can('delete-multiple-role')
                                    <th>Select</th>
                                    @endcan
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if(count($roles) > 0)
                                @foreach($roles as $lk)
                                <tr id="tr_{{$lk->id}}">
                                    <td>{{ $lk->name}}</td>
                                    <td>
                                        @foreach ($lk->permissions()->pluck('name') as $permission)
                                        <span class="badge badge-success  badge-pill">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    @can('delete-multiple-role')
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input checkbox" type="checkbox"  data-id="{{$lk->id}}">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    @endcan
                                    <td class="td-actions text-right">
                                        <a href="#" class="btn btn-link  btn-info btn-round btn-just-icon" title="Show role">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        @can('edit-role')
                                        <a href="{{ route('roles.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>
                                        @endcan
                                        @can('delete-role')
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                @else

                                @endif
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
        @else
        <div class="submit text-center">
            @include('inc.admin.components.alert_permission')
        </div>
        @endcan
        <!-- end row -->
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel"><b>Delete Confirmation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('roles.destroy','name') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Role?
                    <input type="hidden" name="role_id" id="cat_id" value=" ">
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

    $(document).ready(function () {



        $('#check_all').on('click', function(e) {

            if($(this).is(':checked',true))

            {

                $(".checkbox").prop('checked', true);

            } else {

                $(".checkbox").prop('checked',false);

            }

        });



        $('.checkbox').on('click',function(){

            if($('.checkbox:checked').length == $('.checkbox').length){

                $('#check_all').prop('checked',true);

            }else{

                $('#check_all').prop('checked',false);

            }

        });



        $('.delete-all').on('click', function(e) {



            var idsArr = [];

            $(".checkbox:checked").each(function() {

                idsArr.push($(this).attr('data-id'));

            });



            if(idsArr.length <=0)

            {

                alert("Please select atleast one record to delete.");

            }  else {



                if(confirm("Are you sure, you want to delete the selected role ?")){



                    var strIds = idsArr.join(",");



                    $.ajax({

                        url: "{{ route('role.multiple-delete') }}",

                        type: 'DELETE',

                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        data: 'ids='+strIds,

                        success: function (data) {

                            if (data['status']==true) {

                                $(".checkbox:checked").each(function() {

                                    $(this).parents("tr").remove();

                                });

                                alert(data['message']);

                            } else {

                                alert('Whoops Something went wrong!!');

                            }

                        },

                        error: function (data) {

                            alert(data.responseText);

                        }

                    });



                }

            }

        });



        $('[data-toggle=confirmation]').confirmation({

            rootSelector: '[data-toggle=confirmation]',

            onConfirm: function (event, element) {

                element.closest('form').submit();

            }

        });



    });

</script>
@endsection
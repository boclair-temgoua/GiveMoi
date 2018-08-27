@extends('inc.admin._main')
@section('title', '- Permissions')



@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        @can('all-permission')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Permissions</h4>
                    </div>
                    <div class="card-body">

                        @include('inc.alert')

                        @can('delete-multiple-permission')
                        <div class="submit text-right">
                            <button class="btn btn-rose btn-raised btn-round delete-all "
                                    data-url="">
                                <i class="material-icons">delete_forever</i>
                                Delete select
                            </button>
                        </div>
                        @endcan
                        <div class="toolbar">

                            @can('create-permission')
                            <div class="submit text-center">
                                <button class="btn btn-primary btn-raised btn-round " data-toggle="modal"
                                        data-target="#createModal">
                                    Create un new permission
                                </button>
                            </div>
                            @endcan
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    @can('delete-multiple-permission')
                                    <th>Select</th>
                                    @endcan
                                    <th>Name</th>
                                    <th>Guard_ame</th>
                                    <th>Updated_at</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    @can('delete-multiple-permission')
                                    <th>Select</th>
                                    @endcan
                                    <th>Name</th>
                                    <th>Guard_ame</th>
                                    <th>Updated_at</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                             @if(count($permissions) > 0)
                                @foreach($permissions as $lk)
                                <tr id="tr_{{$lk->id}}">
                                    @can('delete-multiple-permission')
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
                                    <td><b>{{ $lk->name}}</b></td>
                                    <td>{{ $lk->guard_name}}</td>
                                    <td>{!! str_limit( \Carbon\Carbon::parse($lk->updated_at)->diffForHumans(), 20,'...') !!}</td>

                                    <td class="td-actions text-right">
                                        <a href="#" class="show-modal btn btn-link  btn-info btn-round btn-just-icon"
                                           data-id="{{$lk->id}}" data-name="{{ $lk->name}}" data-guard_name="{{ $lk->guard_name}}" title="Show permission">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        @can('edit-permission')
                                        <a href="{{ route('permissions.edit',[$lk->id]) }}" class="btn btn-link  btn-success btn-round btn-just-icon " title="Show permission">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan
                                        @can('delete-permission')
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

<!-- Create Permission -->
<div class="modal fade" id="createModal" tabindex="-1" role="">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="deleteLabel"><b>Create new permission</b></h5>
            </div>
            <div class="modal-body">
                    {!! Form::open(['method' => 'POST','id' => 'RegisterValidation', 'route' => ['permissions.store']]) !!}

                    @include('admin.partials.permission.form',['permission' => new \Spatie\Permission\Models\Permission()])

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-rose btn-raised ">Create  Permission</button>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- End create Permission -->

<!-- View Permission -->
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
                    <label for="">Name permission :</label>
                    <b id="ti"/>
                </div>
                <div class="form-group">
                    <label for="">Guard_name :</label>
                    <b id="by"/>
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
            <form action="{{ route('permissions.destroy','name') }}" method="post">
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
        var name = button.data('myname')
        var guard_name = button.data('myguard_name')
        var lk_id = button.data('lkid')
        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #guard_name').val(guard_name);
        modal.find('.modal-body #lk_id').val(lk_id);

    })

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('name'));
        $('#by').text($(this).data('guard_name'));
        $('.modal-title').text('Show Permission');
    });
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



                if(confirm("Are you sure, you want to delete the selected administrator ?")){



                    var strIds = idsArr.join(",");



                    $.ajax({

                        url: "{{ route('permission.multiple-delete') }}",

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
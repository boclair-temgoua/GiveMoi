@extends('inc.admin._main')
@section('title', '- all administrators')
@section('sectionTitle', 'Administrators')
@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">tag_faces</i>
                        </div>
                        <h4 class="card-title">
                            <b>All Administrators</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            @if(auth()->user()->can('create-administrator'))
                            <div class="submit text-center">
                                <a href="{{route('administrators.create')}}" class="btn btn-warning btn-raised btn-round">
                                    <i class="material-icons">person_add</i>
                                    <b>Create New Administrator</b>
                                </a>
                            </div>
                            @endif
                            <br>
                            @if(auth()->user()->can('delete-multiple-administrator'))
                            <button class="btn btn-danger btn-raised btn-round delete-all "
                                    data-url="">
                                <i class="material-icons">delete_forever</i>
                                <b>Delete Selection</b>
                            </button>
                            @endcan
                            <!-- Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <br>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        @if(auth()->user()->can('delete-multiple-administrator'))
                                        <th><b></b></th>
                                        @endif
                                        <th><b>Name</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Profile</b></th>
                                        <th><b>Age</b></th>
                                        <th><b>Sex</b></th>
                                        <th><b>Roles</b></th>
                                        @can('edited_by-admin-administrator')
                                        <th><b>Edited by</b></th>
                                        @endcan
                                        <th class="disabled-sorting text-right"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    @if(auth()->user()->can('delete-multiple-administrator'))
                                    <th></th>
                                    @endif
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Roles</th>
                                    @can('edited_by-admin-administrator')
                                    <th><b>Edited by</b></th>
                                    @endcan
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                             @if(count($admins) > 0)
                                @foreach($admins as $lk)
                                <tr id="tr_{{$lk->id}}">
                                    @if(auth()->user()->can('delete-multiple-administrator'))
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
                                    @endif
                                    <td>{!! str_limit($lk->name, 16,'...') !!}</td>
                                    <td class="text-warning">{!! str_limit($lk->email, 14,'...') !!}</td>
                                    <td><img src="{{ URL::to($lk->avatar) }}?{{ time() }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                    <td><b>{{ $lk->age}} ans</b></td>
                                    <td>{{ $lk->gender}}</td>
                                    <td>
                                        @foreach ($lk->roles()->pluck('name') as $role)
                                        <span class="badge badge-{{ $lk->color_name }} badge-pill"><b>{{ $role }}</b></span>
                                        @endforeach
                                    </td>

                                    @can('edited_by-admin-administrator')
                                    <th>{!! str_limit($lk->admin_id, 16,'...') !!}</th>
                                    @endcan
                                    <td class="td-actions text-right">

                                        @if(auth()->user()->can('view-administrator'))
                                        <a href="{{ route('administrators.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        @endif

                                        <a href="{{ route('administrators.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>

                                        @if(auth()->user()->can('delete-administrator'))
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                        @endif
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
            <form action="{{ route('administrators.destroy',$lk->id) }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Administrator?
                    <input type="hidden" name="admin_id" id="cat_id" value=" ">
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
                alert("Please select at least one record to delete.");
            }  else {

                if(confirm("Are you sure, you want to delete the selected administrator ?")){
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('administrator.multiple-delete') }}",
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
@extends('inc.admin._main')
@section('title', '- Admin work with us')
@section('sectionTitle', 'Work with us')
@section('style')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        @can('all-contact_message')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">email</i>
                        </div>
                        <h4 class="card-title">
                            <b>All work with us</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <br>
                        @can('delete-multiple-contact_message')
                        <div class="submit text-center">
                            <button class="btn btn-rose btn-raised btn-round delete-all "
                                    data-url="">
                                <i class="material-icons">delete_forever</i>
                                <b>Delete select</b>
                            </button>
                        </div>
                        @endcan
                        <br>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    @can('delete-multiple-contact_message')
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input checkbox" type="checkbox"  id="check_all">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    @endcan
                                    <th><b>Name</b></th>
                                    <th><b>Email</b></th>
                                    <th><b>Work</b></th>
                                    <th><b>Reception date</b></th>
                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    @can('delete-multiple-contact_message')
                                    <th></th>
                                    @endcan
                                    <th><b>Name</b></th>
                                    <th><b>Email</b></th>
                                    <th><b>Work</b></th>
                                    <th><b>Reception date</b></th>
                                    <th class="text-right"><b>Actions</b></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($works as $lk)
                                <tr id="tr_{{$lk->id}}">
                                    @can('delete-multiple-contact_message')
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
                                    <td>{!! str_limit( $lk->name, 14,'...') !!}</td>
                                    <td>{!! str_limit($lk->email, 26,'...') !!}</td>
                                    <td><b>{!! $lk->speciality_name !!}</b></td>
                                    <td>{!! \Carbon\Carbon::parse($lk->updated_at)->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y , \<\s\t\r\o\n\g\>H\</\s\t\r\o\n\g\>:i:s') !!}</td>
                                <td class="td-actions text-right">
                                    @can('view-contact_message')
                                    <a href="#" class="show-modal btn btn-link  btn-info btn-round btn-just-icon"
                                       data-id="{!! htmlspecialchars_decode($lk->id) !!}"
                                       data-name="{!! htmlspecialchars_decode($lk->name) !!}"
                                       data-email="{!! htmlspecialchars_decode( $lk->email) !!}"
                                       data-speciality_name="{!! htmlspecialchars_decode(  $lk->speciality_name) !!}" title="Show speciality">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    @endcan

                                    @can('delete-contact_message')
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
        @else
        <div class="submit text-center">
            @include('inc.admin.components.alert_permission')
        </div>
        @endcan
        <!-- end row -->
    </div>
</div>

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
                    <label for="">Name :</label>
                    <b id="na"/>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <b id="em"/>
                </div>
                <div class="form-group">
                    <label for="">Speciality :</label>
                    <b id="sp"/>
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
            <form action="{{ route('delete_work','slug') }}" method="post">
                {{ csrf_field() }}

                <div class="modal-body">
                    Are you sure you want to delete this Want to work?
                    <input type="hidden" name="work_id" id="cat_id" value=" ">
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

    //Delete function
    $('#delete').on('show.bs.modal', function (event) {

        $('.modal-title').text('Delete Contact message');
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

    });

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#na').text($(this).data('name'));
        $('#em').text($(this).data('email'));
        $('#sp').text($(this).data('speciality_name'));
        $('.modal-title').text('Show message Works us');
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
                if(confirm("Are you sure, you want to delete the selected message work?")){
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('work.multiple-delete') }}",
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


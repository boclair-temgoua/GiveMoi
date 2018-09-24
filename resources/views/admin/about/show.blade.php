@extends('inc.admin._main')
@section('title','- Admin about')
@section('sectionTitle', 'About Members')



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
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title"><b>All Team Member</b></h4>
                    </div>
                    <div class="card-body">

                        <div class="toolbar">
                            @can('create-about')
                            <div class="submit text-center">
                                <a href="{{route('about.create')}}" class="btn btn-rose btn-raised btn-round">
                                    <i class="material-icons">person_outline</i>
                                    <b>Add New Member</b></a>
                            </div>
                            @endcan
                            <br>
                            @can('delete-multiple-about')
                            <button class="btn btn-danger btn-raised btn-round delete-all"
                                    data-url="">
                                <i class="material-icons">delete_forever</i>
                                <b>Delete select</b>
                            </button>
                            @endcan
                            <!-- Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <br>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        @can('delete-multiple-about')
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
                                        <th><b>Body</b></th>
                                        <th>
                                            @can('unpublish-about')
                                            @can('publish-about')
                                            <b>Status</b>
                                            @endcan
                                            @endcan
                                        </th>
                                        <th><b>Update Date</b></th>
                                        <th><b>Image</b></th>
                                        @can('edited_by-about')
                                        <th><b>Edit by</b></th>
                                        @endcan
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        @can('delete-multiple-about')
                                        <th><b></b></th>
                                        @endcan
                                        <th><b>Name</b></th>
                                        <th><b>Body</b></th>
                                        <th>
                                            @can('unpublish-about')
                                            @can('publish-about')
                                            <b>Status</b>
                                            @endcan
                                            @endcan
                                        </th>
                                        <th><b>Update Date</b></th>
                                        <th><b>Image</b></th>
                                        @can('edited_by-about')
                                        <th><b>Edit by</b></th>
                                        @endcan
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($abouts as $lk)
                                <tr id="tr_{{$lk->id}}">
                                    @can('delete-multiple-about')
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
                                    <td>{!! str_limit( $lk->fullname, 6,'...') !!}</td>
                                    <td>{!! str_limit($lk->body, 16,'...') !!}</td>
                                    <td>
                                        @if($lk->status==1)
                                        @can('unpublish-about')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info"><b>Active</b></span>
                                        </div>
                                        @endcan

                                        @else

                                        @can('publish-about')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger"><b>Deactive</b></span>
                                        </div>
                                        @endcan
                                        @endif
                                    </td>
                                    <td>{!! str_limit( \Carbon\Carbon::parse($lk->updated_at)->diffForHumans(), 30,'...') !!}</td>
                                    <td><img src="{{ URL::to('assets/img/about/' .$lk->image) }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                    @can('edited_by-about')
                                    <th>{!! str_limit($lk->name, 16,'...') !!}</th>
                                    @endcan
                                    <td class="td-actions text-right">


                                        @if($lk->status==1)
                                        @can('unpublish-about')
                                        <a href="{{ route('unactive_about',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le Membre">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan

                                        @else
                                        @can('publish-about')
                                        <a href="{{ route('active_about',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la Membre">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @endif



                                        <a href="{{ route('about.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " >
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        @can('edit-about')
                                        <a href="{{ route('about.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan

                                        @can('delete-about')
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
                <!-- @component('inc.admin.components.who')

                @endcomponent -->
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
            <form action="{{ route('about.destroy','slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <b>Are you sure you want to delete this Member?</b>
                    <input type="hidden" name="about_id" id="cat_id" value=" ">
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



                if(confirm("Are you sure, you want to delete the selected about member ?")){



                    var strIds = idsArr.join(",");



                    $.ajax({

                        url: "{{ route('about.multiple-delete') }}",

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

@extends('inc.admin._main')
@section('title', '- Testimonials')
@section('sectionTitle', 'Testimonials')
@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">
                            <b>All Testimonials</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--  Here you can write extra buttons/actions for the toolbar -->
                            @can('create-testimonial')
                            <div class="submit text-center">
                                <a href="{{route('testimonial.create')}}" class="btn btn-warning btn-raised btn-round ">
                                    <i class="material-icons">question_answer</i>
                                    <b>Add New Testimonial</b>
                                </a>
                            </div>
                            @endcan
                            <br>
                            @can('delete-multiple-testimonial')
                            <div class="submit text-left">
                                <button class="btn btn-danger btn-raised btn-round delete-all "
                                        data-url="">
                                    <i class="material-icons">delete_forever</i>
                                    <b>Delete Selection</b>
                                </button>
                            </div>
                            @endcan
                        </div>
                        <br>

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        @can('delete-multiple-testimonial')
                                        <th><b></b></th>
                                        @endcan
                                        <th><b>Full name</b></th>
                                        <th><b>Body</b></th>
                                        <th>
                                            @can('unpublish-testimonial')
                                            @can('publish-testimonial')
                                            <b>Status</b>
                                            @endcan
                                            @endcan
                                        </th>
                                        <th><b>Ceate Date</b></th>
                                        <th><b>Image</b></th>
                                        @can('edited_by-testimonial')
                                        <th><b>Edit by</b></th>
                                        @endcan
                                        <th class="disabled-sorting text-right"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                         @can('delete-multiple-testimonial')
                                            <th><b></b></th>
                                            @endcan
                                            <th><b>Full name</b></th>
                                            <th><b>Body</b></th>
                                            <th>
                                                @can('unpublish-testimonial')
                                                @can('publish-testimonial')
                                                <b>Status</b>
                                                @endcan
                                                @endcan
                                            </th>
                                            <th><b>Ceate Date</b></th>
                                            <th><b>Image</b></th>
                                            @can('edited_by-testimonial')
                                            <th><b>Edit by</b></th>
                                            @endcan
                                            <th class="text-right"><b>Actions</b></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($testimonials as $lk)
                                <tr>
                                    @can('delete-multiple-testimonial')
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
                                    <td>{!! str_limit($lk->fullname, 6,'...') !!}</td>
                                    <td>{!! str_limit($lk->body, 6,'...') !!}</td>
                                    <td>
                                        @if($lk->status==1)
                                        @can('unpublish-testimonial')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info"><b>Active</b></span>
                                        </div>
                                        @endcan

                                        @else

                                        @can('publish-testimonial')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger"><b>Desactive</b></span>
                                        </div>
                                        @endcan
                                        @endif
                                    </td>

                                    <td>{!! str_limit( \Carbon\Carbon::parse($lk->updated_at)->diffForHumans(), 10,'...') !!}</td>

                                    <td><img src="{{ URL::to('assets/img/testimonial/' .$lk->image) }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>

                                    @can('edited_by-testimonial')
                                    <td>{!! str_limit($lk->name, 16,'...') !!}</td>
                                    @endcan
                                    <td class="td-actions text-right">
                                        @if($lk->status==1)
                                        @can('unpublish-testimonial')
                                        <a href="{{ route('unactive_testimonial',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan

                                        @else

                                        @can('publish-testimonial')
                                        <a href="{{ route('active_testimonial',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @endif

                                        <a href="#" class="show-modal btn btn-link  btn-info btn-round btn-just-icon"
                                           data-id="{{$lk->id}}"
                                           data-fullname="{{ $lk->fullname}}"
                                           data-role="{{ $lk->role}}"
                                           data-body="{{ $lk->body}}" title="Show testimonial">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <!--
                                        <a href="{{ route('testimonial.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        -->
                                        @can('edit-testimonial')
                                        <a href="{{ route('testimonial.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>
                                        @endcan


                                        @can('delete-testimonial')
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
           <!-- @component('inc.admin.components.who')

            @endcomponent-->

            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
{{-- Modal Form Show Testimonial --}}
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Fullname :</label>
                    <b id="ti"/>
                </div>
                <div class="form-group">
                    <label for="">Role :</label>
                    <b id="ro"/>
                </div>
                <div class="form-group">
                    <label for="">Body :</label>
                    <b id="bo"/>
                </div>

            </div>
        </div>
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
            <form action="{{ route('testimonial.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Testimonial?
                    <input type="hidden" name="testimonial_id" id="cat_id" value=" ">
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
<!-- emojionearea -->
<script src="/assets/js/plugins/emojionearea.js"></script>

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

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('fullname'));
        $('#ro').text($(this).data('role'));
        $('#bo').text($(this).data('body'));
        $('.modal-title').text('Show Testimonial');
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



                if(confirm("Are you sure, you want to delete the selected role ?")){



                    var strIds = idsArr.join(",");



                    $.ajax({

                        url: "{{ route('testimonial.multiple-delete') }}",

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
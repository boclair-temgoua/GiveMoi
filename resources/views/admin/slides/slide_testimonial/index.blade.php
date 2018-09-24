@extends('inc.admin._main')
@section('title','- Admin slide testimonial')
@section('sectionTitle', 'Slides Testimonial page')



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
                        <h4 class="card-title">All Slides Testimonial page</h4>
                    </div>
                    <div class="card-body">

                        <div class="toolbar">
                            @can('create-slide')
                            <div class="submit text-center">
                                <a href="{{route('add_slide_testimonial')}}" class="btn btn-rose btn-raised btn-round">
                                    <i class="material-icons">person_outline</i>
                                    <b>Add new slide image</b></a>
                            </div>
                            @endcan

                            <!-- Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <br>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th><b>Image slide</b></th>
                                    <th><b>Status</b></th>
                                    @can('edited_by-slide')
                                    <th><b>Edit by</b></th>
                                    @endcan
                                    <th><b>Created date</b></th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><b>Image slide</b></th>
                                    <th><b>Status</b></th>
                                    @can('edited_by-slide')
                                    <th><b>Edit by</b></th>
                                    @endcan
                                    <th><b>Created date</b></th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($slidestestimonials as $lk)
                                <tr id="tr_{{$lk->id}}">


                                    <td><img src="{{ URL::to('assets/img/slides/'.$lk->slide_testimonial) }}" style="height: 50px; width: 80px" ></td>



                                    <td>
                                        @if($lk->status==1)
                                        @can('unpublish-slide')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info">Slide active</span>
                                        </div>
                                        @endcan

                                        @else
                                        @can('publish-slide')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger">Slide not active</span>
                                        </div>
                                        @endcan
                                        @endif
                                    </td>



                                    @can('edited_by-slide')
                                    <th>{!! str_limit($lk->name, 16,'...') !!}</th>
                                    @endcan
                                    <td>{!! str_limit( \Carbon\Carbon::parse($lk->updated_at)->diffForHumans(), 30,'...') !!}</td>
                                    <td class="td-actions text-right">
                                        @if($lk->status==1)
                                        <a href="{{ route('unactive_slide_testimonial',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Unactive your slide">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_slide_testimonial',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Active your slide">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endif


                                        @can('edit-slide')
                                        <a href="{{ URL::to('/admin/edit-slide-testimonial/'.$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " title="Edit your Slide">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan




                                        @can('delete-slide')
                                        <button type="button"  title="Delete your Slide" class="btn btn-link btn-danger btn-round btn-just-icon "
                                                data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
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


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel"><b>Delete Confirmation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('/admin/delete-slide-testimonial/'.'slug') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <b>Are you sure you want to delete this slide testimonial page ?</b>
                    <input type="hidden" name="slidestestimonial_id" id="cat_id" value="">
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

@endsection

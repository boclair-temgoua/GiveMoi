@extends('inc.admin._main')
@section('title', '- Admin Presentation About ')



@section('style')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">All Presentation</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                            @can('create-presentation')
                            <div class="submit text-center">
                                <a href="{{route('presentation.create')}}" class="btn btn-warning btn-raised btn-round">Add new presentation </a>
                            </div>
                            @endcan
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th><b>Title</b></th>
                                    <th><b>Body</b></th>
                                    <th><b>Icon</b></th>
                                    <th>

                                        @can('unpublish-presentation')
                                        @can('publish-presentation')
                                        <b>Status</b>
                                        @endcan
                                        @endcan

                                    </th>
                                    <th><b>Image</b></th>
                                    <th><b>Edit by</b></th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><b>Title</b></th>
                                    <th><b>Body</b></th>
                                    <th><b>Icon</b></th>
                                    <th>

                                        @can('unpublish-presentation')
                                        @can('publish-presentation')
                                        <b>Status</b>
                                        @endcan
                                        @endcan

                                    </th>
                                    <th><b>Image</b></th>
                                    <th><b>Edit by</b></th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($presentations as $lk)
                                <tr>
                                    <td>{!! str_limit($lk->title, 10,'...') !!}</td>
                                    <td>{!! htmlspecialchars_decode(str_limit($lk->body, 10,'...')) !!}</td>
                                    <td><i class="material-icons text-{{ $lk->color_slug}}">{{ $lk->icon}}</i></td>
                                    <td>
                                        @if($lk->status==1)
                                        @can('unpublish-presentation')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info">publish</span>
                                        </div>
                                        @endcan

                                        @else

                                        @can('publish-presentation')
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger">unpublish</span>
                                        </div>
                                        @endcan
                                        @endif
                                    </td>

                                    <td><img src="{{ URL::to('assets/img/about/presentation/' .$lk->image) }}" style="height: 40px; width: 80px" ></td>
                                    <td><b>{!! str_limit($lk->name, 16,'...') !!}</b></td>
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        @can('unpublish-presentation')
                                        <a href="{{ route('unactive_presentation',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @else
                                        @can('publish-presentation')
                                        <a href="{{ route('active_presentation',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @endif


                                        @can('view-presentation')
                                        <a href="{{ route('presentation.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " >
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        @endcan
                                        @can('edit-presentation')
                                        <a href="{{ route('presentation.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan

                                        @can('delete-presentation')
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
            <form action="{{ route('presentation.destroy','slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <b>Are you sure you want to delete this Presentation?</b>
                    <input type="hidden" name="presentation_id" id="cat_id" value=" ">
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
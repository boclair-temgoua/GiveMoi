@extends('inc.admin._main')
@section('title', '- Conditions and Terms ')
@section('sectionTitle', 'Terms And Conditions')
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
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">indeterminate_check_box</i>
                        </div>
                        <h4 class="card-title">
                            <b>Conditions Utilisation</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                            @if(auth()->user()->can('create-condition_utilisation'))
                            <div class="submit text-center">
                                <a href="{{route('conditions.create')}}" class="btn btn-rose btn-raised btn-round">
                                    <i class="material-icons">branding_watermark</i>
                                    <b>Conditions and terms create</b>
                                </a>
                            </div>
                            @endif
                            <!-- Here you can write extra buttons/actions for the toolbar  -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th><b>Title</b></th>
                                    <th><b>Body</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Image</b></th>
                                    @if(auth()->user()->can('edited_by-condition_utilisation'))
                                    <th><b>Edited by</b></th>
                                    @endif
                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><b>Title</b></th>
                                    <th><b>Body</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Image</b></th>
                                    @if(auth()->user()->can('edited_by-condition_utilisation'))
                                    <th><b>Edited by</b></th>
                                    @endif
                                    <th class="text-right"><b>Actions</b></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($conditions as $lk)
                                <tr>
                                    <td>{!! htmlspecialchars_decode(str_limit($lk->title, 10,'...'))!!}</td>
                                    <td>{!! htmlspecialchars_decode(str_limit($lk->body, 35,'[...]'))!!}</td>
                                    <td>
                                        @if($lk->status==1)
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info"><b>Active</b></span>
                                        </div>
                                        @else
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger"><b>Deactivate</b></span>
                                        </div>
                                        @endif
                                    </td>
                                    <td><img src="{{ URL::to('assets/img/conditions/' .$lk->cover_image) }}" style="height: 40px; width: 80px" ></td>
                                    @if(auth()->user()->can('edited_by-condition_utilisation'))
                                    <td><b>{!! str_limit($lk->name, 16,'...') !!}</b></td>
                                    @endif
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        @can('unpublish-condition_utilisation')
                                        <a href="{{ route('unactive_condition',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan

                                        @else
                                        @can('publish-condition_utilisation')
                                        <a href="{{ route('active_condition',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la couleur">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endcan
                                        @endif
                                        <a href="{{ route('conditions.show',$lk->slug) }}" class="btn btn-link  btn-info btn-round btn-just-icon" target="_blank"><i class="material-icons">visibility</i></a>
                                        @can('edit-condition_utilisation')
                                        <a href="{{ route('conditions.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan

                                        @can('delete-condition_utilisation')
                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon "
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


@include('inc.admin._footer')
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('conditions.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Condition?
                    <input type="hidden" name="condition_id" id="cat_id" value=" ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>

        </div>
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
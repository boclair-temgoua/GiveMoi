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
                            @include('inc.admin.alert_admin')
                            <div class="submit text-center">
                                <a href="{{route('presentation.create')}}" class="btn btn-rose btn-raised btn-round">Ajouter un nouvelle presentation </a>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Body</th>
                                    <th>Icon & color</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Full name</th>
                                    <th>Body</th>
                                    <th>Icon & color</th>
                                    <th>Status</th>
                                    <th>Image</th>
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
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-info">activé</span>
                                        </div>
                                        @else
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-danger">desactivé</span>
                                        </div>
                                        @endif
                                    </td>

                                    <td><img src="{{ URL::to('assets/img/about/presentation/' .$lk->image) }}" style="height: 40px; width: 80px" ></td>
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        <a href="{{ route('unactive_presentation',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_presentation',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endif


                                        <a href="{{ route('presentation.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        <a href="{{ route('presentation.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>

                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
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
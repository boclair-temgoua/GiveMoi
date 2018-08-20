@extends('inc.admin._main')
@section('title', '- Admin about')



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
                        <h4 class="card-title">All Member Tim</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <a href="{{route('about.create')}}" class="btn btn-rose btn-raised btn-round">Ajouter un nouveau membre</a>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Role</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Image</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Role</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Image</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($abouts as $lk)
                                <tr>
                                    <td>{{ $lk->fullname}}</td>
                                    <td>{{ $lk->role}}</td>
                                    <td>{!! str_limit($lk->body, 16,'...') !!}</td>
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
                                    <td>{{ $lk->created_at->diffForHumans() }}</td>
                                    <td><img src="{{ URL::to('assets/img/about/' .$lk->image) }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        <a href="{{ route('unactive_about',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le Membre">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_about',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la Membre">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @endif


                                        <a href="{{ route('about.show',$lk->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        <a href="{{ route('about.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>

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
                @component('inc.admin.components.who')

                @endcomponent
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
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('about.destroy','slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Member?
                    <input type="hidden" name="about_id" id="cat_id" value=" ">
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




@endsection
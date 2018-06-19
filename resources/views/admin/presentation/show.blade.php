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
                                    <th>Nom Complet</th>
                                    <th>Slug</th>
                                    <th>Icon</th>
                                    <th>Body</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Slug</th>
                                    <th>Icon</th>
                                    <th>Body</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($presentations as $item)
                                <tr>
                                    <td>{{ $item->title}}</td>
                                    <td>{{ $item->slug}}</td>
                                    <td><i class="material-icons text-{{ $item->color}}">{{ $item->icon}}</i></td>
                                    <td>{{ str_limit($item->body, 33,'...') }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('presentation.show',$item->id) }}" class="btn btn-link  btn-info btn-round btn-just-icon " ><i class="material-icons">visibility</i></a>
                                        <a href="{{ route('presentation.edit',$item->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>

                                        <button type="button" class="btn btn-link btn-danger btn-round btn-just-icon " data-toggle="modal" data-target="#delete" data-catid="{{ $item->id }}">
                                            <i class="material-icons">close</i>
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
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('presentation.destroy','slug') }}" method="post" accept-charset="UTF-8">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Member?
                    <input type="hidden" name="presentation_id" id="cat_id" value=" ">
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
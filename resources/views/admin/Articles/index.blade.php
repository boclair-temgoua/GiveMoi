@extends('inc.admin._main')
@section('title', '- All Articles')
@section('sectionTitle', 'Articles')
@section('style')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                @include('inc.admin.alert_admin')
                
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">more_horiz</i>
                        </div>
                        <h4 class="card-title"><b>All Article</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round" data-toggle="modal"
                                        data-target="#createModal">
                                    <span class="btn-label">
                                        <i class="material-icons">redeem</i>
                                    </span>  
                                    <b>Create New Article</b>
                                </button>
                            </div>
                            <!-- Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table tabled-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><b>Posted by</b></th>
                                        <th><b>Title</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Categories</b></th>
                                        <th><b>Counter Reads</b></th>
                                        <th class="disabled-sorting text-right"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Posted by</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Categories</th>
                                        <th>Counter Reads</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($articles as $lk)
                                    <tr>
                                        <td>{{ $lk->user->username }}</td>
                                        <td>{{ $lk->title}}</td>
                                        <td>{!! $lk->status? '<b style="color: #55B559">Posted</b>' : '<b style="color: red">Non posted</b>' !!}</td>
                                        <td>{!! $lk->status? '<b style="color: #55B559">Posted</b>' : '<b style="color: red">Non posted</b>' !!}</td>
                                        <td>{{ Counter::showAndCount('article', $lk->slug) }} </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('topic.articles',$lk->slug) }}" class="btn btn-link  btn-info btn-round btn-just-icon" target="_blank">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('articles.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon">
                                            <i class="material-icons">mode_edit</i>
                                            </a>

                                            <button type="button" class="btn btn-link  btn-danger btn-round btn-just-icon "
                                                    data-toggle="modal" data-target="#delete" data-catid="{{ $lk->id }}">
                                                <i class="material-icons">delete</i>
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

<!-- End Update Tag -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel"><b>Delete Confirmation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('articles.destroy','slug') }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    Are you sure you want to delete this Article?
                    <input type="hidden" name="article_id" id="cat_id" value=" ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                    <button type="submit" class="btn btn-danger"><b>Yes, Delete</b></button>
                </div>
            </form>

        </div>
    </div>
</div>
@include('inc.admin._footer')
@endsection

@section('script')
<script type="text/javascript">
    function setFormValidation(id){
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement : function(error, element) {
                $(element).append(error);
            },
        });
    }

    $(document).ready(function(){
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>

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
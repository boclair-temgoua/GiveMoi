@extends('inc.admin._main')
@section('title', '- Testimonials')



@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
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
                        <h4 class="card-title">All Testimonials</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <div class="submit text-center">
                                <a href="{{route('testimonial.create')}}" class="btn btn-warning btn-raised btn-round ">Créer un Temoignage</a>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Role</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Updated_at</th>
                                    <th>Image</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Full name</th>
                                    <th>Role</th>
                                    <th>Body</th>
                                    <th>Status </th>
                                    <th>Updated_at</th>
                                    <th>Image</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($testimonials as $lk)
                                <tr>
                                    <td>{{ $lk->fullname}}</td>
                                    <td>{{ $lk->role}}</td>
                                    <td>{!! str_limit($lk->body, 10,'...') !!}</td>
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
                                    <td><img src="{{ URL::to('assets/img/testimonial/' .$lk->image) }}" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                    <td class="td-actions text-right">

                                        @if($lk->status==1)
                                        <a href="{{ route('unactive_testimonial',$lk->id) }}" class="btn btn-link btn-info btn-round btn-just-icon " title="Désactiver le temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_testimonial',$lk->id) }}" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activer la temoignage">
                                            <i class="material-icons">power_settings_new</i>
                                        </a>
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
                                        <a href="{{ route('testimonial.edit',$lk->id) }}" class="btn btn-link  btn-success btn-round btn-just-icon " ><i class="material-icons">edit</i></a>

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
            @component('inc.admin.components.who')

            @endcomponent
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
                <h5 class="modal-title" id="deleteLabel">Delete Confirmation</h5>
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



@endsection
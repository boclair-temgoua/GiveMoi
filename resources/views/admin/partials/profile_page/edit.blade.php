@extends('inc.admin._main')
@section('title','- Admin profiles page')
@section('sectionTitle', 'Profiles page')



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
                            <i class="material-icons">perm_media</i>
                        </div>
                        <h4 class="card-title"><b>All profile page</b></h4>
                    </div>
                    <div class="card-body">


                        {!! Form::model($profile,['files'=> 'true', 'class' => 'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover about</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover contact</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover login</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover register</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover reset-password</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 ml-auto mr-auto">
                                <div class="profile text-center">
                                    <br>
                                    <div class="fileinput fileinput-new text-center"
                                         data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                            <img src=" " alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                <span class="fileinput-new" style="cursor: pointer">
                                                    <i class="material-icons">insert_photo</i>
                                                    <b>Edit cover testimonial</b></span><span class="fileinput-exists" style="cursor: pointer">
                                                    <i class="material-icons">photo_library</i>
                                                    <b>Change</b></span>
                                                <input id="avatar" type="file" class="form-control" name="avatar">
                                            </span>
                                            <br/>
                                            <a href="#"
                                               class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                                <b>Remove</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                </div>
                            </div>




                        </div>
                        {!! Form::close() !!}




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

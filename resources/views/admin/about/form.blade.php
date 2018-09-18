




<div class="card-body ">
    <div class="tab-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label for="name"  class="bmd-label-floating">Full name</label>
                    {!! Form::text('fullname', null, ['id'=>'fullname','class' => 'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                    @if ($errors->has('fullname'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('fullname') }}</strong></span>
                    @endif

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="slug"  class="bmd-label-floating">Role</label>
                    {!! Form::text('role', null, ['id'=>'role','class' => 'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                    @if ($errors->has('role'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('role') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="name"  class="bmd-label-floating">Facebook username </label>
                    {!! Form::text('fblink', null, ['id'=>'fblink','class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="slug"  class="bmd-label-floating">Instagram username</label>
                    {!! Form::text('instlink', null, ['id'=>'instlink','class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="slug"  class="bmd-label-floating">Linkedin username</label>
                    {!! Form::text('linklink', null, ['id'=>'linklink','class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile text-center">
                    <br>
                    <div class="fileinput fileinput-new text-center"
                         data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle img-raised">
                            <img src="{{ asset('assets/img/about/' .$about->image) }}" alt="...">

                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                        <div>
                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                <span class="fileinput-new" style="cursor: pointer">
                                    <i class="material-icons">insert_photo</i>
                                    <b>Add Photo</b></span><span class="fileinput-exists" style="cursor: pointer">
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
        </div>

    </div>
        <br>
        <br>
        <div class="col-md-12 col-sm-6 ml-auto mr-auto">
            <div class="form-group">
                <label>About Me</label>
                <br>
                <textarea class="form-control" id="article-ckeditor" name="body" type="text" rows="5" cols="80" >{{ ($errors->any()? old('body') : $about->body) }}</textarea>
            </div>
        </div>
        <!-- <div class="tab-pane" id="settings">
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>About Me</label>
                                <div class="form-group">
                                    {!! Form::textarea('body', null, ['id'=>'ckeditor','class' => 'form-control', 'placeholder' => 'Tell something about you ....']) !!}
                                 </div>
                         </div>
                     </div>
                    </div>
              </div> -->
   </div>
</div>

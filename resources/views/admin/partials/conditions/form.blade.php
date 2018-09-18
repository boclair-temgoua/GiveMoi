



    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="bmd-label-floating">{{ __('Title')}}</label>
        {!! Form::text('title', null, ['id'=>'title','class' => 'form-control', 'placeholder' => '']) !!}
        @if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <div class="profile text-center">
                <br>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="{{ url('assets/img/conditions/' .$condition->cover_image) }}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                        <span class="btn btn-raised btn-round btn-info btn-file">
                            <span class="fileinput-new">
                                <i class="material-icons">insert_photo</i>
                                <b>Select Image</b>
                            </span>
                            <span class="fileinput-exists">
                                <i class="material-icons">photo_library</i>
                                <b>Change</b>
                            </span>
                            {!! Form::file('cover_image', null, ['id'=>'cover_image','class' => 'form-control', 'placeholder' => '']) !!}
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>
                            <b>Remove</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12 ml-auto mr-auto">
        {!! Form::textarea('body', null, ['id'=>'ckeditor','class' => 'form-control', 'placeholder' => '']) !!}
        @if ($errors->has('body'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
        @endif
    </div>

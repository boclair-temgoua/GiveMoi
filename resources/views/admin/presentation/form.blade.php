


<div class="card-body ">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="name"  class="bmd-label-floating">Service</label>
                {!! Form::text('title', null, ['id'=>'title','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                @if ($errors->has('title'))
                <span class="help-block"><strong class="text-danger">{{ $errors->first('title') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="slug"  class="bmd-label-floating">Icon Materialise disigne</label>
                {!! Form::text('icon', null, ['id'=>'icon','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                @if ($errors->has('icon'))
                <span class="help-block"><strong class="text-danger">{{ $errors->first('icon') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="col-sm-4">

            {!! Form::select('color_id', old('color_id') ? old('color_id') : App\Model\user\partial\color::pluck('slug','id'),null, ['data-style'=>'select-with-transition', 'class' => 'selectpicker', 'required' => '','title'=> '' ]) !!}
            @if ($errors->has('color_id'))
            <span class="help-block">
                <strong class="text-danger ">{{ $errors->first('color_id') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <div class="profile text-center">
                <br>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="{{ url('assets/img/about/presentation/' .$presentation->image) }}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                       <span class="btn btn-raised btn-round btn-info btn-file">
                           <span class="fileinput-new">
                               <i class="material-icons">picture_in_picture</i>
                               <b>Select Image</b>
                           </span>
                           <span class="fileinput-exists">
                               <i class="material-icons">photo_library</i>
                               <b>Change</b>
                           </span>
                           <input id="image" type="file" class="form-control" name="image">
                       </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                            <i class="fa fa-times"></i>
                            <b>Remove</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
        <div class="form-group">
            <label>About Me</label>
            <br>
            <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ ($errors->any()? old('body') : $presentation->body) }}</textarea>
        </div>
    </div>
</div>

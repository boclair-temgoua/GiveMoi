


<div class="card-body ">
    <div class="row">
        <div class="col-sm-4 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="name"  class="bmd-label-floating">Service</label>
            <input type="text" class="form-control" name="title" id="title"  value="{{ ($errors->any()? old('title') : $presentation->title) }}" minLength="3" />
            @if ($errors->has('title'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>
        <div class="col-sm-4 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="slug"  class="bmd-label-floating">Icon Materialise disigne</label>
            <input type="text" class="form-control" name="icon"  id=icon  value="{{ ($errors->any()? old('icon') : $presentation->icon) }}" minLength="2"  />
            @if ($errors->has('icon'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('icon') }}</strong>
            </span>
            @endif
        </div>

        <div class="col-sm-4">
            <select class="selectpicker " data-style="select-with-transition" title="Choose color"  data-size="7" name="color_id" >
                <option disabled>Choose color</option>
                @if(count($colors) > 0)
                @foreach($colors as $item)



                <option value="{{ $item->id }}"


                >{{ $item->slug}}


                </option>



                @endforeach
                @endif
            </select>
            @if ($errors->has('color_id'))
            <span class="help-block">
                <strong class="text-danger ">{{ $errors->first('color_id') }}</strong>
            </span>
            @endif
        </div>
        <!--
        <div class="col-sm-4">
            <select class="selectpicker " data-style="select-with-transition" title="Choose color"  data-size="7" name="color_id" >
                <option disabled>Choose color</option>
                @if(count($colors) > 0)
                @foreach($colors as $item)
                <option value="{{ ($errors->any()? old('id') : $item->id) }}" >{{ $item->slug}}</option>
                @endforeach
                @endif
            </select>
            @if ($errors->has('color_id'))
            <span class="help-block">
                <strong class="text-danger ">{{ $errors->first('color_id') }}</strong>
            </span>
            @endif
        </div>
        -->
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
                           <span class="fileinput-new">Select image</span>
                           <span class="fileinput-exists">Change</span>
                           <input id="image" type="file" class="form-control" name="image">
                       </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12 ml-auto mr-auto">

        <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ ($errors->any()? old('body') : $presentation->body) }}</textarea>
    </div>
</div>
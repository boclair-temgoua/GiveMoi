







<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
        <div class="profile text-center">
            <br>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    <img src="{{ url('assets/img/about/'.$slidesabout->slide_about) }}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-raised btn-round btn-warning btn-file">
                          <span class="fileinput-new" style="cursor: pointer">
                              <i class="material-icons">insert_photo</i>
                              <b>Select image slide</b></span><span class="fileinput-exists" style="cursor: pointer">
                              <i class="material-icons">photo_library</i>
                              <b>Change</b></span>
                          <input id="slide_about" type="file" class="form-control" name="slide_about">
                      </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
            </div>
        </div>
        @if ($errors->has('slide_image'))
        <span class="help-block">
            <strong class="text-danger text-center">{{ $errors->first('slide_image') }}</strong>
        </span>
        @endif
    </div>
</div>

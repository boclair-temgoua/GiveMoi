



    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }} label-floating bmd-form-group">
        <label class="form-control-label bmd-label-floating" for="exampleBlogPost">Update your comment...</label>
        <textarea class="form-control" name="comment" rows="7" id="exampleBlogPost"></textarea>
        @if ($errors->has('comment'))
        <span class="help-block">
               <strong class="text-danger text-center">{{ $errors->first('comment') }}</strong>
            </span>
        @endif
    </div>


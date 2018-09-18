        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="display_name"  class="bmd-label-floating"></label>
            <input type="text" class="form-control" name="name"  id="name" minLength="3" placeholder="Category Name" required="true"/>
            @if ($errors->has('name'))
            <span class="help-block">
                        <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description"  class="bmd-label-floating"></label>
            <input type="text" class="form-control" name="slug"  id="slug" placeholder="slug (Pas tres important)" minLength="3" disabled/>
            @if ($errors->has('description'))
            <span class="help-block">
                       <strong class="text-danger text-center">{{ $errors->first('description') }}</strong>
                    </span>
            @endif
        </div>

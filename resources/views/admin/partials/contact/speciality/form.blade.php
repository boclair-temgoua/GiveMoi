


        <label class="control-label " for="speciality_name"><b>Name Speciality :</b></label>
        <div class="form-group{{ $errors->has('speciality_name') ? ' has-error' : '' }}">
            <input type="name" class="form-control" name="speciality_name"  id="speciality_name" minLength="3" placeholder="Speciality name"/>
            @if ($errors->has('speciality_name'))
            <span class="help-block">
                <strong class="text-danger text-center">{{ $errors->first('speciality_name') }}</strong>
            </span>
            @endif
        </div>
        <label class="control-label" for="slug"><b>Slug :</b></label>
        <div class="form-group">
            <input type="name" class="form-control" name="slug"  id="slug" placeholder="slug (Pas tres important)" minLength="3" disabled/>
        </div>

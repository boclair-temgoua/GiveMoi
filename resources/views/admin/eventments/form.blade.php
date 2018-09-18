

        <label class="control-label " for="color_name"><b>Event name :</b></label>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="name" class="form-control" name="name"  id="name" minLength="3" placeholder="Event "/>
            @if ($errors->has('color_name'))
            <span class="help-block">
                <strong class="text-danger text-center">{{ $errors->first('color_name') }}</strong>
            </span>
            @endif
        </div>
        <label class="control-label" for="slug"><b>Date event :</b></label>
        <div class="form-group">
            {!! Form::text('eventment_date', old('eventment_date'), ['class' => 'form-control datepicker', 'placeholder' => '','id'=>'eventment_date']) !!}
            @if ($errors->has('eventment_date'))
            <span class="help-block">
                <strong class="text-danger text-center">{{ $errors->first('eventment_date') }}</strong>
            </span>
            @endif
        </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name"  class="bmd-label-floating">Name of the Permission</label>
                {!! Form::text('name', null, ['id'=>'exampleInput11','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('guard_name') ? ' has-error' : '' }}">
                <label for="guard_name"  class="bmd-label-floating">Guard_name</label>
                {!! Form::text('guard_name', null, ['id'=>'exampleInput11','class' => 'form-control', 'placeholder' => '', 'required' => '','disabled' => '']) !!}
                @if ($errors->has('guard_name'))
                <span class="help-block">
                    <strong class="text-danger text-center">{{ $errors->first('guard_name') }}</strong>
                </span>
                @endif
            </div>





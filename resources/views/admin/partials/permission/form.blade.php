

            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name"  class="bmd-label-floating"></label>
                <input type="text" class="form-control" name="display_name"  id="display_name" minLength="3" placeholder="Name of the Permission" required="true"/>
                @if ($errors->has('display_name'))
                <span class="help-block">
                    <strong class="text-danger text-center">{{ $errors->first('display_name') }}</strong>
                </span>
                @endif
            </div>

            <!--
            <div class="col-lg-12 col-md-6  col-sm-12">
                <select class="selectpicker" name="for" id="for" data-style="select-with-transition" title="Permission for" data-size="7">
                    <option disabled>Choose Permission</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="other">Other</option>
                </select>
            </div>
            -->


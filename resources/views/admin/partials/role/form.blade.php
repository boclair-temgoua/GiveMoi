

<!-- Ajouter les Role au fur et a meserure de l'agrandissement du projet -->
<div class="row">
    @foreach($permissions as $permission)
    @if($permission->for == 'post')
    <div class="col-4">
        <div class="card-footer text-right">
            <div class="form-check mr-auto">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id}} ">{{$permission->display_name}}
                    <span class="form-check-sign">
                         <span class="check"></span>
                     </span>
                </label>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @foreach($permissions as $permission)
    @if($permission->for == 'user')
    <div class="col-4">
        <div class="card-footer text-right">
            <div class="form-check mr-auto">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id}} ">{{$permission->display_name}}
                    <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                </label>
            </div>
        </div>
    </div>
    @endif
    @endforeach @foreach($permissions as $permission)
    @if($permission->for == 'admin')
    <div class="col-4">
        <div class="card-footer text-right">
            <div class="form-check mr-auto">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id}} ">{{$permission->display_name}}
                    <span class="form-check-sign">
                       <span class="check"></span>
                     </span>
                </label>
            </div>
        </div>
    </div>
    @endif
    @endforeach @foreach($permissions as $permission)
    @if($permission->for == 'other')
    <div class="col-4">
        <div class="card-footer text-right">
            <div class="form-check mr-auto">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id}} ">{{$permission->display_name}}
                    <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                </label>
            </div>
        </div>
    </div>
    @endif
    @endforeach @foreach($permissions as $permission)
    @if($permission->for == 'user')
    <div class="col-4">
        <div class="card-footer text-right">
            <div class="form-check mr-auto">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id}} ">{{$permission->display_name}}
                    <span class="form-check-sign">
                       <span class="check"></span>
                     </span>
                </label>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

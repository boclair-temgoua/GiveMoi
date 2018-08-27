
@hasrole('super-admin')
<div class="submit text-center">
    <button class="btn btn-rose btn-raised btn-warning">
        your super admin
    </button>
</div>
@endhasrole
@hasrole('admin')
<div class="submit text-center">
    <button class="btn btn-warning btn-raised btn-warning">
        your admin
    </button>
</div>
@endhasrole
@hasrole('editor')
<div class="submit text-center">
    <button class="btn btn-success btn-raised ">
        your editor
    </button>
</div>
@endhasrole
@hasrole('moderator')
<div class="submit text-center">
    <button class="btn btn-info btn-raised ">
        your moderator
    </button>
</div>
@endhasrole
@hasrole('advertiser')
<div class="submit text-center">
    <button class="btn btn-primary btn-raised ">
        your advertiser
    </button>
</div>
@endhasrole
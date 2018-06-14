
@if (session('status'))
<div class="alert alert-success">
    <div class="container">
        <div class="alert-icon">
            <i class="material-icons">check</i>
        </div>
        {{ session('status') }}
    </div>
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-with-icon" data-notify="container">
    <i class="material-icons" data-notify="icon">notifications</i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span class="text-center" data-notify="message">{{ session('success') }}</span>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    <div class="container">
        <div class="alert-icon">
            <i class="material-icons">error_outline</i>
        </div>
        {{ session('error') }}
    </div>
</div>
@endif
<div class="clearfix"></div>


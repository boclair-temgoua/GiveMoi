
@if (Auth::guard('admin')->check())
<div class="col-lg-6 cards">
    <div class="card card-pricing card-plain">
        <div class="card-body">
            <h6 class="card-category text-success">The admin account is ON</h6>
            <div class="card-icon text-info">
                <i class="material-icons">power_settings_new</i>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-lg-6 cards">
    <div class="card card-pricing card-plain">
        <div class="card-body">
            <h6 class="card-category text-danger">Admin login Offline</h6>
            <div class="card-icon">
                <i class="material-icons">power_settings_new</i>
            </div>
        </div>
    </div>
</div>
@endif
@if (Auth::guard('web')->check())
<div class="col-lg-6 cards">
    <div class="card card-pricing card-plain">
        <div class="card-body">
            <h6 class="card-category text-success">The user account is ON</h6>
            <div class="card-icon text-info">
                <i class="material-icons">power_settings_new</i>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-lg-6 cards">
    <div class="card card-pricing card-plain">
        <div class="card-body">
            <h6 class="card-category text-danger">The user account is No Active</h6>
            <div class="card-icon">
                <i class="material-icons">power_settings_new</i>
            </div>
        </div>
    </div>
</div>
@endif










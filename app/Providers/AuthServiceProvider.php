<?php

namespace App\Providers;

use App\Model\admin\admin;
use App\Model\user\testimonial;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Model\user\event' => 'App\Policies\EventPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate::define('update-testimonial', function (Admin $admin,Testimonial $testimonial) {
        //    //return $admin->isAdmin();
        //    return $admin->id == $testimonial->admin_id;
        //});
    }
}

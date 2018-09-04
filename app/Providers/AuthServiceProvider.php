<?php

namespace Healthfy\Providers;

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
        'Healthfy\Model' => 'Healthfy\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('patient', function ($user) {
            if($user->role_type_id == 1)
            {
                return true;
            }
            return false;
        });
        Gate::define('Admin', function ($user) {
            if($user->role_type_id == 2)
            {
                return true;
            }
            return false;
        });
         Gate::define('Doctor', function ($user) {
            if($user->role_type_id == 3)
            {
                return true;
            }
            return false;
        });
    }
}

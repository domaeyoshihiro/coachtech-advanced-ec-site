<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return ($user->role == 1);
        });
        Gate::define('representative', function ($user) {
            return ($user->role == 2);
        });
        Gate::define('general', function ($user) {
            return ($user->role == 3);
        });
    }
}

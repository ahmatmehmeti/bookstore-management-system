<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create-orders', function ($user) {
            if (Auth::check()) {
                if (!(Auth::user()->IsPostier() || Auth::user()->IsAdmin())) {
                    return true;
                } else {
                    return false;
                }
            }
        });

        Gate::define('edit-orders', function ($user, $order) {
            if (Auth::check()) {
                if ((Auth::user()->IsAdmin()) || $user->id === $order->created_by
                    || (Auth::user()->IsPostier() && $user->id === $order->postier_id)){
                    return true;
                } else {
                    return false;
                }
            }
        });
    }
}


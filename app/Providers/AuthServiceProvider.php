<?php

namespace App\Providers;

use App\Models\Bro;
use App\Models\User;
use App\Policies\BroPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Bro::class => BroPolicy::class,
        //'App\Models\Bro' => 'App\Policies\BroPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return '\\App\\Policies\\'.class_basename($modelClass).'Policy';
        });
    }
}

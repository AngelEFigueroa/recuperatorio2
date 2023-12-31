<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\Product' => 'App\Policies\ProductPolicy',

    ];


    public function boot(): void
    {
        $this->registerPolicies();

    }
}

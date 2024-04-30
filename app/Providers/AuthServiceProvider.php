<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\PagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Z3d0X\FilamentFabricator\Models\Page;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Page::class => PagePolicy::class,
    ];
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

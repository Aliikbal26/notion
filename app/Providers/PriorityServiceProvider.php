<?php

namespace App\Providers;

use App\Services\Impl\PriorityServiceImpl;
use App\Services\PriorityService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PriorityServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PriorityService::class => PriorityServiceImpl::class
    ];

    public function provides(): array
    {
        return [PriorityService::class];
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

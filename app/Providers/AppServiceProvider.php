<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ParticipantService;
use App\Services\ParticipantServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }
    public function register()
    {
        $this->app->bind(
            ParticipantServiceInterface::class,
            ParticipantService::class
        );
    }
}

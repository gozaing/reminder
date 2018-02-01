<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ParticipantRepositoryInterface;
use App\Repositories\ParticipantRepository;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ParticipantRepositoryInterface::class,
            ParticipantRepository::class
        );
    }
}

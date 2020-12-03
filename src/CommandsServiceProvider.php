<?php

namespace SmartLaravel\Commands;

use Illuminate\Support\ServiceProvider;
use SmartLaravel\Commands\AppSetupCommand;
use SmartLaravel\Commands\AppUpdateCommand;
use SmartLaravel\Commands\ClearUnverifiedUsersCommand;

class CommandsServiceProvider extends ServiceProvider
{
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                AppSetupCommand::class,
                AppUpdateCommand::class,
                ClearUnverifiedUsersCommand::class,
            ]);
        }
    }
}

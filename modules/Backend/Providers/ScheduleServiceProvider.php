<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->commands([
        ]);
        $this->app->booted(function () {
        });
    }

    public function register()
    {
    }
}

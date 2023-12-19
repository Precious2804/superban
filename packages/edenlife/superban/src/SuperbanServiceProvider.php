<?php

namespace EdenLife\Superban;

use EdenLife\Superban\Console\Commands\InstallSuperban;
use Illuminate\Support\ServiceProvider;

class SuperbanServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/superban.php', 'superban'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/superban.php' => config_path('superban.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSuperban::class,
            ]);
        }
    }
}

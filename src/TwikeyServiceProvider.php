<?php

namespace Appstract\LaravelTwikey;

use Appstract\Twikey\Connection;
use Appstract\Twikey\Twikey;
use Illuminate\Support\ServiceProvider;

class TwikeyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/twikey.php' => config_path('twikey.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/twikey.php', 'twikey');

        $this->app->bind('twikey', function ($app) {
            $connection = new Connection();

            $connection->setApiUrl(config('twikey.api_url'));
            $connection->setApiToken(config('twikey.api_token'));
            $connection->login();
            $twikey = new Twikey($connection);

            return $twikey;
        });
    }

    /**
     * [provides description].
     * @return [type] [description]
     */
    public function provides()
    {
        return ['twikey'];
    }
}

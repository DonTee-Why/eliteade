<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
        Storage::extend('sftp', function ($app, $config) {
            return new Filesystem(new SftpAdapter($config));
        });
    }
}

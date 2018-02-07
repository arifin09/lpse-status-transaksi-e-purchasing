<?php

namespace Bantenprov\StatusTransaksiEpurchasing;

use Illuminate\Support\ServiceProvider;
use Bantenprov\StatusTransaksiEpurchasing\Console\Commands\StatusTransaksiEpurchasingCommand;

/**
 * The StatusTransaksiEpurchasingServiceProvider class
 *
 * @package Bantenprov\StatusTransaksiEpurchasing
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEpurchasingServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('status-transaksi-e-purchasing', function ($app) {
            return new StatusTransaksiEpurchasing;
        });

        $this->app->singleton('command.status-transaksi-e-purchasing', function ($app) {
            return new StatusTransaksiEpurchasingCommand;
        });

        $this->commands('command.status-transaksi-e-purchasing');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'status-transaksi-e-purchasing',
            'command.status-transaksi-e-purchasing',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('status-transaksi-e-purchasing.php');

        $this->mergeConfigFrom($packageConfigPath, 'status-transaksi-e-purchasing');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'status-transaksi-e-purchasing');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/status-transaksi-e-purchasing'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'status-transaksi-e-purchasing');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/status-transaksi-e-purchasing'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'status-transaksi-e-purchasing-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'status-transaksi-e-purchasing-public');
    }
}

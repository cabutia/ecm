<?php

namespace Ecm\Providers;

use Ecm\EcmConfig;
use Ecm\Routes\EcmRouter;
use Illuminate\Support\ServiceProvider;

class EcmServiceProvider extends ServiceProvider
{
    private $configPath = '/Config';
    private $viewPath = '/Views';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEcmDefaultConfig();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerEcmConfig();
        $this->registerEcmViews();
        $this->registerEcmRoutes();
    }


    /**
     * @return void
     */
    private function registerEcmConfig() : void
    {
        $configFiles = [];
        foreach (EcmConfig::ConfigFiles as $internal => $external) {
            $path = __DIR__ . '/../' . EcmConfig::ConfigPath . '/';
            $configFiles[$path . $internal] = config_path($external . '.php');
        }
        $this->publishes($configFiles);
    }

    /**
     * @return void
     */
    private function registerEcmDefaultConfig() : void
    {
        foreach (EcmConfig::ConfigFiles as $internal => $external) {
            $path = __DIR__ . '/../' . EcmConfig::ConfigPath . '/';
            $this->mergeConfigFrom($path . $internal, $external);
        }
    }

    /**
     * @return void
     */
    private function registerEcmViews() : void
    {
        $this->loadViewsFrom(__DIR__ . '/../' . EcmConfig::ViewPath, EcmConfig::ViewNamespace);
    }

    /**
     * @return void
     */
    private function registerEcmRoutes() : void
    {
        $registrar = require_once __DIR__ . '/../' . EcmConfig::RouteRegistrar;
        foreach ($registrar as $moduleRoutes) {
            $router = new $moduleRoutes;
            $router->register();
        }
    }
}

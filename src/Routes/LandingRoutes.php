<?php

namespace Ecm\Routes;

use Ecm\Controllers\LandingController;

class LandingRoutes extends EcmRouter {

    protected $routes = [
        [
            'name'          => 'landing.index',
            'method'        => 'GET',
            'path'          => '/',
            'controller'    => LandingController::class,
            'action'        => 'index'
        ]
    ];
}

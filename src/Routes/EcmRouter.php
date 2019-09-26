<?php

namespace Ecm\Routes;

use Exception;
use Illuminate\Support\Facades\Route;

class EcmRouter {

    protected $routes;
    protected $requiredFields = [
        'name',
        'path',
        'action',
        'method',
        'controller'
    ];

    public function register ()
    {
        foreach ($this->routes as $route) {
            $this->validateRoute($route);
            $method = strtolower($route['method']);
            Route::$method(
                $route['path'],
                $route['controller'] . '@' . $route['action']
            )->name($route['name']);
        }
    }

    private function validateRoute (array $route)
    {
        foreach ($this->requiredFields as $field)
            if (!isset($route[$field]))
                throw new Exception("Route has no " . $field . ': ' . print_r($route, true));

    }
}

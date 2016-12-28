<?php

namespace Core;

use Core\http;
use Core\routes;
use FastRoute;


class Router extends Kernel
{
    private $request;
    private $routes;

    public function __construct()
    {
        $this->request = new Http();
        $this->routes    = new Routes();
    }

    function router(){
        $dispatcher = $this->routes->get();

        $httpMethod = $this->request->getMethod();
        $uri        = $this->request->getUri();

        

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler        = $routeInfo[1];
                $vars           = $routeInfo[2];
                // ... call $handler with $vars
                break;
        }
    }
}
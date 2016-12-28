<?php

namespace Core;

use Core\http;
use Core\routes;
use FastRoute;


class Router extends Kernel
{
    protected $http;
    private $routes;

    public function __construct()
    {
        $this->http = new Http();
        $this->routes    = new Routes();
    }

    function router(){
        $dispatcher = $this->routes->get();

        $httpMethod = $this->http->getMethod();
        $uri        = $this->http->getUri();

        

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                $this->http->response('<h1>Oops - 404 Not Found</h1>', '404');
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                $this->http->response('<h1>Oops - 405 Method Not Allowed</h1>', '405');
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler        = $routeInfo[1];
                $vars           = $routeInfo[2];
                // ... call $handler with $vars
                break;
        }
    }
}
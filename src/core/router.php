<?php

namespace Core;

use Core\http;
use Core\routes;
use App\Controller;
use FastRoute;

class Router extends Kernel
{
    protected $http;
    private $routes;

    public function __construct()
    {
        $this->http   = new Http();
        $this->routes = new Routes();
    }

    function router()
    {
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
                $error = new \App\Controller\exceptions();
                $method = 'error404';
                call_user_func_array(array($error, $method), array());
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                $error = new \App\Controller\exceptions();
                $method = 'error405';
                call_user_func_array(array($error, $method), array());
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler        = $routeInfo[1];
                $vars           = $routeInfo[2];
                list($class, $method) = explode(":", $handler, 2);
                $caller         = new $class;
                call_user_func_array(array($caller, $method), $vars);
                break;
        }
    }
}
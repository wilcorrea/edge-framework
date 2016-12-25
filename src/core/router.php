<?php

namespace Core;

use Core\Http;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

class Router extends \Core\Kernel
{
    protected $request;

    public function __construct()
    {
        $this->request = new \Core\Http();
        
    }

    function add($name, $route, $controller)
    {
        $route  = new Route($route, array('_controller' => $controller));
        $routes = new RouteCollection();
        $routes->add($name, $route);
        $context = new RequestContext($this->request->getUri());
        $matcher = new UrlMatcher($routes, $context);
        $parameters = $matcher->match($route);
    }
}
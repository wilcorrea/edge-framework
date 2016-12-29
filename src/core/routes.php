<?php

namespace Core;

use FastRoute;

class Routes extends Router
{

    function __construct()
    {
        
    }

    function get()
    {
        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/', '\App\Controller\home:dispatch');
            $r->addRoute('GET', '/home', '\App\Controller\home:dispatch');
            $r->addRoute('GET', '/example/pdf', '\App\Controller\home:dispatchPDF');
            $r->addRoute('GET', '/example/json', '\App\Controller\home:dispatchJson');
            $r->addRoute('GET', '/phpinfo', '\App\Controller\home:info');
            $r->addRoute('GET', '/features', '\App\Controller\features:dispatch');
            $r->addRoute('GET', '/docs', '\App\Controller\docs:dispatch');
            $r->addRoute('GET', '/example/users', '\App\Controller\users:get');
            $r->addRoute(['GET', 'POST'], '/example/users/add', '\App\Controller\users:add');
            $r->addRoute('GET', '/example/users/delete', '\App\Controller\users:delete');
        },
            [
            'cacheFile' => 'cache/route.cache', /* required */
        ]);

        return $dispatcher;
    }
}
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
            $r->addRoute('GET', '/features', '\App\Controller\features:dispatch');
            $r->addRoute('GET', '/docs', '\App\Controller\docs:dispatch');
        },
            [
            'cacheFile' => 'cache/route.cache', /* required */
        ]);

        return $dispatcher;
    }
}
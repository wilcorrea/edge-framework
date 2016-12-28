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
            $r->addRoute('GET', '/pdf', '\App\Controller\home:dispatchPDF');
            $r->addRoute('GET', '/json', '\App\Controller\home:dispatchJson');
        },
            [
            'cacheFile' => 'cache/route.cache', /* required */
        ]);

        return $dispatcher;
    }
}
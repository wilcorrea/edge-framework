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
            $r->addRoute('GET', '/id/{id}', '\App\Controller\home:showId');
        },
            [
            'cacheFile' => 'cache/route.cache', /* required */
        ]);

        return $dispatcher;
    }
}
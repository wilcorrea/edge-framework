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
        $routes =  new \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/', 'home');
//            // {id} must be a number (\d+)
//            $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//            // The /{title} suffix is optional
//            $r->addRoute('GET', '/articles/{id:\d+}[/{title}]',
//                'get_article_handler');
        });
    }
}
<?php
namespace Core;

use Core\Router;

class Routes extends \Core\Kernel
{
    public function __construct()
    {
        $router = new Router();
        $router->add('home', '/', 'App:HomeController:Index');
    }
}
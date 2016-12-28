<?php

namespace Core;

use Core\http;
use Core\router;

class Kernel
{
    protected $http;
    protected $router;

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
        
        $this->router = new Router();
        $this->router->router();

    }
}
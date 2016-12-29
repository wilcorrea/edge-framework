<?php

namespace Core;

use Core\router;
use Core\http;

class kernel
{
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
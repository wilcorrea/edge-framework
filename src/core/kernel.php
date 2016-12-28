<?php

namespace Core;

use Core\router;
use Core\http;

class kernel
{
    protected $http;
    protected $router;

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
        $this->http = new Http();
        $this->router = new Router();
        //ob_start();
        $this->router->router();
        //$output       = ob_get_contents();
        //ob_end_clean();
    }
}
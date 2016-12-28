<?php

namespace Core;

use Core\router;

class Kernel
{
    protected $router;

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }

        $this->router = new Router();
        ob_start();
        $this->router->router();
        $output       = ob_get_contents();
        ob_end_clean();
    }
}
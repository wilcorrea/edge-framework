<?php

namespace App\Controller;

use Core\http;
use Core\view;

class main
{
    protected $http;
    protected $view;

    public function __construct()
    {
        $this->http = new http();
        $this->view = new view();
    }
}
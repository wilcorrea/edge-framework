<?php

namespace App\Controller;

use Core\http;
use Core\view;
use Core\db;

class main
{
    protected $http;
    protected $view;
    protected $db;

    public function __construct()
    {
        $this->http = new http();
        $this->view = new view();
        $this->db   = new db();
    }
}
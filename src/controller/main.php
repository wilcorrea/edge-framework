<?php

namespace App\Controller;

use Core\http;

class main 
{
    protected $http;

    public function __construct()
    {
        $this->http = new http();
       
    }

}
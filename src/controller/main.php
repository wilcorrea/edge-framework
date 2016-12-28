<?php

namespace App\Controller;

use Core\http;

class main 
{
    protected $http;

    public function __construct(http $r)
    {
        $this->http = $r;

    }

}
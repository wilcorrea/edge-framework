<?php

namespace App\Controller;

use Core\http;

final class home extends main
{
    
    function __construct()
    {
        parent::__construct();
    }

    function dispatch()
    {
        
        $data = file_get_contents(__DIR__ . '/../view/home.twig') ;
        $this->http->response($data, 200, 'text/html');
        //$data = file_get_contents(__DIR__ . '/../view/home.twig') ;
        //echo $data;die;
        //$this->request->response($data, $status);
    }

    function showId()
    {
        var_dump('oi');
        die;
    }
}
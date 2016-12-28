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
        $data = $this->view->render('home.twig', array("title" => 'Hello!'));
        $this->http->response($data, 200, 'text/html');

        
    }

    function showId()
    {
        var_dump('oi');
        die;
    }
}
<?php

namespace App\Controller;


final class home extends main
{
    protected $http;

    function __construct()
    {
        parent::__construct();
    }

    function dispatch()
    {
        
        //$http = new \Core\http();
        $this->http->response('oi', 200);
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
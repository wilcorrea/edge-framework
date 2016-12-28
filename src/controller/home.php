<?php

namespace App\Controller;

use Core\http;

class home extends main
{
    protected $request;
    protected $response;

    function __construct()
    {
        $this->request = new \Core\Http();
    }

    public function dispatch()
    {
        $data = file_get_contents(__DIR__ . '/../view/home.twig') ;
        echo $data;die;
        //$this->request->response($data, $status);
    }

    public function showId()
    {
        var_dump('oi');
        die;
    }
}
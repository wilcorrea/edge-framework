<?php

namespace App\Controller;

final class exceptions extends main
{

    function __construct()
    {
        parent::__construct();
    }

    function error404()
    {
        $data = $this->view->render('404.twig', array());
        $this->http->response($data);
    }

    function error405()
    {
         $data = $this->view->render('405.twig', array());
        $this->http->response($data);
    }

    function dispatchJson()
    {
        $data = $this->view->render('home.twig', array("title" => 'Hello!'));
        $this->http->responseJson(array("username" => "AnakinSkywalker", "password" => "vadd3r"));
    }
}
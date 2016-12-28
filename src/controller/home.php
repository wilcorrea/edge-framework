<?php

namespace App\Controller;

final class home extends main
{

    function __construct()
    {
        parent::__construct();
    }

    function dispatch()
    {
        $data = $this->view->render('home.twig', array("title" => 'Hello!'));
        $this->http->response($data);
    }

    function dispatchPDF()
    {
        $data = $this->view->render('home.twig', array("title" => 'Hello!'));
        $this->http->responsePDF($data);
    }

    function dispatchJson()
    {
        $data = $this->view->render('home.twig', array("title" => 'Hello!'));
        $this->http->responseJson(array("username" => "AnakinSkywalker", "password" => "vadd3r"));
    }
}
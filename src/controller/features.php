<?php

namespace App\Controller;

final class features extends main
{

    function __construct()
    {
        parent::__construct();
    }

    function dispatch()
    {
        $data = $this->view->render('features.twig', array());
        $this->http->response($data);
    }

}
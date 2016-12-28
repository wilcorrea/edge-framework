<?php

namespace App\Controller;

final class docs extends main
{

    function __construct()
    {
        parent::__construct();
    }

    function dispatch()
    {
        $data = $this->view->render('documentation.twig', array());
        $this->http->response($data);
    }

}
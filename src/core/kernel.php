<?php

namespace Core;

use Core\Http;


class Kernel
{
    protected $view;
    protected $db;

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
        new \Core\Http();
        new \Core\Routes();
        $this->view = $c->get('view');
        $this->db   = $c->get('db');
    }
}
<?php

namespace App\Controller;

class HomeController extends MainController{
    
    function __construct()
    {
        var_dump('oi');
    }

    function dispatch(){
        var_dump('oi');die;
    }
    

}
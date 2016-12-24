<?php
//TODO
namespace Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Http extends Core\Kernel
{
    private $request;
    private $response;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    function index(){

    }

    function get($key){
        return $this->request->query->get($key);
    }

    function post(){
        return $this->request->query->post();
    }

    function json(){

    }


}
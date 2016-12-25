<?php

namespace Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use mPDF;

class Http extends Core\Kernel
{
    private $request;
    private $response;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    function get($key)
    {
        return $this->request->query->get($key);
    }

    function post($key)
    {
        return $request->request->get($key);
    }

    function getServerVars($key)
    {
        return $request->server->get($key);
    }

    function getUploadedFiles($key)
    {
        return $request->files->get($key);
    }

    function getHeaders($key)
    {
        return $request->headers->get($key);
    }

    function getUri()
    {
        return $request->getPathInfo();
    }

    function getMethod()
    {
        return $request->getMethod();
    }

    function getLanguages()
    {
        return $request->getLanguages();
    }

    /**
     * Response with content, status code (default 200, ok) and type (default text/html)
     * @param type $content
     * @param type $status
     * @param type $type
     */
    function response($data, $status = Response::HTTP_OK, $type = 'text/html')
    {
        $response = new Response();
        $response->setContent($data);
        $response->setStatusCode($status);
        $response->headers->set('Content-Type', $type);
        $response->send();
    }

    /**
     * Response with Json from an array
     * @param type $array
     */
    function responseJson($array)
    {
        $response = new Response();
        $response->setContent(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
    }

    /**
     * Response with PDF file
     * @param type $data
     */
    function responsePDF($data)
    {
        $mpdf = new mPDF();
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}
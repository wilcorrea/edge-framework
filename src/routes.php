<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('', new Routing\Route('/home/'));

return $routes;
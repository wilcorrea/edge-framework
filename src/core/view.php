<?php

namespace Core;

final class view extends kernel
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        \Twig_Autoloader::register();

        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/../view/');
        $this->twig   = new \Twig_Environment($this->loader,
            array(
            'cache' => __DIR__ . '/../../view/',
        ));
    }

    public function render($view, $params){
        $template = $this->twig->loadTemplate($view);
        echo $template->render($params);
    }
}
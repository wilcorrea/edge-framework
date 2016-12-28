<?php

/* home.twig */
class __TwigTemplate_5e970cd3c382c65bb6f91422e97b8756970e1b776119c83d91c2758b494dec14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
        <link href=\"https://fonts.googleapis.com/css?family=Playfair+Display:400,700\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"css/bootstrap.css\">
        <link rel=\"stylesheet\" href=\"css/style.css\">
        <title>Edge Framework</title>
    </head>
    <body>
        <div class=\"container\">
            <h1 class=\"title\">";
        // line 14
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>

            <p>This is the Edge Framework</p>
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 14,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "/var/www/edge/src/view/home.twig");
    }
}

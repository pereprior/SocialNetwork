<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/header.html.twig */
class __TwigTemplate_7adc23b0bb7738e86073e01fb37a047f extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/header.html.twig"));

        // line 1
        yield "<!-- Header -->
<header id=\"header\">
    <h2><strong>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["page_title"]) || array_key_exists("page_title", $context) ? $context["page_title"] : (function () { throw new RuntimeError('Variable "page_title" does not exist.', 3, $this->source); })()), "html", null, true);
        yield "</strong></h2>
    <ul class=\"icons\">
        <li><a href=\"#\" class=\"icon brands fa-twitter\"><span class=\"label\">Twitter</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-facebook-f\"><span class=\"label\">Facebook</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-snapchat-ghost\"><span class=\"label\">Snapchat</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-instagram\"><span class=\"label\">Instagram</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-medium-m\"><span class=\"label\">Medium</span></a></li>
    </ul>
</header>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/header.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Header -->
<header id=\"header\">
    <h2><strong>{{ page_title }}</strong></h2>
    <ul class=\"icons\">
        <li><a href=\"#\" class=\"icon brands fa-twitter\"><span class=\"label\">Twitter</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-facebook-f\"><span class=\"label\">Facebook</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-snapchat-ghost\"><span class=\"label\">Snapchat</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-instagram\"><span class=\"label\">Instagram</span></a></li>
        <li><a href=\"#\" class=\"icon brands fa-medium-m\"><span class=\"label\">Medium</span></a></li>
    </ul>
</header>", "partials/header.html.twig", "/home/pprior/PhpstormProjects/SocialNetwork/templates/partials/header.html.twig");
    }
}

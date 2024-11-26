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

/* partials/sidebar.html.twig */
class __TwigTemplate_295909a9006c0b33f615e37279b0b864 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/sidebar.html.twig"));

        // line 1
        yield "<!-- Sidebar -->
<div id=\"sidebar\">
    <div class=\"inner\">

        <!-- Search -->
        <section id=\"search\" class=\"alt\">
            <form method=\"post\" action=\"#\">
                <img src=\"logo.png\" class=\"sidebar-logo\" alt=\"Logo\">
            </form>
        </section>

        <!-- Menu -->
        <nav id=\"menu\">
            <header class=\"major\">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_inicio");
        yield "\">Home</a></li>
                <li><a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("explore");
        yield "\">Explore</a></li>
                <li><a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile");
        yield "\">Profile</a></li>
                <li><a href=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("chats");
        yield "\">Chats</a></li>
                <li><a href=\"#\">Notification</a></li>
                <li><a href=\"#\">Report an error</a></li>
            </ul>
        </nav>

        <!-- Footer -->
        <footer id=\"footer\">
            <p class=\"copyright\">&copy; Copyright. Registered Trademark. All rights are registered and patented.</p>
        </footer>
    </div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/sidebar.html.twig";
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
        return array (  79 => 21,  75 => 20,  71 => 19,  67 => 18,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Sidebar -->
<div id=\"sidebar\">
    <div class=\"inner\">

        <!-- Search -->
        <section id=\"search\" class=\"alt\">
            <form method=\"post\" action=\"#\">
                <img src=\"logo.png\" class=\"sidebar-logo\" alt=\"Logo\">
            </form>
        </section>

        <!-- Menu -->
        <nav id=\"menu\">
            <header class=\"major\">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href=\"{{ path('app_inicio') }}\">Home</a></li>
                <li><a href=\"{{ path('explore') }}\">Explore</a></li>
                <li><a href=\"{{ path('profile') }}\">Profile</a></li>
                <li><a href=\"{{ path('chats') }}\">Chats</a></li>
                <li><a href=\"#\">Notification</a></li>
                <li><a href=\"#\">Report an error</a></li>
            </ul>
        </nav>

        <!-- Footer -->
        <footer id=\"footer\">
            <p class=\"copyright\">&copy; Copyright. Registered Trademark. All rights are registered and patented.</p>
        </footer>
    </div>
</div>", "partials/sidebar.html.twig", "/home/pprior/PhpstormProjects/SocialNetwork/templates/partials/sidebar.html.twig");
    }
}

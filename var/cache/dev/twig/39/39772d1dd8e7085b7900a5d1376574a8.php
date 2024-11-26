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
class __TwigTemplate_e393a47540e2d7294e96d39d045a6be0 extends Template
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
                <input type=\"text\" name=\"query\" id=\"query\" placeholder=\"Search\" />
            </form>
        </section>

        <!-- Menu -->
        <nav id=\"menu\">
            <header class=\"major\">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href=\"index.html.twig\">Homepage</a></li>
                <li><a href=\"generic.html.twig\">Generic</a></li>
                <li><a href=\"elements.html.twig\">Elements</a></li>
                <li>
                    <span class=\"opener\">Submenu</span>
                    <ul>
                        <li><a href=\"#\">Lorem Dolor</a></li>
                        <li><a href=\"#\">Ipsum Adipiscing</a></li>
                        <li><a href=\"#\">Tempus Magna</a></li>
                        <li><a href=\"#\">Feugiat Veroeros</a></li>
                    </ul>
                </li>
                <li><a href=\"#\">Etiam Dolore</a></li>
                <li><a href=\"#\">Adipiscing</a></li>
                <li>
                    <span class=\"opener\">Another Submenu</span>
                    <ul>
                        <li><a href=\"#\">Lorem Dolor</a></li>
                        <li><a href=\"#\">Ipsum Adipiscing</a></li>
                        <li><a href=\"#\">Tempus Magna</a></li>
                        <li><a href=\"#\">Feugiat Veroeros</a></li>
                    </ul>
                </li>
                <li><a href=\"#\">Maximus Erat</a></li>
                <li><a href=\"#\">Sapien Mauris</a></li>
                <li><a href=\"#\">Amet Lacinia</a></li>
            </ul>
        </nav>

        <!-- Section -->
        <section>
            <header class=\"major\">
                <h2>Ante interdum</h2>
            </header>
            <div class=\"mini-posts\">
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic07.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic08.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic09.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
            </div>
            <ul class=\"actions\">
                <li><a href=\"#\" class=\"button\">More</a></li>
            </ul>
        </section>

        <!-- Section -->
        <section>
            <header class=\"major\">
                <h2>Get in touch</h2>
            </header>
            <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            <ul class=\"contact\">
                <li class=\"icon solid fa-envelope\"><a href=\"#\">information@untitled.tld</a></li>
                <li class=\"icon solid fa-phone\">(000) 000-0000</li>
                <li class=\"icon solid fa-home\">1234 Somewhere Road #8254<br />
                    Nashville, TN 00000-0000</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id=\"footer\">
            <p class=\"copyright\">&copy; Untitled. All rights reserved. Demo Images: <a href=\"https://unsplash.com\">Unsplash</a>. Design: <a href=\"https://html5up.net\">HTML5 UP</a>.</p>
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
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Sidebar -->
<div id=\"sidebar\">
    <div class=\"inner\">

        <!-- Search -->
        <section id=\"search\" class=\"alt\">
            <form method=\"post\" action=\"#\">
                <input type=\"text\" name=\"query\" id=\"query\" placeholder=\"Search\" />
            </form>
        </section>

        <!-- Menu -->
        <nav id=\"menu\">
            <header class=\"major\">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href=\"index.html.twig\">Homepage</a></li>
                <li><a href=\"generic.html.twig\">Generic</a></li>
                <li><a href=\"elements.html.twig\">Elements</a></li>
                <li>
                    <span class=\"opener\">Submenu</span>
                    <ul>
                        <li><a href=\"#\">Lorem Dolor</a></li>
                        <li><a href=\"#\">Ipsum Adipiscing</a></li>
                        <li><a href=\"#\">Tempus Magna</a></li>
                        <li><a href=\"#\">Feugiat Veroeros</a></li>
                    </ul>
                </li>
                <li><a href=\"#\">Etiam Dolore</a></li>
                <li><a href=\"#\">Adipiscing</a></li>
                <li>
                    <span class=\"opener\">Another Submenu</span>
                    <ul>
                        <li><a href=\"#\">Lorem Dolor</a></li>
                        <li><a href=\"#\">Ipsum Adipiscing</a></li>
                        <li><a href=\"#\">Tempus Magna</a></li>
                        <li><a href=\"#\">Feugiat Veroeros</a></li>
                    </ul>
                </li>
                <li><a href=\"#\">Maximus Erat</a></li>
                <li><a href=\"#\">Sapien Mauris</a></li>
                <li><a href=\"#\">Amet Lacinia</a></li>
            </ul>
        </nav>

        <!-- Section -->
        <section>
            <header class=\"major\">
                <h2>Ante interdum</h2>
            </header>
            <div class=\"mini-posts\">
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic07.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic08.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href=\"#\" class=\"image\"><img src=\"images/pic09.jpg\" alt=\"\" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
            </div>
            <ul class=\"actions\">
                <li><a href=\"#\" class=\"button\">More</a></li>
            </ul>
        </section>

        <!-- Section -->
        <section>
            <header class=\"major\">
                <h2>Get in touch</h2>
            </header>
            <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            <ul class=\"contact\">
                <li class=\"icon solid fa-envelope\"><a href=\"#\">information@untitled.tld</a></li>
                <li class=\"icon solid fa-phone\">(000) 000-0000</li>
                <li class=\"icon solid fa-home\">1234 Somewhere Road #8254<br />
                    Nashville, TN 00000-0000</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id=\"footer\">
            <p class=\"copyright\">&copy; Untitled. All rights reserved. Demo Images: <a href=\"https://unsplash.com\">Unsplash</a>. Design: <a href=\"https://html5up.net\">HTML5 UP</a>.</p>
        </footer>
    </div>
</div>", "partials/sidebar.html.twig", "/home/pprior/PhpstormProjects/SocialNetwork/templates/partials/sidebar.html.twig");
    }
}

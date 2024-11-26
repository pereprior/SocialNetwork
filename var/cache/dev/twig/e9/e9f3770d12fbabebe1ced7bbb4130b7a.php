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

/* page/index.html.twig */
class __TwigTemplate_80b9cef5a3f4d4f972858e0c0930854d extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "page/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "page/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "page/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Home";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        yield "                <br><h1>New Content</h1>
                <!-- Banner -->
                <section id=\"banner\">
                    <div class=\"content\">
                        <header>
                            <h2>First Publication</h2>
                            <p>Hashtags</p>
                        </header>
                        <p>Short Description</p>
                        <ul class=\"actions\">
                            <li><a href=\"#\" class=\"button big\">Let's cook!</a></li>
                        </ul>
                    </div>
                    <span class=\"image object\">
                        <img src=\"images/pic10.jpg\" alt=\"Photo\" />
                </span>
                </section>

                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 23, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 24
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "post/_post.html.twig");
            yield "
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "
                <!-- Section -->
                <section>
                    <header class=\"major\">
                        <h2>Erat lacinia</h2>
                    </header>
                    <div class=\"features\">
                        <article>
                            <span class=\"icon fa-gem\"></span>
                            <div class=\"content\">
                                <h3>Portitor ullamcorper</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-paper-plane\"></span>
                            <div class=\"content\">
                                <h3>Sapien veroeros</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-rocket\"></span>
                            <div class=\"content\">
                                <h3>Quam lorem ipsum</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-signal\"></span>
                            <div class=\"content\">
                                <h3>Sed magna finibus</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Section -->
                <section>
                    <header class=\"major\">
                        <h2>Ipsum sed dolor</h2>
                    </header>
                    <div class=\"posts\">
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic01.jpg\" alt=\"\" /></a>
                            <h3>Interdum aenean</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic02.jpg\" alt=\"\" /></a>
                            <h3>Nulla amet dolore</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic03.jpg\" alt=\"\" /></a>
                            <h3>Tempus ullamcorper</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic04.jpg\" alt=\"\" /></a>
                            <h3>Sed etiam facilis</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic05.jpg\" alt=\"\" /></a>
                            <h3>Feugiat lorem aenean</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic06.jpg\" alt=\"\" /></a>
                            <h3>Amet varius aliquam</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                    </div>
                </section>
            ";
        // line 120
        yield from $this->loadTemplate("partials/_new_post_button.html.twig", "page/index.html.twig", 120)->unwrap()->yield($context);
        // line 121
        yield "            ";
        yield from $this->loadTemplate("post/index.html.twig", "page/index.html.twig", 121)->unwrap()->yield($context);
        // line 122
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "page/index.html.twig";
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
        return array (  255 => 122,  252 => 121,  250 => 120,  154 => 26,  137 => 24,  120 => 23,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Home{% endblock %}

{% block body %}
                <br><h1>New Content</h1>
                <!-- Banner -->
                <section id=\"banner\">
                    <div class=\"content\">
                        <header>
                            <h2>First Publication</h2>
                            <p>Hashtags</p>
                        </header>
                        <p>Short Description</p>
                        <ul class=\"actions\">
                            <li><a href=\"#\" class=\"button big\">Let's cook!</a></li>
                        </ul>
                    </div>
                    <span class=\"image object\">
                        <img src=\"images/pic10.jpg\" alt=\"Photo\" />
                </span>
                </section>

                {% for post in posts %}
                    {{ include('post/_post.html.twig') }}
                {% endfor %}

                <!-- Section -->
                <section>
                    <header class=\"major\">
                        <h2>Erat lacinia</h2>
                    </header>
                    <div class=\"features\">
                        <article>
                            <span class=\"icon fa-gem\"></span>
                            <div class=\"content\">
                                <h3>Portitor ullamcorper</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-paper-plane\"></span>
                            <div class=\"content\">
                                <h3>Sapien veroeros</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-rocket\"></span>
                            <div class=\"content\">
                                <h3>Quam lorem ipsum</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                        <article>
                            <span class=\"icon solid fa-signal\"></span>
                            <div class=\"content\">
                                <h3>Sed magna finibus</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Section -->
                <section>
                    <header class=\"major\">
                        <h2>Ipsum sed dolor</h2>
                    </header>
                    <div class=\"posts\">
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic01.jpg\" alt=\"\" /></a>
                            <h3>Interdum aenean</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic02.jpg\" alt=\"\" /></a>
                            <h3>Nulla amet dolore</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic03.jpg\" alt=\"\" /></a>
                            <h3>Tempus ullamcorper</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic04.jpg\" alt=\"\" /></a>
                            <h3>Sed etiam facilis</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic05.jpg\" alt=\"\" /></a>
                            <h3>Feugiat lorem aenean</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href=\"#\" class=\"image\"><img src=\"images/pic06.jpg\" alt=\"\" /></a>
                            <h3>Amet varius aliquam</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class=\"actions\">
                                <li><a href=\"#\" class=\"button\">More</a></li>
                            </ul>
                        </article>
                    </div>
                </section>
            {% include 'partials/_new_post_button.html.twig' %}
            {% include 'post/index.html.twig' %}

{% endblock %}", "page/index.html.twig", "/home/pprior/PhpstormProjects/SocialNetwork/templates/page/index.html.twig");
    }
}

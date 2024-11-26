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

/* registration/register.html.twig */
class __TwigTemplate_7925e588859989a321083c3531c66656 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "registration/register.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Register";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    <div class=\"container mt-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8\">
                <div class=\"card\">
                    <div class=\"card-header bg-primary text-white\">
                        <h2 class=\"mb-0\">Register</h2>
                    </div>
                    <div class=\"card-body\">
                        ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 14, $this->source); })()), 'errors');
        yield "

                        ";
        // line 16
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 16, $this->source); })()), 'form_start');
        yield "
                        <div class=\"form-group mb-3\">
                            ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 18, $this->source); })()), "username", [], "any", false, false, false, 18), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 19
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 19, $this->source); })()), "username", [], "any", false, false, false, 19), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 20, $this->source); })()), "username", [], "any", false, false, false, 20), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 24, $this->source); })()), "name", [], "any", false, false, false, 24), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 25
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 25, $this->source); })()), "name", [], "any", false, false, false, 25), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 26
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 26, $this->source); })()), "name", [], "any", false, false, false, 26), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 30, $this->source); })()), "email", [], "any", false, false, false, 30), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 31, $this->source); })()), "email", [], "any", false, false, false, 31), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 32, $this->source); })()), "email", [], "any", false, false, false, 32), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 36, $this->source); })()), "plainPassword", [], "any", false, false, false, 36), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Password"]);
        yield "
                            ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 37, $this->source); })()), "plainPassword", [], "any", false, false, false, 37), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 38, $this->source); })()), "plainPassword", [], "any", false, false, false, 38), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 42, $this->source); })()), "gender", [], "any", false, false, false, 42), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 43, $this->source); })()), "gender", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 44, $this->source); })()), "gender", [], "any", false, false, false, 44), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 48, $this->source); })()), "birthdate", [], "any", false, false, false, 48), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 49, $this->source); })()), "birthdate", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 50, $this->source); })()), "birthdate", [], "any", false, false, false, 50), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 54, $this->source); })()), "bio", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 55, $this->source); })()), "bio", [], "any", false, false, false, 55), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 56, $this->source); })()), "bio", [], "any", false, false, false, 56), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 60, $this->source); })()), "agreeTerms", [], "any", false, false, false, 60), 'row', ["attr" => ["class" => "form-check-input"]]);
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 64
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 64, $this->source); })()), "isStudent", [], "any", false, false, false, 64), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 65, $this->source); })()), "isStudent", [], "any", false, false, false, 65), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                            ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 66, $this->source); })()), "isStudent", [], "any", false, false, false, 66), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 70, $this->source); })()), "isChef", [], "any", false, false, false, 70), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                            ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 71, $this->source); })()), "isChef", [], "any", false, false, false, 71), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                            ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 72, $this->source); })()), "isChef", [], "any", false, false, false, 72), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "proofOfChefTitle", [], "any", false, false, false, 76), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Proof of Chef Title"]);
        yield "
                            ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 77, $this->source); })()), "proofOfChefTitle", [], "any", false, false, false, 77), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "proofOfChefTitle", [], "any", false, false, false, 78), 'errors');
        yield "
                        </div>

                        <div class=\"form-group mb-3\">
                            ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 82, $this->source); })()), "userImage", [], "any", false, false, false, 82), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Upload your profile image"]);
        yield "
                            ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 83, $this->source); })()), "userImage", [], "any", false, false, false, 83), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 84, $this->source); })()), "userImage", [], "any", false, false, false, 84), 'errors');
        yield "
                        </div>

                        <div class=\"d-grid\">
                            <button type=\"submit\" class=\"btn btn-primary\">Register</button>
                        </div>
                        ";
        // line 90
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 90, $this->source); })()), 'form_end');
        yield "
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        return "registration/register.html.twig";
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
        return array (  294 => 90,  285 => 84,  281 => 83,  277 => 82,  270 => 78,  266 => 77,  262 => 76,  255 => 72,  251 => 71,  247 => 70,  240 => 66,  236 => 65,  232 => 64,  225 => 60,  218 => 56,  214 => 55,  210 => 54,  203 => 50,  199 => 49,  195 => 48,  188 => 44,  184 => 43,  180 => 42,  173 => 38,  169 => 37,  165 => 36,  158 => 32,  154 => 31,  150 => 30,  143 => 26,  139 => 25,  135 => 24,  128 => 20,  124 => 19,  120 => 18,  115 => 16,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8\">
                <div class=\"card\">
                    <div class=\"card-header bg-primary text-white\">
                        <h2 class=\"mb-0\">Register</h2>
                    </div>
                    <div class=\"card-body\">
                        {{ form_errors(registrationForm) }}

                        {{ form_start(registrationForm) }}
                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.username, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.username, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.username) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.name, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.name, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.name) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.email, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.email) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.plainPassword, 'Password', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.plainPassword, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.plainPassword) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.gender, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.gender, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.gender) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.birthdate, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.birthdate, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.birthdate) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.bio, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.bio, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.bio) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_row(registrationForm.agreeTerms, {'attr': {'class': 'form-check-input'}}) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.isStudent, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.isStudent, {'attr': {'class': 'form-check-input'}}) }}
                            {{ form_errors(registrationForm.isStudent) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.isChef, null, {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.isChef, {'attr': {'class': 'form-check-input'}}) }}
                            {{ form_errors(registrationForm.isChef) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.proofOfChefTitle, 'Proof of Chef Title', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.proofOfChefTitle, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.proofOfChefTitle) }}
                        </div>

                        <div class=\"form-group mb-3\">
                            {{ form_label(registrationForm.userImage, 'Upload your profile image', {'label_attr': {'class': 'form-label'}}) }}
                            {{ form_widget(registrationForm.userImage, {'attr': {'class': 'form-control'}}) }}
                            {{ form_errors(registrationForm.userImage) }}
                        </div>

                        <div class=\"d-grid\">
                            <button type=\"submit\" class=\"btn btn-primary\">Register</button>
                        </div>
                        {{ form_end(registrationForm) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "registration/register.html.twig", "/home/pprior/PhpstormProjects/SocialNetwork/templates/registration/register.html.twig");
    }
}

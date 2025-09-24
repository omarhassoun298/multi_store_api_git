<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* localisation/country_form.twig */
class __TwigTemplate_11287488b5db30f21cf7e4a3d223ff18b9b0d6f983ca0cb733ee87b3ca683db3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><button type=\"submit\" form=\"form-country\" formaction=\"";
        // line 5
        echo ($context["save"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 6
        echo ($context["cancel"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 7
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 10
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 10);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 10);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 17
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-country\" action=\"";
        // line 19
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" >
          <div class=\"row mb-3 required\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 21
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 23
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
              ";
        // line 24
        if (($context["error_name"] ?? null)) {
            // line 25
            echo "              <div id=\"error-name\" class=\"invalid-feedback d-block\"></div>
              ";
        }
        // line 27
        echo "            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-iso-code-2\" class=\"col-sm-2 col-form-label\">";
        // line 30
        echo ($context["entry_iso_code_2"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"iso_code_2\" value=\"";
        // line 32
        echo ($context["iso_code_2"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_iso_code_2"] ?? null);
        echo "\" id=\"input-iso-code-2\" class=\"form-control\"/>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-iso-code-3\" class=\"col-sm-2 col-form-label\">";
        // line 36
        echo ($context["entry_iso_code_3"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"iso_code_3\" value=\"";
        // line 38
        echo ($context["iso_code_3"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_iso_code_3"] ?? null);
        echo "\" id=\"input-iso-code-3\" class=\"form-control\"/>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-address-format\" class=\"col-sm-2 col-form-label\">";
        // line 42
        echo ($context["entry_address_format"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"address_format_id\" id=\"input-address-format\" class=\"form-select\">
                ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["address_formats"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["address_format"]) {
            // line 46
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["address_format"], "address_format_id", [], "any", false, false, false, 46);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["address_format"], "address_format_id", [], "any", false, false, false, 46) == ($context["address_format_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["address_format"], "name", [], "any", false, false, false, 46);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address_format'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 52
        echo ($context["entry_postcode_required"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <div class=\"btn-group\">
                <input type=\"radio\" name=\"postcode_required\" value=\"1\" id=\"input-postcode-required-yes\" class=\"btn-check\"";
        // line 55
        if (($context["postcode_required"] ?? null)) {
            echo " checked";
        }
        echo "/> <label for=\"input-postcode-required-yes\" class=\"btn btn-outline-secondary\">";
        echo ($context["text_yes"] ?? null);
        echo "</label> <input type=\"radio\" name=\"postcode_required\" value=\"0\" id=\"input-postcode-required-no\" class=\"btn-check\"";
        if ( !($context["postcode_required"] ?? null)) {
            echo " checked";
        }
        echo "/> <label for=\"input-postcode-required-no\" class=\"btn btn-outline-secondary\">";
        echo ($context["text_no"] ?? null);
        echo "</label>
              </div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 60
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\"/>
                <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 64
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
              </div>
            </div>
          </div>
          <input type=\"hidden\" name=\"country_id\" value=\"";
        // line 68
        echo ($context["country_id"] ?? null);
        echo "\" id=\"input-country-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 74
        echo ($context["footer"] ?? null);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "localisation/country_form.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  224 => 74,  215 => 68,  206 => 64,  199 => 60,  181 => 55,  175 => 52,  169 => 48,  154 => 46,  150 => 45,  144 => 42,  135 => 38,  130 => 36,  121 => 32,  116 => 30,  111 => 27,  107 => 25,  105 => 24,  99 => 23,  94 => 21,  89 => 19,  84 => 17,  77 => 12,  66 => 10,  62 => 9,  57 => 7,  51 => 6,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "localisation/country_form.twig", "");
    }
}

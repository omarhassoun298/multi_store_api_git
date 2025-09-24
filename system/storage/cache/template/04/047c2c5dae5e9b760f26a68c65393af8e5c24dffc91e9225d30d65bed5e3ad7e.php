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

/* setting/store_list.twig */
class __TwigTemplate_8a113993d5a2d8120f46a0dbde2ece5c9a944253235e9976fe9627bef14c25bc extends Template
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
      <div class=\"d-flex justify-content-between\">
        <div>
          <h1>";
        // line 7
        echo ($context["heading_title"] ?? null);
        echo "</h1>
          <ul class=\"breadcrumb\">
            ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 10
            echo "            <li class=\"breadcrumb-item\"><a href=\"";
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
        echo "          </ul>
        </div>
        <div>
          <a href=\"";
        // line 15
        echo ($context["add"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i></a>
          <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 16
        echo ($context["button_delete"] ?? null);
        echo "\" class=\"btn btn-danger\" onclick=\"confirm('";
        echo ($context["text_confirm"] ?? null);
        echo "') ? \$('#form-store').submit() : false;\"><i class=\"fa-regular fa-trash-can\"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 22
        if (($context["error_warning"] ?? null)) {
            // line 23
            echo "    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      <i class=\"fa fa-exclamation-circle\"></i> ";
            // line 24
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
    ";
        }
        // line 28
        echo "    ";
        if (($context["success"] ?? null)) {
            // line 29
            echo "    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
      <i class=\"fa fa-check-circle\"></i> ";
            // line 30
            echo ($context["success"] ?? null);
            echo "
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
    ";
        }
        // line 34
        echo "    <div class=\"card\">
      <div class=\"card-header\">
        <i class=\"fa fa-list\"></i> ";
        // line 36
        echo ($context["text_list"] ?? null);
        echo "
      </div>
      <div class=\"card-body\">
        <form action=\"";
        // line 39
        echo ($context["delete"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-store\">
          <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover\">
              <thead>
                <tr>
                  <th style=\"width: 1px;\" class=\"text-center\">
                    <input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', this.checked);\" />
                  </th>
                  <th class=\"text-left\">";
        // line 47
        echo ($context["column_name"] ?? null);
        echo "</th>
                  <th class=\"text-left\">";
        // line 48
        echo ($context["column_url"] ?? null);
        echo "</th>
                  <th class=\"text-right\">";
        // line 49
        echo ($context["column_action"] ?? null);
        echo "</th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 53
        if (($context["stores"] ?? null)) {
            // line 54
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 55
                echo "                <tr>
                  <td class=\"text-center\">
                    <input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 57
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 57);
                echo "\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 57), ($context["selected"] ?? null))) {
                    echo "checked=\"checked\"";
                }
                echo " />
                  </td>
                  <td class=\"text-left\">";
                // line 59
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 59);
                echo "</td>
                  <td class=\"text-left\">";
                // line 60
                echo twig_get_attribute($this->env, $this->source, $context["store"], "url", [], "any", false, false, false, 60);
                echo "</td>
                  <td class=\"text-right\">
                    <a href=\"";
                // line 62
                echo twig_get_attribute($this->env, $this->source, $context["store"], "edit", [], "any", false, false, false, 62);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
                  </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "                ";
        } else {
            // line 67
            echo "                <tr>
                  <td class=\"text-center\" colspan=\"4\">";
            // line 68
            echo ($context["text_no_results"] ?? null);
            echo "</td>
                </tr>
                ";
        }
        // line 71
        echo "              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 79
        echo ($context["footer"] ?? null);
        echo "
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "setting/store_list.twig";
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
        return array (  213 => 79,  203 => 71,  197 => 68,  194 => 67,  191 => 66,  179 => 62,  174 => 60,  170 => 59,  161 => 57,  157 => 55,  152 => 54,  150 => 53,  143 => 49,  139 => 48,  135 => 47,  124 => 39,  118 => 36,  114 => 34,  107 => 30,  104 => 29,  101 => 28,  94 => 24,  91 => 23,  89 => 22,  78 => 16,  72 => 15,  67 => 12,  56 => 10,  52 => 9,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_list.twig", "");
    }
}

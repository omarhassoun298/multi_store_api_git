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

/* setting/store_form.twig */
class __TwigTemplate_a87b248ca7d799d3e60f1ca23c0db84948130cdb69801bc70aa51a24effec35f extends Template
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
      <div class=\"float-end\">
        <button type=\"submit\" id=\"button-save\" form=\"form-setting\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\"  class=\"btn btn-primary\">
          <i class=\"fa fa-save\"></i>
        </button>
        <a href=\"";
        // line 9
        echo ($context["cancel"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-secondary\">
          <i class=\"fa fa-reply\"></i>
        </a>
      </div>
      <h1>";
        // line 13
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 16
            echo "        <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 16);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 16);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 22
        if (($context["error_warning"] ?? null)) {
            // line 23
            echo "    <div class=\"alert alert-danger alert-dismissible fade show\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
    ";
        }
        // line 27
        echo "    ";
        if (($context["success"] ?? null)) {
            // line 28
            echo "    <div class=\"alert alert-success alert-dismissible fade show\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
    ";
        }
        // line 32
        echo "    <div class=\"card\">
      <div class=\"card-header\">
        <i class=\"fa fa-pencil\"></i> ";
        // line 34
        echo ($context["text_edit"] ?? null);
        echo "
      </div>
      <div class=\"card-body\">
       <form action=\"";
        // line 37
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-setting\">
          <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link active\" id=\"tab_general-tab\" data-bs-toggle=\"tab\" href=\"#tab_general\" role=\"tab\" aria-controls=\"tab_general\" aria-selected=\"false\">";
        // line 40
        echo ($context["tab_general"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link active\" id=\"tab_user-tab\" data-bs-toggle=\"tab\" href=\"#tab_user\" role=\"tab\" aria-controls=\"tab_user\" aria-selected=\"false\">";
        // line 43
        echo ($context["tab_user"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-option-tab\" data-bs-toggle=\"tab\" href=\"#tab-option\" role=\"tab\" aria-controls=\"tab-option\" aria-selected=\"false\">";
        // line 46
        echo ($context["tab_option"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-image-tab\" data-bs-toggle=\"tab\" href=\"#tab-image\" role=\"tab\" aria-controls=\"tab-image\" aria-selected=\"false\">";
        // line 49
        echo ($context["tab_image"] ?? null);
        echo "</a>
            </li>
          </ul>
          <div class=\"tab-content\" id=\"myTabContent\">
            <div class=\"tab-pane active\" id=\"tab_general\">
                <div class=\"row mb-3 required\">
                    <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 55
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"name\" value=\"";
        // line 57
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 58
        if (($context["error_name"] ?? null)) {
            // line 59
            echo "                            <div id=\"error-name\" class=\"invalid-feedback\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 61
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 65
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"owner\" value=\"";
        // line 67
        echo ($context["owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                        ";
        // line 68
        if (($context["error_owner"] ?? null)) {
            // line 69
            echo "                            <div id=\"error-owner\" class=\"invalid-feedback\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                        ";
        }
        // line 71
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 75
        echo ($context["entry_address"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"address\" placeholder=\"";
        // line 77
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["address"] ?? null);
        echo "</textarea>
                        ";
        // line 78
        if (($context["error_address"] ?? null)) {
            // line 79
            echo "                            <div id=\"error-address\" class=\"invalid-feedback\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                        ";
        }
        // line 81
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 85
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"email\" value=\"";
        // line 87
        echo ($context["email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                        ";
        // line 88
        if (($context["error_email"] ?? null)) {
            // line 89
            echo "                            <div id=\"error-email\" class=\"invalid-feedback\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                        ";
        }
        // line 91
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 95
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"telephone\" value=\"";
        // line 97
        echo ($context["telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                        ";
        // line 98
        if (($context["error_telephone"] ?? null)) {
            // line 99
            echo "                            <div id=\"error-telephone\" class=\"invalid-feedback\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                        ";
        }
        // line 101
        echo "                    </div>
                </div>

                 <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 105
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 108
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"image\" value=\"";
        echo ($context["image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 110
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 111
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class=\"row mb-3\">
                    <label for=\"input-open\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 119
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"open\" rows=\"5\" placeholder=\"";
        // line 122
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["open"] ?? null);
        echo "</textarea>
                    </div>
                </div>
            </div>

            <div class=\"tab-pane\" id=\"tab_user\">
                <fieldset>
                  <legend>";
        // line 129
        echo ($context["text_user"] ?? null);
        echo "</legend>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-username\" class=\"col-sm-2 col-form-label\">";
        // line 131
        echo ($context["entry_username"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"username\" value=\"";
        // line 133
        echo ($context["username"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_username"] ?? null);
        echo "\" id=\"input-username\" class=\"form-control\"/>
                      <div id=\"error-username\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                  <div class=\"row mb-3\">
                    <label for=\"input-user-group\" class=\"col-sm-2 col-form-label\">";
        // line 138
        echo ($context["entry_user_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"user_group_id\" id=\"input-user-group\" class=\"form-select\">
                        ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["user_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user_group"]) {
            // line 142
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["user_group"], "user_group_id", [], "any", false, false, false, 142);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["user_group"], "user_group_id", [], "any", false, false, false, 142) == ($context["user_group_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["user_group"], "name", [], "any", false, false, false, 142);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "                      </select>
                    </div>
                  </div>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-firstname\" class=\"col-sm-2 col-form-label\">";
        // line 148
        echo ($context["entry_firstname"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"firstname\" value=\"";
        // line 150
        echo ($context["firstname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_firstname"] ?? null);
        echo "\" id=\"input-firstname\" class=\"form-control\"/>
                      <div id=\"error-firstname\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-lastname\" class=\"col-sm-2 col-form-label\">";
        // line 155
        echo ($context["entry_lastname"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"lastname\" value=\"";
        // line 157
        echo ($context["lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_lastname"] ?? null);
        echo "\" id=\"input-lastname\" class=\"form-control\"/>
                      <div id=\"error-lastname\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 162
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"email\" value=\"";
        // line 164
        echo ($context["email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                      <div id=\"error-email\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                  <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 169
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 172
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"image\" value=\"";
        echo ($context["image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 174
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 175
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <legend>Password</legend>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-password\" class=\"col-sm-2 col-form-label\">";
        // line 184
        echo ($context["entry_password"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"password\" name=\"password\" value=\"";
        // line 186
        echo ($context["password"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_password"] ?? null);
        echo "\" id=\"input-password\" class=\"form-control\" autocomplete=\"new-password\"/>
                      <div id=\"error-password\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-confirm\" class=\"col-sm-2 col-form-label\">";
        // line 191
        echo ($context["entry_confirm"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"password\" name=\"confirm\" value=\"";
        // line 193
        echo ($context["confirm"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_confirm"] ?? null);
        echo "\" id=\"input-confirm\" class=\"form-control\"/>
                      <div id=\"error-confirm\" class=\"invalid-feedback\"></div>
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <legend>Other</legend>
                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">";
        // line 201
        echo ($context["entry_status"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"status\" value=\"0\"/>
                        <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 205
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                      </div>
                    </div>
                  </div>
                </fieldset>
            </div>
            
            ";
        // line 463
        echo "        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 468
        echo ($context["footer"] ?? null);
        echo "
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "setting/store_form.twig";
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
        return array (  512 => 468,  505 => 463,  493 => 205,  486 => 201,  473 => 193,  468 => 191,  458 => 186,  453 => 184,  441 => 175,  437 => 174,  428 => 172,  422 => 169,  412 => 164,  407 => 162,  397 => 157,  392 => 155,  382 => 150,  377 => 148,  371 => 144,  356 => 142,  352 => 141,  346 => 138,  336 => 133,  331 => 131,  326 => 129,  314 => 122,  306 => 119,  295 => 111,  291 => 110,  282 => 108,  276 => 105,  270 => 101,  264 => 99,  262 => 98,  256 => 97,  251 => 95,  245 => 91,  239 => 89,  237 => 88,  231 => 87,  226 => 85,  220 => 81,  214 => 79,  212 => 78,  206 => 77,  201 => 75,  195 => 71,  189 => 69,  187 => 68,  181 => 67,  176 => 65,  170 => 61,  164 => 59,  162 => 58,  156 => 57,  151 => 55,  142 => 49,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

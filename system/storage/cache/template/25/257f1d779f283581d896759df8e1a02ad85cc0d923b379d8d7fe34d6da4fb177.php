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
class __TwigTemplate_477a2074bdf465d2b886549795d30c885fb34e3dd175390cb388c4d5400e8dc6 extends Template
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
              <a class=\"nav-link\" id=\"tab-option-tab\" data-bs-toggle=\"tab\" href=\"#tab-option\" role=\"tab\" aria-controls=\"tab-option\" aria-selected=\"false\">";
        // line 43
        echo ($context["tab_option"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-image-tab\" data-bs-toggle=\"tab\" href=\"#tab-image\" role=\"tab\" aria-controls=\"tab-image\" aria-selected=\"false\">";
        // line 46
        echo ($context["tab_image"] ?? null);
        echo "</a>
            </li>
          </ul>
          <div class=\"tab-content\" id=\"myTabContent\">
            <div class=\"tab-pane\" id=\"tab_general\">
                <div class=\"row mb-3 required\">
                    <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 52
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_name\" value=\"";
        // line 54
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 55
        if (($context["error_name"] ?? null)) {
            // line 56
            echo "                            <div id=\"error-name\" class=\"invalid-feedback\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 58
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 62
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_owner\" value=\"";
        // line 64
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                        ";
        // line 65
        if (($context["error_owner"] ?? null)) {
            // line 66
            echo "                            <div id=\"error-owner\" class=\"invalid-feedback\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                        ";
        }
        // line 68
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 72
        echo ($context["entry_address"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_address\" placeholder=\"";
        // line 74
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                        ";
        // line 75
        if (($context["error_address"] ?? null)) {
            // line 76
            echo "                            <div id=\"error-address\" class=\"invalid-feedback\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                        ";
        }
        // line 78
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 83
        echo ($context["help_geocode"] ?? null);
        echo "\">";
        echo ($context["entry_geocode"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 86
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\"/>
                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 91
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_email\" value=\"";
        // line 93
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                        ";
        // line 94
        if (($context["error_email"] ?? null)) {
            // line 95
            echo "                            <div id=\"error-email\" class=\"invalid-feedback\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                        ";
        }
        // line 97
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 101
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 103
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                        ";
        // line 104
        if (($context["error_telephone"] ?? null)) {
            // line 105
            echo "                            <div id=\"error-telephone\" class=\"invalid-feedback\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                        ";
        }
        // line 107
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-fax\" class=\"col-sm-2 col-form-label\">";
        // line 111
        echo ($context["entry_fax"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_fax\" value=\"";
        // line 113
        echo ($context["config_fax"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_fax"] ?? null);
        echo "\" id=\"input-fax\" class=\"form-control\"/>
                    </div>
                </div>

                 <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 118
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 121
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"config_image\" value=\"";
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 123
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 124
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class=\"row mb-3\">
                    <label for=\"input-open\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 132
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 135
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 141
        echo ($context["help_comment"] ?? null);
        echo "\">";
        echo ($context["entry_comment"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 144
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                ";
        // line 148
        if (($context["locations"] ?? null)) {
            // line 149
            echo "                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
            // line 151
            echo ($context["help_location"] ?? null);
            echo "\">";
            echo ($context["entry_location"] ?? null);
            echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        ";
            // line 154
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 155
                echo "                        <div class=\"form-check\">
                            <label>
                                <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                // line 157
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 157);
                echo "\" class=\"form-check-input\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 157), ($context["config_location"] ?? null))) {
                    echo " checked ";
                }
                echo " />
                                ";
                // line 158
                echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 158);
                echo "
                            </label>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "                    </div>
                </div>
                ";
        }
        // line 165
        echo "            </div>
            <div class=\"tab-pane\" id=\"tab-option\">
              <fieldset>
                <legend>";
        // line 168
        echo ($context["text_tax"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 170
        echo ($context["entry_tax"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"1\" ";
        // line 173
        if (($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 174
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"0\" ";
        // line 177
        if ( !($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 178
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 185
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
                      <option value=\"\">";
        // line 189
        echo ($context["text_none"] ?? null);
        echo "</option>
                      <option value=\"shipping\" ";
        // line 190
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                      <option value=\"payment\" ";
        // line 191
        if ((($context["config_tax_default"] ?? null) == "payment")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_payment"] ?? null);
        echo "</option>
                    </select>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-tax-customer\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 198
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
                      <option value=\"\">";
        // line 202
        echo ($context["text_none"] ?? null);
        echo "</option>
                      <option value=\"shipping\" ";
        // line 203
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                      <option value=\"payment\" ";
        // line 204
        if ((($context["config_tax_customer"] ?? null) == "payment")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_payment"] ?? null);
        echo "</option>
                    </select>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 211
        echo ($context["text_account"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 214
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
                      ";
        // line 218
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 219
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 219);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 219) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                          ";
            // line 220
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 220);
            echo "
                        </option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 223
        echo "                    </select>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 229
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    ";
        // line 232
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 233
            echo "                      <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 234
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 234);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 234), ($context["config_customer_group_display"] ?? null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                        <label class=\"form-check-label\">";
            // line 235
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 235);
            echo "</label>
                      </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 238
        echo "                    ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 239
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
                    ";
        }
        // line 241
        echo "                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 246
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 250
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 251
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 254
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 255
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-account\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 262
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
                      <option value=\"0\">";
        // line 266
        echo ($context["text_none"] ?? null);
        echo "</option>
                      ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 268
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 268);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 268) == ($context["config_account_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                          ";
            // line 269
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 269);
            echo "
                        </option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 272
        echo "                    </select>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 278
        echo ($context["text_checkout"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 280
        echo ($context["entry_cart_weight"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"1\" ";
        // line 283
        if (($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 284
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"0\" ";
        // line 287
        if ( !($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 288
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 295
        echo ($context["help_checkout_guest"] ?? null);
        echo "\">";
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"1\" ";
        // line 299
        if (($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 300
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"0\" ";
        // line 303
        if ( !($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 304
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 311
        echo ($context["help_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_checkout"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
                      <option value=\"0\">";
        // line 315
        echo ($context["text_none"] ?? null);
        echo "</option>
                      ";
        // line 316
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 317
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 317);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 317) == ($context["config_checkout_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                          ";
            // line 318
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 318);
            echo "
                        </option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 321
        echo "                    </select>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 327
        echo ($context["help_order_status"] ?? null);
        echo "\">";
        echo ($context["entry_order_status"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
                      ";
        // line 331
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 332
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 332);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 332) == ($context["config_order_status_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                          ";
            // line 333
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 333);
            echo "
                        </option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 336
        echo "                    </select>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 342
        echo ($context["text_stock"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 345
        echo ($context["help_stock_display"] ?? null);
        echo "\">";
        echo ($context["entry_stock_display"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"1\" ";
        // line 349
        if (($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 350
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"0\" ";
        // line 353
        if ( !($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 354
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">
                    <span data-toggle=\"tooltip\" title=\"";
        // line 361
        echo ($context["help_stock_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</span>
                  </label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"1\" ";
        // line 365
        if (($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 366
        echo ($context["text_yes"] ?? null);
        echo "</label>
                    </div>
                    <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"0\" ";
        // line 369
        if ( !($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                      <label class=\"form-check-label\">";
        // line 370
        echo ($context["text_no"] ?? null);
        echo "</label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>

            <div class=\"tab-pane\" id=\"tab-image\">
              <div class=\"row mb-3\">
                  <label for=\"input-logo\" class=\"col-sm-2 col-form-label\">";
        // line 379
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 382
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 383
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 387
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 391
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <div class=\"row mb-3\">
                  <label for=\"input-icon\" class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 399
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 402
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-icon\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 403
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 407
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 411
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  
  <script type=\"text/javascript\">
    \$('select[name=\"config_theme\"]').on('change', function() {
      \$.ajax({
        url: 'index.php?route=setting/setting/theme&user_token=";
        // line 426
        echo ($context["user_token"] ?? null);
        echo "&theme=' + this.value,
        dataType: 'html',
        beforeSend: function() {
          \$('select[name=\"config_theme\"]').prop('disabled', true);
        },
        complete: function() {
          \$('select[name=\"config_theme\"]').prop('disabled', false);
        },
        success: function(html) {
          \$('#theme').attr('src', html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
      });
    });

    \$('select[name=\"config_theme\"]').trigger('change');
  </script>

  <script type=\"text/javascript\">
    \$('select[name=\"config_country_id\"]').on('change', function() {
      \$.ajax({
        url: 'index.php?route=localisation/country/country&user_token=";
        // line 449
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
          \$('select[name=\"config_country_id\"]').prop('disabled', true);
        },
        complete: function() {
          \$('select[name=\"config_country_id\"]').prop('disabled', false);
        },
        success: function(json) {
          let html = '<option value=\"\">";
        // line 458
        echo ($context["text_select"] ?? null);
        echo "</option>';
          if (json['zone'] && json['zone'] !== '') {
            for (let i = 0; i < json['zone'].length; i++) {
              html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
              if (json['zone'][i]['zone_id'] == '";
        // line 462
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                html += ' selected=\"selected\"';
              }
              html += '>' + json['zone'][i]['name'] + '</option>';
            }
          } else {
            html += '<option value=\"0\" selected=\"selected\">";
        // line 468
        echo ($context["text_none"] ?? null);
        echo "</option>';
          }
          \$('select[name=\"config_zone_id\"]').html(html);
          \$('#button-save').prop('disabled', false);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
      });
    });

    \$('select[name=\"config_country_id\"]').trigger('change');
  </script>
</div>
";
        // line 482
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
        return array (  1096 => 482,  1079 => 468,  1070 => 462,  1063 => 458,  1051 => 449,  1025 => 426,  1007 => 411,  1000 => 407,  993 => 403,  987 => 402,  979 => 399,  968 => 391,  961 => 387,  954 => 383,  948 => 382,  942 => 379,  930 => 370,  924 => 369,  918 => 366,  912 => 365,  903 => 361,  893 => 354,  887 => 353,  881 => 350,  875 => 349,  866 => 345,  860 => 342,  852 => 336,  843 => 333,  834 => 332,  830 => 331,  821 => 327,  813 => 321,  804 => 318,  795 => 317,  791 => 316,  787 => 315,  778 => 311,  768 => 304,  762 => 303,  756 => 300,  750 => 299,  741 => 295,  731 => 288,  725 => 287,  719 => 284,  713 => 283,  707 => 280,  702 => 278,  694 => 272,  685 => 269,  676 => 268,  672 => 267,  668 => 266,  659 => 262,  649 => 255,  643 => 254,  637 => 251,  631 => 250,  622 => 246,  615 => 241,  609 => 239,  606 => 238,  597 => 235,  589 => 234,  586 => 233,  582 => 232,  574 => 229,  566 => 223,  557 => 220,  548 => 219,  544 => 218,  535 => 214,  529 => 211,  515 => 204,  507 => 203,  503 => 202,  494 => 198,  480 => 191,  472 => 190,  468 => 189,  459 => 185,  449 => 178,  443 => 177,  437 => 174,  431 => 173,  425 => 170,  420 => 168,  415 => 165,  410 => 162,  400 => 158,  392 => 157,  388 => 155,  384 => 154,  376 => 151,  372 => 149,  370 => 148,  361 => 144,  353 => 141,  342 => 135,  334 => 132,  323 => 124,  319 => 123,  310 => 121,  304 => 118,  294 => 113,  289 => 111,  283 => 107,  277 => 105,  275 => 104,  269 => 103,  264 => 101,  258 => 97,  252 => 95,  250 => 94,  244 => 93,  239 => 91,  229 => 86,  221 => 83,  214 => 78,  208 => 76,  206 => 75,  200 => 74,  195 => 72,  189 => 68,  183 => 66,  181 => 65,  175 => 64,  170 => 62,  164 => 58,  158 => 56,  156 => 55,  150 => 54,  145 => 52,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

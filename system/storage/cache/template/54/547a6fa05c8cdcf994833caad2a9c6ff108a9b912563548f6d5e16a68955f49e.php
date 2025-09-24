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
class __TwigTemplate_f5a365d7b9389ecbee24270dce785fccce5daa758ca21052f0b2cd32fe53b639 extends Template
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
              <a class=\"nav-link active\" id=\"tab-general-tab\" data-bs-toggle=\"tab\" href=\"#tab-general\" role=\"tab\" aria-controls=\"tab-general\" aria-selected=\"true\">";
        // line 40
        echo ($context["tab_general"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-store-tab\" data-bs-toggle=\"tab\" href=\"#tab-store\" role=\"tab\" aria-controls=\"tab-store\" aria-selected=\"false\">";
        // line 43
        echo ($context["tab_store"] ?? null);
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
            <div id=\"tab-general\" class=\"tab-pane active\">
              <div class=\"row mb-3 required\">
                    <label for=\"input-meta-title\" class=\"col-sm-2 col-form-label\">";
        // line 55
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 57
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\"/>
                        ";
        // line 58
        if (($context["error_meta_title"] ?? null)) {
            // line 59
            echo "                            <div id=\"error-meta-title\" class=\"invalid-feedback\">";
            echo ($context["error_meta_title"] ?? null);
            echo "</div>
                        ";
        }
        // line 61
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-description\" class=\"col-sm-2 col-form-label\">";
        // line 65
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 67
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-keyword\" class=\"col-sm-2 col-form-label\">";
        // line 72
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 74
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-theme\" class=\"col-sm-2 col-form-label\">";
        // line 79
        echo ($context["entry_theme"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_theme\" id=\"input-theme\" class=\"form-select\">
                            ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 83
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 83);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 83) == ($context["config_theme"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 83);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "                        </select>
                        <br/>
                        <img src=\"\" alt=\"\" id=\"theme\" class=\"img-thumbnail\"/>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-layout\" class=\"col-sm-2 col-form-label\">";
        // line 92
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-select\">
                            ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 96
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 96);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 96) == ($context["config_layout_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 96);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-store\">
                <div class=\"row mb-3 required\">
                    <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 104
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_name\" value=\"";
        // line 106
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 107
        if (($context["error_name"] ?? null)) {
            // line 108
            echo "                            <div id=\"error-name\" class=\"invalid-feedback\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 110
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 114
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_owner\" value=\"";
        // line 116
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                        ";
        // line 117
        if (($context["error_owner"] ?? null)) {
            // line 118
            echo "                            <div id=\"error-owner\" class=\"invalid-feedback\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                        ";
        }
        // line 120
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 124
        echo ($context["entry_address"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_address\" placeholder=\"";
        // line 126
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                        ";
        // line 127
        if (($context["error_address"] ?? null)) {
            // line 128
            echo "                            <div id=\"error-address\" class=\"invalid-feedback\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                        ";
        }
        // line 130
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 135
        echo ($context["help_geocode"] ?? null);
        echo "\">";
        echo ($context["entry_geocode"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 138
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\"/>
                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 143
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_email\" value=\"";
        // line 145
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                        ";
        // line 146
        if (($context["error_email"] ?? null)) {
            // line 147
            echo "                            <div id=\"error-email\" class=\"invalid-feedback\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                        ";
        }
        // line 149
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 153
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 155
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                        ";
        // line 156
        if (($context["error_telephone"] ?? null)) {
            // line 157
            echo "                            <div id=\"error-telephone\" class=\"invalid-feedback\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                        ";
        }
        // line 159
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-fax\" class=\"col-sm-2 col-form-label\">";
        // line 163
        echo ($context["entry_fax"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_fax\" value=\"";
        // line 165
        echo ($context["config_fax"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_fax"] ?? null);
        echo "\" id=\"input-fax\" class=\"form-control\"/>
                    </div>
                </div>

                 <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 170
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 173
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"config_image\" value=\"";
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 175
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 176
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class=\"row mb-3\">
                    <label for=\"input-open\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 184
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 187
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 193
        echo ($context["help_comment"] ?? null);
        echo "\">";
        echo ($context["entry_comment"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 196
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                ";
        // line 200
        if (($context["locations"] ?? null)) {
            // line 201
            echo "                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
            // line 203
            echo ($context["help_location"] ?? null);
            echo "\">";
            echo ($context["entry_location"] ?? null);
            echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        ";
            // line 206
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 207
                echo "                        <div class=\"form-check\">
                            <label>
                                <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                // line 209
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 209);
                echo "\" class=\"form-check-input\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 209), ($context["config_location"] ?? null))) {
                    echo " checked ";
                }
                echo " />
                                ";
                // line 210
                echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 210);
                echo "
                            </label>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 214
            echo "                    </div>
                </div>
                ";
        }
        // line 217
        echo "            </div>
<div class=\"tab-pane\" id=\"tab-option\">
  <fieldset>
    <legend>";
        // line 220
        echo ($context["text_tax"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 222
        echo ($context["entry_tax"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"1\" ";
        // line 225
        if (($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 226
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"0\" ";
        // line 229
        if ( !($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 230
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 237
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
          <option value=\"\">";
        // line 241
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 242
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 243
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
        // line 250
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
          <option value=\"\">";
        // line 254
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 255
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 256
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
        // line 263
        echo ($context["text_account"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 266
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
          ";
        // line 270
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 271
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 271);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 271) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 272
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 272);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 275
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 281
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        ";
        // line 284
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 285
            echo "          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 286
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 286);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 286), ($context["config_customer_group_display"] ?? null))) {
                echo "checked=\"checked\"";
            }
            echo " />
            <label class=\"form-check-label\">";
            // line 287
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 287);
            echo "</label>
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        echo "        ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 291
            echo "          <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
        ";
        }
        // line 293
        echo "      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 298
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 302
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 303
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 306
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 307
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-account\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 314
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
          <option value=\"0\">";
        // line 318
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 319
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 320
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 320);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 320) == ($context["config_account_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 321
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 321);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 324
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 330
        echo ($context["text_checkout"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 332
        echo ($context["entry_cart_weight"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"1\" ";
        // line 335
        if (($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 336
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"0\" ";
        // line 339
        if ( !($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 340
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 347
        echo ($context["help_checkout_guest"] ?? null);
        echo "\">";
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"1\" ";
        // line 351
        if (($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 352
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"0\" ";
        // line 355
        if ( !($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 356
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 363
        echo ($context["help_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
          <option value=\"0\">";
        // line 367
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 368
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 369
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 369);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 369) == ($context["config_checkout_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 370
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 370);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 373
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 379
        echo ($context["help_order_status"] ?? null);
        echo "\">";
        echo ($context["entry_order_status"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
          ";
        // line 383
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 384
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 384);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 384) == ($context["config_order_status_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 385
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 385);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 388
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 394
        echo ($context["text_stock"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 397
        echo ($context["help_stock_display"] ?? null);
        echo "\">";
        echo ($context["entry_stock_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"1\" ";
        // line 401
        if (($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 402
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"0\" ";
        // line 405
        if ( !($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 406
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 413
        echo ($context["help_stock_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"1\" ";
        // line 417
        if (($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 418
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"0\" ";
        // line 421
        if ( !($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 422
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
        // line 431
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 434
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 435
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 439
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 443
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <div class=\"row mb-3\">
                  <label for=\"input-icon\" class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 451
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 454
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-icon\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 455
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 459
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 463
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
        // line 478
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
        // line 501
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
        // line 510
        echo ($context["text_select"] ?? null);
        echo "</option>';
          if (json['zone'] && json['zone'] !== '') {
            for (let i = 0; i < json['zone'].length; i++) {
              html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
              if (json['zone'][i]['zone_id'] == '";
        // line 514
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                html += ' selected=\"selected\"';
              }
              html += '>' + json['zone'][i]['name'] + '</option>';
            }
          } else {
            html += '<option value=\"0\" selected=\"selected\">";
        // line 520
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
        // line 534
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
        return array (  1224 => 534,  1207 => 520,  1198 => 514,  1191 => 510,  1179 => 501,  1153 => 478,  1135 => 463,  1128 => 459,  1121 => 455,  1115 => 454,  1107 => 451,  1096 => 443,  1089 => 439,  1082 => 435,  1076 => 434,  1070 => 431,  1058 => 422,  1052 => 421,  1046 => 418,  1040 => 417,  1031 => 413,  1021 => 406,  1015 => 405,  1009 => 402,  1003 => 401,  994 => 397,  988 => 394,  980 => 388,  971 => 385,  962 => 384,  958 => 383,  949 => 379,  941 => 373,  932 => 370,  923 => 369,  919 => 368,  915 => 367,  906 => 363,  896 => 356,  890 => 355,  884 => 352,  878 => 351,  869 => 347,  859 => 340,  853 => 339,  847 => 336,  841 => 335,  835 => 332,  830 => 330,  822 => 324,  813 => 321,  804 => 320,  800 => 319,  796 => 318,  787 => 314,  777 => 307,  771 => 306,  765 => 303,  759 => 302,  750 => 298,  743 => 293,  737 => 291,  734 => 290,  725 => 287,  717 => 286,  714 => 285,  710 => 284,  702 => 281,  694 => 275,  685 => 272,  676 => 271,  672 => 270,  663 => 266,  657 => 263,  643 => 256,  635 => 255,  631 => 254,  622 => 250,  608 => 243,  600 => 242,  596 => 241,  587 => 237,  577 => 230,  571 => 229,  565 => 226,  559 => 225,  553 => 222,  548 => 220,  543 => 217,  538 => 214,  528 => 210,  520 => 209,  516 => 207,  512 => 206,  504 => 203,  500 => 201,  498 => 200,  489 => 196,  481 => 193,  470 => 187,  462 => 184,  451 => 176,  447 => 175,  438 => 173,  432 => 170,  422 => 165,  417 => 163,  411 => 159,  405 => 157,  403 => 156,  397 => 155,  392 => 153,  386 => 149,  380 => 147,  378 => 146,  372 => 145,  367 => 143,  357 => 138,  349 => 135,  342 => 130,  336 => 128,  334 => 127,  328 => 126,  323 => 124,  317 => 120,  311 => 118,  309 => 117,  303 => 116,  298 => 114,  292 => 110,  286 => 108,  284 => 107,  278 => 106,  273 => 104,  265 => 98,  250 => 96,  246 => 95,  240 => 92,  231 => 85,  216 => 83,  212 => 82,  206 => 79,  196 => 74,  191 => 72,  181 => 67,  176 => 65,  170 => 61,  164 => 59,  162 => 58,  156 => 57,  151 => 55,  142 => 49,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

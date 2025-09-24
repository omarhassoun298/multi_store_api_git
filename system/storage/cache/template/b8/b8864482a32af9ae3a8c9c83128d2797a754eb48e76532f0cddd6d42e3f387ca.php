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
class __TwigTemplate_3e3783827ffd0769410c71e071bcaa2f4be6bf966d9b0742f43ef6b1649b8159 extends Template
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
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-server-tab\" data-bs-toggle=\"tab\" href=\"#tab-server\" role=\"tab\" aria-controls=\"tab-server\" aria-selected=\"false\">";
        // line 52
        echo ($context["tab_server"] ?? null);
        echo "</a>
            </li>
          </ul>
          <div class=\"tab-content\" id=\"myTabContent\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <div class=\"row mb-3 required\">
                    <label for=\"input-meta-title\" class=\"col-sm-2 col-form-label\">";
        // line 58
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 60
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\"/>
                        ";
        // line 61
        if (($context["error_meta_title"] ?? null)) {
            // line 62
            echo "                            <div id=\"error-meta-title\" class=\"invalid-feedback\">";
            echo ($context["error_meta_title"] ?? null);
            echo "</div>
                        ";
        }
        // line 64
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-description\" class=\"col-sm-2 col-form-label\">";
        // line 68
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 70
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-keyword\" class=\"col-sm-2 col-form-label\">";
        // line 75
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 77
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-theme\" class=\"col-sm-2 col-form-label\">";
        // line 82
        echo ($context["entry_theme"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_theme\" id=\"input-theme\" class=\"form-select\">
                            ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 86
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 86);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 86) == ($context["config_theme"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 86);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                        </select>
                        <br/>
                        <img src=\"\" alt=\"\" id=\"theme\" class=\"img-thumbnail\"/>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-layout\" class=\"col-sm-2 col-form-label\">";
        // line 95
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-select\">
                            ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 99
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 99);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 99) == ($context["config_layout_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 99);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-store\">
                <div class=\"row mb-3 required\">
                    <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 107
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_name\" value=\"";
        // line 109
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 110
        if (($context["error_name"] ?? null)) {
            // line 111
            echo "                            <div id=\"error-name\" class=\"invalid-feedback\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 113
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 117
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_owner\" value=\"";
        // line 119
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                        ";
        // line 120
        if (($context["error_owner"] ?? null)) {
            // line 121
            echo "                            <div id=\"error-owner\" class=\"invalid-feedback\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                        ";
        }
        // line 123
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 127
        echo ($context["entry_address"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_address\" placeholder=\"";
        // line 129
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                        ";
        // line 130
        if (($context["error_address"] ?? null)) {
            // line 131
            echo "                            <div id=\"error-address\" class=\"invalid-feedback\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                        ";
        }
        // line 133
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 138
        echo ($context["help_geocode"] ?? null);
        echo "\">";
        echo ($context["entry_geocode"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 141
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\"/>
                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 146
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_email\" value=\"";
        // line 148
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                        ";
        // line 149
        if (($context["error_email"] ?? null)) {
            // line 150
            echo "                            <div id=\"error-email\" class=\"invalid-feedback\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                        ";
        }
        // line 152
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 156
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 158
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                        ";
        // line 159
        if (($context["error_telephone"] ?? null)) {
            // line 160
            echo "                            <div id=\"error-telephone\" class=\"invalid-feedback\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                        ";
        }
        // line 162
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-fax\" class=\"col-sm-2 col-form-label\">";
        // line 166
        echo ($context["entry_fax"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_fax\" value=\"";
        // line 168
        echo ($context["config_fax"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_fax"] ?? null);
        echo "\" id=\"input-fax\" class=\"form-control\"/>
                    </div>
                </div>

                 <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 173
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 176
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"config_image\" value=\"";
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 178
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 179
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class=\"row mb-3\">
                    <label for=\"input-open\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 187
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 190
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 196
        echo ($context["help_comment"] ?? null);
        echo "\">";
        echo ($context["entry_comment"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 199
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                ";
        // line 203
        if (($context["locations"] ?? null)) {
            // line 204
            echo "                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
            // line 206
            echo ($context["help_location"] ?? null);
            echo "\">";
            echo ($context["entry_location"] ?? null);
            echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        ";
            // line 209
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 210
                echo "                        <div class=\"form-check\">
                            <label>
                                <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                // line 212
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 212);
                echo "\" class=\"form-check-input\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 212), ($context["config_location"] ?? null))) {
                    echo " checked ";
                }
                echo " />
                                ";
                // line 213
                echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 213);
                echo "
                            </label>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 217
            echo "                    </div>
                </div>
                ";
        }
        // line 220
        echo "            </div>
<div class=\"tab-pane\" id=\"tab-option\">
  <fieldset>
    <legend>";
        // line 223
        echo ($context["text_tax"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 225
        echo ($context["entry_tax"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"1\" ";
        // line 228
        if (($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 229
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"0\" ";
        // line 232
        if ( !($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 233
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 240
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
          <option value=\"\">";
        // line 244
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 245
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 246
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
        // line 253
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
          <option value=\"\">";
        // line 257
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 258
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 259
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
        // line 266
        echo ($context["text_account"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 269
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
          ";
        // line 273
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 274
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 274);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 274) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 275
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 275);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 278
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 284
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        ";
        // line 287
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 288
            echo "          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 289
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 289);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 289), ($context["config_customer_group_display"] ?? null))) {
                echo "checked=\"checked\"";
            }
            echo " />
            <label class=\"form-check-label\">";
            // line 290
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 290);
            echo "</label>
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 293
        echo "        ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 294
            echo "          <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
        ";
        }
        // line 296
        echo "      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 301
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 305
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 306
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 309
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 310
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-account\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 317
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
          <option value=\"0\">";
        // line 321
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 322
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 323
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 323);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 323) == ($context["config_account_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 324
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 324);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 327
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 333
        echo ($context["text_checkout"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 335
        echo ($context["entry_cart_weight"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"1\" ";
        // line 338
        if (($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 339
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"0\" ";
        // line 342
        if ( !($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 343
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 350
        echo ($context["help_checkout_guest"] ?? null);
        echo "\">";
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"1\" ";
        // line 354
        if (($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 355
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"0\" ";
        // line 358
        if ( !($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 359
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 366
        echo ($context["help_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
          <option value=\"0\">";
        // line 370
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 371
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 372
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 372);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 372) == ($context["config_checkout_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 373
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 373);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 376
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 382
        echo ($context["help_order_status"] ?? null);
        echo "\">";
        echo ($context["entry_order_status"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
          ";
        // line 386
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 387
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 387);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 387) == ($context["config_order_status_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 388
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 388);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 391
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 397
        echo ($context["text_stock"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 400
        echo ($context["help_stock_display"] ?? null);
        echo "\">";
        echo ($context["entry_stock_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"1\" ";
        // line 404
        if (($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 405
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"0\" ";
        // line 408
        if ( !($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 409
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 416
        echo ($context["help_stock_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"1\" ";
        // line 420
        if (($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 421
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"0\" ";
        // line 424
        if ( !($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 425
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
        // line 434
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 437
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 438
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 442
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 446
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <div class=\"row mb-3\">
                  <label for=\"input-icon\" class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 454
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 457
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-icon\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 458
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 462
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 466
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
        // line 481
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
        // line 504
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
        // line 513
        echo ($context["text_select"] ?? null);
        echo "</option>';
          if (json['zone'] && json['zone'] !== '') {
            for (let i = 0; i < json['zone'].length; i++) {
              html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
              if (json['zone'][i]['zone_id'] == '";
        // line 517
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                html += ' selected=\"selected\"';
              }
              html += '>' + json['zone'][i]['name'] + '</option>';
            }
          } else {
            html += '<option value=\"0\" selected=\"selected\">";
        // line 523
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
        // line 537
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
        return array (  1230 => 537,  1213 => 523,  1204 => 517,  1197 => 513,  1185 => 504,  1159 => 481,  1141 => 466,  1134 => 462,  1127 => 458,  1121 => 457,  1113 => 454,  1102 => 446,  1095 => 442,  1088 => 438,  1082 => 437,  1076 => 434,  1064 => 425,  1058 => 424,  1052 => 421,  1046 => 420,  1037 => 416,  1027 => 409,  1021 => 408,  1015 => 405,  1009 => 404,  1000 => 400,  994 => 397,  986 => 391,  977 => 388,  968 => 387,  964 => 386,  955 => 382,  947 => 376,  938 => 373,  929 => 372,  925 => 371,  921 => 370,  912 => 366,  902 => 359,  896 => 358,  890 => 355,  884 => 354,  875 => 350,  865 => 343,  859 => 342,  853 => 339,  847 => 338,  841 => 335,  836 => 333,  828 => 327,  819 => 324,  810 => 323,  806 => 322,  802 => 321,  793 => 317,  783 => 310,  777 => 309,  771 => 306,  765 => 305,  756 => 301,  749 => 296,  743 => 294,  740 => 293,  731 => 290,  723 => 289,  720 => 288,  716 => 287,  708 => 284,  700 => 278,  691 => 275,  682 => 274,  678 => 273,  669 => 269,  663 => 266,  649 => 259,  641 => 258,  637 => 257,  628 => 253,  614 => 246,  606 => 245,  602 => 244,  593 => 240,  583 => 233,  577 => 232,  571 => 229,  565 => 228,  559 => 225,  554 => 223,  549 => 220,  544 => 217,  534 => 213,  526 => 212,  522 => 210,  518 => 209,  510 => 206,  506 => 204,  504 => 203,  495 => 199,  487 => 196,  476 => 190,  468 => 187,  457 => 179,  453 => 178,  444 => 176,  438 => 173,  428 => 168,  423 => 166,  417 => 162,  411 => 160,  409 => 159,  403 => 158,  398 => 156,  392 => 152,  386 => 150,  384 => 149,  378 => 148,  373 => 146,  363 => 141,  355 => 138,  348 => 133,  342 => 131,  340 => 130,  334 => 129,  329 => 127,  323 => 123,  317 => 121,  315 => 120,  309 => 119,  304 => 117,  298 => 113,  292 => 111,  290 => 110,  284 => 109,  279 => 107,  271 => 101,  256 => 99,  252 => 98,  246 => 95,  237 => 88,  222 => 86,  218 => 85,  212 => 82,  202 => 77,  197 => 75,  187 => 70,  182 => 68,  176 => 64,  170 => 62,  168 => 61,  162 => 60,  157 => 58,  148 => 52,  142 => 49,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

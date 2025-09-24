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
class __TwigTemplate_988a00d06c32af4fb07217405dea125ae03fb9f7f0c4fba49ae540c7e0a0b5d8 extends Template
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
              <a class=\"nav-link\" id=\"tab-local-tab\" data-bs-toggle=\"tab\" href=\"#tab-local\" role=\"tab\" aria-controls=\"tab-local\" aria-selected=\"false\">";
        // line 46
        echo ($context["tab_local"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-option-tab\" data-bs-toggle=\"tab\" href=\"#tab-option\" role=\"tab\" aria-controls=\"tab-option\" aria-selected=\"false\">";
        // line 49
        echo ($context["tab_option"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-image-tab\" data-bs-toggle=\"tab\" href=\"#tab-image\" role=\"tab\" aria-controls=\"tab-image\" aria-selected=\"false\">";
        // line 52
        echo ($context["tab_image"] ?? null);
        echo "</a>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <a class=\"nav-link\" id=\"tab-server-tab\" data-bs-toggle=\"tab\" href=\"#tab-server\" role=\"tab\" aria-controls=\"tab-server\" aria-selected=\"false\">";
        // line 55
        echo ($context["tab_server"] ?? null);
        echo "</a>
            </li>
          </ul>
          <div class=\"tab-content\" id=\"myTabContent\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <div class=\"row mb-3 required\">
                    <label for=\"input-meta-title\" class=\"col-sm-2 col-form-label\">";
        // line 61
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 63
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\"/>
                        ";
        // line 64
        if (($context["error_meta_title"] ?? null)) {
            // line 65
            echo "                            <div id=\"error-meta-title\" class=\"invalid-feedback\">";
            echo ($context["error_meta_title"] ?? null);
            echo "</div>
                        ";
        }
        // line 67
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-description\" class=\"col-sm-2 col-form-label\">";
        // line 71
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 73
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-meta-keyword\" class=\"col-sm-2 col-form-label\">";
        // line 78
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 80
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-theme\" class=\"col-sm-2 col-form-label\">";
        // line 85
        echo ($context["entry_theme"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_theme\" id=\"input-theme\" class=\"form-select\">
                            ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 89
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 89);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 89) == ($context["config_theme"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 89);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "                        </select>
                        <br/>
                        <img src=\"\" alt=\"\" id=\"theme\" class=\"img-thumbnail\"/>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-layout\" class=\"col-sm-2 col-form-label\">";
        // line 98
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-select\">
                            ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 102
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 102);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 102) == ($context["config_layout_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 102);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-store\">
                <div class=\"row mb-3 required\">
                    <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 110
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_name\" value=\"";
        // line 112
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 113
        if (($context["error_name"] ?? null)) {
            // line 114
            echo "                            <div id=\"error-name\" class=\"invalid-feedback\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 116
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 120
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_owner\" value=\"";
        // line 122
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                        ";
        // line 123
        if (($context["error_owner"] ?? null)) {
            // line 124
            echo "                            <div id=\"error-owner\" class=\"invalid-feedback\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                        ";
        }
        // line 126
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 130
        echo ($context["entry_address"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_address\" placeholder=\"";
        // line 132
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                        ";
        // line 133
        if (($context["error_address"] ?? null)) {
            // line 134
            echo "                            <div id=\"error-address\" class=\"invalid-feedback\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                        ";
        }
        // line 136
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 141
        echo ($context["help_geocode"] ?? null);
        echo "\">";
        echo ($context["entry_geocode"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 144
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\"/>
                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 149
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_email\" value=\"";
        // line 151
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                        ";
        // line 152
        if (($context["error_email"] ?? null)) {
            // line 153
            echo "                            <div id=\"error-email\" class=\"invalid-feedback\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                        ";
        }
        // line 155
        echo "                    </div>
                </div>

                <div class=\"row mb-3 required\">
                    <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 159
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 161
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                        ";
        // line 162
        if (($context["error_telephone"] ?? null)) {
            // line 163
            echo "                            <div id=\"error-telephone\" class=\"invalid-feedback\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                        ";
        }
        // line 165
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-fax\" class=\"col-sm-2 col-form-label\">";
        // line 169
        echo ($context["entry_fax"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_fax\" value=\"";
        // line 171
        echo ($context["config_fax"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_fax"] ?? null);
        echo "\" id=\"input-fax\" class=\"form-control\"/>
                    </div>
                </div>

                 <div class=\"row mb-3\">
                    <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 176
        echo ($context["entry_image"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"card image\">
                        <img src=\"";
        // line 179
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"config_image\" value=\"";
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\"/>
                        <div class=\"card-body\">
                          <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 181
        echo ($context["button_edit"] ?? null);
        echo "</button>
                          <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 182
        echo ($context["button_clear"] ?? null);
        echo "</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class=\"row mb-3\">
                    <label for=\"input-open\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 190
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 193
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 199
        echo ($context["help_comment"] ?? null);
        echo "\">";
        echo ($context["entry_comment"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 202
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                ";
        // line 206
        if (($context["locations"] ?? null)) {
            // line 207
            echo "                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
            // line 209
            echo ($context["help_location"] ?? null);
            echo "\">";
            echo ($context["entry_location"] ?? null);
            echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        ";
            // line 212
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 213
                echo "                        <div class=\"form-check\">
                            <label>
                                <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                // line 215
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 215);
                echo "\" class=\"form-check-input\" ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 215), ($context["config_location"] ?? null))) {
                    echo " checked ";
                }
                echo " />
                                ";
                // line 216
                echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 216);
                echo "
                            </label>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 220
            echo "                    </div>
                </div>
                ";
        }
        // line 223
        echo "            </div>
            <div class=\"tab-pane\" id=\"tab-local\">
                <div class=\"row mb-3\">
                    <label for=\"input-country\" class=\"col-sm-2 col-form-label\">";
        // line 226
        echo ($context["entry_country"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_country_id\" id=\"input-country\" class=\"form-control\">
                            ";
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 230
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 230) == ($context["config_country_id"] ?? null))) {
                // line 231
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 231);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 231);
                echo "</option>
                                ";
            } else {
                // line 233
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 233);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 233);
                echo "</option>
                                ";
            }
            // line 235
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 236
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-zone\" class=\"col-sm-2 col-form-label\">";
        // line 241
        echo ($context["entry_zone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_zone_id\" id=\"input-zone\" class=\"form-control\">
                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-timezone\" class=\"col-sm-2 col-form-label\">";
        // line 249
        echo ($context["entry_timezone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_timezone\" id=\"input-timezone\" class=\"form-control\">
                            ";
        // line 252
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["timezones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["timezone"]) {
            // line 253
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 253) == ($context["config_timezone"] ?? null))) {
                // line 254
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 254);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "text", [], "any", false, false, false, 254);
                echo "</option>
                                ";
            } else {
                // line 256
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 256);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "text", [], "any", false, false, false, 256);
                echo "</option>
                                ";
            }
            // line 258
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 259
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-language\" class=\"col-sm-2 col-form-label\">";
        // line 264
        echo ($context["entry_language"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_language\" id=\"input-language\" class=\"form-control\">
                            ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 268
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 268) == ($context["config_language"] ?? null))) {
                // line 269
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 269);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 269);
                echo "</option>
                                ";
            } else {
                // line 271
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 271);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 271);
                echo "</option>
                                ";
            }
            // line 273
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 274
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-admin-language\" class=\"col-sm-2 col-form-label\">";
        // line 279
        echo ($context["entry_admin_language"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_admin_language\" id=\"input-admin-language\" class=\"form-control\">
                            ";
        // line 282
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 283
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 283) == ($context["config_admin_language"] ?? null))) {
                // line 284
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 284);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 284);
                echo "</option>
                                ";
            } else {
                // line 286
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 286);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 286);
                echo "</option>
                                ";
            }
            // line 288
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 289
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-currency\" class=\"col-sm-2 col-form-label\">
                        <span data-toggle=\"tooltip\" title=\"";
        // line 295
        echo ($context["help_currency"] ?? null);
        echo "\">";
        echo ($context["entry_currency"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_currency\" id=\"input-currency\" class=\"form-control\">
                            ";
        // line 299
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
            // line 300
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 300) == ($context["config_currency"] ?? null))) {
                // line 301
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 301);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 301);
                echo "</option>
                                ";
            } else {
                // line 303
                echo "                                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 303);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 303);
                echo "</option>
                                ";
            }
            // line 305
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 306
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-currency-engine\" class=\"col-sm-2 col-form-label\">";
        // line 311
        echo ($context["entry_currency_engine"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_currency_engine\" id=\"input-currency-engine\" class=\"form-control\">
                            <option value=\"\" ";
        // line 314
        if ( !($context["config_currency_engine"] ?? null)) {
            echo "selected";
        }
        echo ">";
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 315
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currency_engines"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency_engine"]) {
            // line 316
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["currency_engine"], "value", [], "any", false, false, false, 316);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["currency_engine"], "value", [], "any", false, false, false, 316) == ($context["config_currency_engine"] ?? null))) {
                echo "selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["currency_engine"], "text", [], "any", false, false, false, 316);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency_engine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 318
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 323
        echo ($context["entry_currency_auto"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_currency_auto\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"config_currency_auto\" value=\"1\" id=\"input-currency-auto\" class=\"form-check-input\"";
        // line 327
        if (($context["config_currency_auto"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 329
        echo ($context["help_currency_auto"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                    <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">";
        // line 333
        echo ($context["entry_length_class"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_length_class_id\" id=\"input-length-class\" class=\"form-control\">
                            ";
        // line 336
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["length_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["length_class"]) {
            // line 337
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 337);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 337) == ($context["config_length_class_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 337);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['length_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 339
        echo "                        </select>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">";
        // line 344
        echo ($context["entry_weight_class"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"config_weight_class_id\" id=\"input-weight-class\" class=\"form-control\">
                            ";
        // line 347
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["weight_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["weight_class"]) {
            // line 348
            echo "                                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 348);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 348) == ($context["config_weight_class_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 348);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 350
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-option\">
                <fieldset>
                  <legend>";
        // line 356
        echo ($context["text_product"] ?? null);
        echo "</legend>
                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 359
        echo ($context["help_product_count"] ?? null);
        echo "\">";
        echo ($context["entry_product_count"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_product_count\" value=\"1\" ";
        // line 363
        if (($context["config_product_count"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 364
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_product_count\" value=\"0\" ";
        // line 367
        if ( !($context["config_product_count"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 368
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3 required\">
                    <label for=\"input-admin-limit\" class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 375
        echo ($context["help_limit_admin"] ?? null);
        echo "\">";
        echo ($context["entry_limit_admin"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_limit_admin\" value=\"";
        // line 378
        echo ($context["config_limit_admin"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_limit_admin"] ?? null);
        echo "\" id=\"input-admin-limit\" class=\"form-control\" />
                      ";
        // line 379
        if (($context["error_limit_admin"] ?? null)) {
            // line 380
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_limit_admin"] ?? null);
            echo "</div>
                      ";
        }
        // line 382
        echo "                    </div>
                  </div>
                </fieldset>

                <fieldset>
                  <legend>";
        // line 387
        echo ($context["text_review"] ?? null);
        echo "</legend>
                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 390
        echo ($context["help_review"] ?? null);
        echo "\">";
        echo ($context["entry_review"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_review_status\" value=\"1\" ";
        // line 394
        if (($context["config_review_status"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 395
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_review_status\" value=\"0\" ";
        // line 398
        if ( !($context["config_review_status"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 399
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 406
        echo ($context["help_review_guest"] ?? null);
        echo "\">";
        echo ($context["entry_review_guest"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_review_guest\" value=\"1\" ";
        // line 410
        if (($context["config_review_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 411
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_review_guest\" value=\"0\" ";
        // line 414
        if ( !($context["config_review_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 415
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>
                </fieldset>

                <fieldset>
                  <legend>";
        // line 422
        echo ($context["text_voucher"] ?? null);
        echo "</legend>
                  <div class=\"row mb-3 required\">
                    <label for=\"input-voucher-min\" class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 425
        echo ($context["help_voucher_min"] ?? null);
        echo "\">";
        echo ($context["entry_voucher_min"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_voucher_min\" value=\"";
        // line 428
        echo ($context["config_voucher_min"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_voucher_min"] ?? null);
        echo "\" id=\"input-voucher-min\" class=\"form-control\" />
                      ";
        // line 429
        if (($context["error_voucher_min"] ?? null)) {
            // line 430
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_voucher_min"] ?? null);
            echo "</div>
                      ";
        }
        // line 432
        echo "                    </div>
                  </div>

                  <div class=\"row mb-3 required\">
                    <label for=\"input-voucher-max\" class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 437
        echo ($context["help_voucher_max"] ?? null);
        echo "\">";
        echo ($context["entry_voucher_max"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_voucher_max\" value=\"";
        // line 440
        echo ($context["config_voucher_max"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_voucher_max"] ?? null);
        echo "\" id=\"input-voucher-max\" class=\"form-control\" />
                      ";
        // line 441
        if (($context["error_voucher_max"] ?? null)) {
            // line 442
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_voucher_max"] ?? null);
            echo "</div>
                      ";
        }
        // line 444
        echo "                    </div>
                  </div>
                </fieldset>

                <fieldset>
                  <legend>";
        // line 449
        echo ($context["text_tax"] ?? null);
        echo "</legend>
                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">";
        // line 451
        echo ($context["entry_tax"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"1\" ";
        // line 454
        if (($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 455
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"0\" ";
        // line 458
        if ( !($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 459
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 466
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
                        <option value=\"\">";
        // line 470
        echo ($context["text_none"] ?? null);
        echo "</option>
                        <option value=\"shipping\" ";
        // line 471
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                        <option value=\"payment\" ";
        // line 472
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
        // line 479
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
                        <option value=\"\">";
        // line 483
        echo ($context["text_none"] ?? null);
        echo "</option>
                        <option value=\"shipping\" ";
        // line 484
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                        <option value=\"payment\" ";
        // line 485
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
        // line 492
        echo ($context["text_account"] ?? null);
        echo "</legend>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 496
        echo ($context["help_customer_online"] ?? null);
        echo "\">";
        echo ($context["entry_customer_online"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_online\" value=\"1\" ";
        // line 500
        if (($context["config_customer_online"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 501
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_online\" value=\"0\" ";
        // line 504
        if ( !($context["config_customer_online"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 505
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 512
        echo ($context["help_customer_activity"] ?? null);
        echo "\">";
        echo ($context["entry_customer_activity"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_activity\" value=\"1\" ";
        // line 516
        if (($context["config_customer_activity"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 517
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_activity\" value=\"0\" ";
        // line 520
        if ( !($context["config_customer_activity"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 521
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">";
        // line 527
        echo ($context["entry_customer_search"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_search\" value=\"1\" ";
        // line 530
        if (($context["config_customer_search"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 531
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_search\" value=\"0\" ";
        // line 534
        if ( !($context["config_customer_search"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 535
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-customer-group\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 542
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-control\">
                        ";
        // line 546
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 547
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 547);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 547) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected";
            }
            echo ">
                            ";
            // line 548
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 548);
            echo "
                          </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 551
        echo "                      </select>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 557
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      ";
        // line 560
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 561
            echo "                        <div class=\"form-check\">
                          <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 562
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 562);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 562), ($context["config_customer_group_display"] ?? null))) {
                echo "checked";
            }
            echo ">
                          <label class=\"form-check-label\">";
            // line 563
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 563);
            echo "</label>
                        </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 566
        echo "                      ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 567
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
                      ";
        }
        // line 569
        echo "                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 574
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 578
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 579
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 582
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 583
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-login-attempts\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 590
        echo ($context["help_login_attempts"] ?? null);
        echo "\">";
        echo ($context["entry_login_attempts"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_login_attempts\" value=\"";
        // line 593
        echo ($context["config_login_attempts"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_login_attempts"] ?? null);
        echo "\" id=\"input-login-attempts\" class=\"form-control\" />
                      ";
        // line 594
        if (($context["error_login_attempts"] ?? null)) {
            // line 595
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_login_attempts"] ?? null);
            echo "</div>
                      ";
        }
        // line 597
        echo "                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-account\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 602
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_account_id\" id=\"input-account\" class=\"form-control\">
                        <option value=\"0\">";
        // line 606
        echo ($context["text_none"] ?? null);
        echo "</option>
                        ";
        // line 607
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 608
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 608);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 608) == ($context["config_account_id"] ?? null))) {
                echo "selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 608);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 610
        echo "                      </select>
                    </div>
                  </div>

                </fieldset>

                <fieldset>
                  <legend>";
        // line 617
        echo ($context["text_account"] ?? null);
        echo "</legend>
                  
                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 621
        echo ($context["help_customer_online"] ?? null);
        echo "\">";
        echo ($context["entry_customer_online"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_online\" value=\"1\" ";
        // line 625
        if (($context["config_customer_online"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 626
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_online\" value=\"0\" ";
        // line 629
        if ( !($context["config_customer_online"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 630
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 637
        echo ($context["help_customer_activity"] ?? null);
        echo "\">";
        echo ($context["entry_customer_activity"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_activity\" value=\"1\" ";
        // line 641
        if (($context["config_customer_activity"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 642
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_activity\" value=\"0\" ";
        // line 645
        if ( !($context["config_customer_activity"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 646
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">";
        // line 652
        echo ($context["entry_customer_search"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_search\" value=\"1\" ";
        // line 655
        if (($context["config_customer_search"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 656
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_search\" value=\"0\" ";
        // line 659
        if ( !($context["config_customer_search"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 660
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-customer-group\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 667
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-control\">
                        ";
        // line 671
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 672
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 672);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 672) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                            ";
            // line 673
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 673);
            echo "
                          </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 676
        echo "                      </select>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 682
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      ";
        // line 685
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 686
            echo "                        <div class=\"form-check\">
                          <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 687
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 687);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 687), ($context["config_customer_group_display"] ?? null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                          <label class=\"form-check-label\">";
            // line 688
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 688);
            echo "</label>
                        </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 691
        echo "                      ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 692
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
                      ";
        }
        // line 694
        echo "                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 699
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 703
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 704
        echo ($context["text_yes"] ?? null);
        echo "</label>
                      </div>
                      <div class=\"form-check form-check-inline\">
                        <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 707
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                        <label class=\"form-check-label\">";
        // line 708
        echo ($context["text_no"] ?? null);
        echo "</label>
                      </div>
                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-login-attempts\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 715
        echo ($context["help_login_attempts"] ?? null);
        echo "\">";
        echo ($context["entry_login_attempts"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_login_attempts\" value=\"";
        // line 718
        echo ($context["config_login_attempts"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_login_attempts"] ?? null);
        echo "\" id=\"input-login-attempts\" class=\"form-control\" />
                      ";
        // line 719
        if (($context["error_login_attempts"] ?? null)) {
            // line 720
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_login_attempts"] ?? null);
            echo "</div>
                      ";
        }
        // line 722
        echo "                    </div>
                  </div>

                  <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-account\">
                      <span data-toggle=\"tooltip\" title=\"";
        // line 727
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
                    </label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_account_id\" id=\"input-account\" class=\"form-control\">
                        <option value=\"0\">";
        // line 731
        echo ($context["text_none"] ?? null);
        echo "</option>
                        ";
        // line 732
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 733
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 733);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 733) == ($context["config_account_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
                            ";
            // line 734
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 734);
            echo "
                          </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 737
        echo "                      </select>
                    </div>
                  </div>
                </fieldset>
            </div>
            <div class=\"tab-pane\" id=\"tab-image\">
              <div class=\"row mb-3\">
                  <label for=\"input-logo\" class=\"col-sm-2 col-form-label\">";
        // line 744
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 747
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 748
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 752
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 756
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <div class=\"row mb-3\">
                  <label for=\"input-icon\" class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 764
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 767
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-icon\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 768
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 772
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 776
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-server\">
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 785
        echo ($context["entry_maintenance"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"config_maintenance\" value=\"0\"/>
                    <input type=\"checkbox\" name=\"config_maintenance\" value=\"1\" id=\"input-maintenance\" class=\"form-check-input\"";
        // line 789
        if (($context["config_maintenance"] ?? null)) {
            echo " checked";
        }
        echo "/>
                  </div>
                  <div class=\"form-text\">";
        // line 791
        echo ($context["help_maintenance"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 795
        echo ($context["entry_seo_url"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"config_seo_url\" value=\"0\"/>
                    <input type=\"checkbox\" name=\"config_seo_url\" value=\"1\" id=\"input-seo-url\" class=\"form-check-input\"";
        // line 799
        if (($context["config_seo_url"] ?? null)) {
            echo " checked";
        }
        echo "/>
                  </div>
                  <div class=\"form-text\">";
        // line 801
        echo ($context["help_seo_url"] ?? null);
        echo "</div>
                </div>
              </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-robots\"><span data-toggle=\"tooltip\" title=\"";
        // line 806
        echo ($context["help_robots"] ?? null);
        echo "\">";
        echo ($context["entry_robots"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_robots\" rows=\"5\" placeholder=\"";
        // line 808
        echo ($context["entry_robots"] ?? null);
        echo "\" id=\"input-robots\" class=\"form-control\">";
        echo ($context["config_robots"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-compression\"><span data-toggle=\"tooltip\" title=\"";
        // line 813
        echo ($context["help_compression"] ?? null);
        echo "\">";
        echo ($context["entry_compression"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_compression\" value=\"";
        // line 815
        echo ($context["config_compression"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_compression"] ?? null);
        echo "\" id=\"input-compression\" class=\"form-control\" />
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 820
        echo ($context["help_secure"] ?? null);
        echo "\">";
        echo ($context["entry_secure"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <label class=\"radio-inline\"> 
                            ";
        // line 823
        if (($context["config_secure"] ?? null)) {
            // line 824
            echo "                                <input type=\"radio\" name=\"config_secure\" value=\"1\" checked=\"checked\" />
                                ";
            // line 825
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        } else {
            // line 827
            echo "                                <input type=\"radio\" name=\"config_secure\" value=\"1\" />
                                ";
            // line 828
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        }
        // line 830
        echo "                        </label>
                        <label class=\"radio-inline\"> 
                            ";
        // line 832
        if ( !($context["config_secure"] ?? null)) {
            // line 833
            echo "                                <input type=\"radio\" name=\"config_secure\" value=\"0\" checked=\"checked\" />
                                ";
            // line 834
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        } else {
            // line 836
            echo "                                <input type=\"radio\" name=\"config_secure\" value=\"0\" />
                                ";
            // line 837
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        }
        // line 839
        echo "                        </label>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 844
        echo ($context["help_password"] ?? null);
        echo "\">";
        echo ($context["entry_password"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <label class=\"radio-inline\"> 
                            ";
        // line 847
        if (($context["config_password"] ?? null)) {
            // line 848
            echo "                                <input type=\"radio\" name=\"config_password\" value=\"1\" checked=\"checked\" />
                                ";
            // line 849
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        } else {
            // line 851
            echo "                                <input type=\"radio\" name=\"config_password\" value=\"1\" />
                                ";
            // line 852
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        }
        // line 854
        echo "                        </label>
                        <label class=\"radio-inline\"> 
                            ";
        // line 856
        if ( !($context["config_password"] ?? null)) {
            // line 857
            echo "                                <input type=\"radio\" name=\"config_password\" value=\"0\" checked=\"checked\" />
                                ";
            // line 858
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        } else {
            // line 860
            echo "                                <input type=\"radio\" name=\"config_password\" value=\"0\" />
                                ";
            // line 861
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        }
        // line 863
        echo "                        </label>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 868
        echo ($context["help_shared"] ?? null);
        echo "\">";
        echo ($context["entry_shared"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <label class=\"radio-inline\"> 
                            ";
        // line 871
        if (($context["config_shared"] ?? null)) {
            // line 872
            echo "                                <input type=\"radio\" name=\"config_shared\" value=\"1\" checked=\"checked\" />
                                ";
            // line 873
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        } else {
            // line 875
            echo "                                <input type=\"radio\" name=\"config_shared\" value=\"1\" />
                                ";
            // line 876
            echo ($context["text_yes"] ?? null);
            echo "
                            ";
        }
        // line 878
        echo "                        </label>
                        <label class=\"radio-inline\"> 
                            ";
        // line 880
        if ( !($context["config_shared"] ?? null)) {
            // line 881
            echo "                                <input type=\"radio\" name=\"config_shared\" value=\"0\" checked=\"checked\" />
                                ";
            // line 882
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        } else {
            // line 884
            echo "                                <input type=\"radio\" name=\"config_shared\" value=\"0\" />
                                ";
            // line 885
            echo ($context["text_no"] ?? null);
            echo "
                            ";
        }
        // line 887
        echo "                        </label>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-encryption\"><span data-toggle=\"tooltip\" title=\"";
        // line 892
        echo ($context["help_encryption"] ?? null);
        echo "\">";
        echo ($context["entry_encryption"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_encryption\" rows=\"5\" placeholder=\"";
        // line 894
        echo ($context["entry_encryption"] ?? null);
        echo "\" id=\"input-encryption\" class=\"form-control\">";
        echo ($context["config_encryption"] ?? null);
        echo "</textarea>
                        ";
        // line 895
        if (($context["error_encryption"] ?? null)) {
            // line 896
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_encryption"] ?? null);
            echo "</div>
                        ";
        }
        // line 898
        echo "                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-file-max-size\"><span data-toggle=\"tooltip\" title=\"";
        // line 902
        echo ($context["help_file_max_size"] ?? null);
        echo "\">";
        echo ($context["entry_file_max_size"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"config_file_max_size\" value=\"";
        // line 904
        echo ($context["config_file_max_size"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_file_max_size"] ?? null);
        echo "\" id=\"input-file-max-size\" class=\"form-control\" />
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-file-ext-allowed\"><span data-toggle=\"tooltip\" title=\"";
        // line 909
        echo ($context["help_file_ext_allowed"] ?? null);
        echo "\">";
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_file_ext_allowed\" rows=\"5\" placeholder=\"";
        // line 911
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "\" id=\"input-file-ext-allowed\" class=\"form-control\">";
        echo ($context["config_file_ext_allowed"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-file-mime-allowed\"><span data-toggle=\"tooltip\" title=\"";
        // line 916
        echo ($context["help_file_mime_allowed"] ?? null);
        echo "\">";
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"config_file_mime_allowed\" rows=\"5\" placeholder=\"";
        // line 918
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "\" id=\"input-file-mime-allowed\" class=\"form-control\">";
        echo ($context["config_file_mime_allowed"] ?? null);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 923
        echo ($context["entry_error_display"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_display\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"config_error_display\" value=\"1\" id=\"input-error-display\" class=\"form-check-input\"";
        // line 927
        if (($context["config_error_display"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 932
        echo ($context["entry_error_log"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_log\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"config_error_log\" value=\"1\" id=\"input-error-log\" class=\"form-check-input\"";
        // line 936
        if (($context["config_error_log"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                    <label class=\"col-sm-2 col-form-label\" for=\"input-error-filename\">";
        // line 941
        echo ($context["entry_error_filename"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_error_filename\" value=\"";
        // line 943
        echo ($context["config_error_filename"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_error_filename"] ?? null);
        echo "\" id=\"input-error-filename\" class=\"form-control\" />
                      ";
        // line 944
        if (($context["error_log"] ?? null)) {
            // line 945
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_log"] ?? null);
            echo "</div>
                      ";
        }
        // line 946
        echo " </div>
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
        // line 958
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
        // line 981
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
        // line 990
        echo ($context["text_select"] ?? null);
        echo "</option>';
          if (json['zone'] && json['zone'] !== '') {
            for (let i = 0; i < json['zone'].length; i++) {
              html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
              if (json['zone'][i]['zone_id'] == '";
        // line 994
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                html += ' selected=\"selected\"';
              }
              html += '>' + json['zone'][i]['name'] + '</option>';
            }
          } else {
            html += '<option value=\"0\" selected=\"selected\">";
        // line 1000
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
        // line 1014
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
        return array (  2390 => 1014,  2373 => 1000,  2364 => 994,  2357 => 990,  2345 => 981,  2319 => 958,  2305 => 946,  2299 => 945,  2297 => 944,  2291 => 943,  2286 => 941,  2276 => 936,  2269 => 932,  2259 => 927,  2252 => 923,  2242 => 918,  2235 => 916,  2225 => 911,  2218 => 909,  2208 => 904,  2201 => 902,  2195 => 898,  2189 => 896,  2187 => 895,  2181 => 894,  2174 => 892,  2167 => 887,  2162 => 885,  2159 => 884,  2154 => 882,  2151 => 881,  2149 => 880,  2145 => 878,  2140 => 876,  2137 => 875,  2132 => 873,  2129 => 872,  2127 => 871,  2119 => 868,  2112 => 863,  2107 => 861,  2104 => 860,  2099 => 858,  2096 => 857,  2094 => 856,  2090 => 854,  2085 => 852,  2082 => 851,  2077 => 849,  2074 => 848,  2072 => 847,  2064 => 844,  2057 => 839,  2052 => 837,  2049 => 836,  2044 => 834,  2041 => 833,  2039 => 832,  2035 => 830,  2030 => 828,  2027 => 827,  2022 => 825,  2019 => 824,  2017 => 823,  2009 => 820,  1999 => 815,  1992 => 813,  1982 => 808,  1975 => 806,  1967 => 801,  1960 => 799,  1953 => 795,  1946 => 791,  1939 => 789,  1932 => 785,  1920 => 776,  1913 => 772,  1906 => 768,  1900 => 767,  1892 => 764,  1881 => 756,  1874 => 752,  1867 => 748,  1861 => 747,  1855 => 744,  1846 => 737,  1837 => 734,  1828 => 733,  1824 => 732,  1820 => 731,  1811 => 727,  1804 => 722,  1798 => 720,  1796 => 719,  1790 => 718,  1782 => 715,  1772 => 708,  1766 => 707,  1760 => 704,  1754 => 703,  1745 => 699,  1738 => 694,  1732 => 692,  1729 => 691,  1720 => 688,  1712 => 687,  1709 => 686,  1705 => 685,  1697 => 682,  1689 => 676,  1680 => 673,  1671 => 672,  1667 => 671,  1658 => 667,  1648 => 660,  1642 => 659,  1636 => 656,  1630 => 655,  1624 => 652,  1615 => 646,  1609 => 645,  1603 => 642,  1597 => 641,  1588 => 637,  1578 => 630,  1572 => 629,  1566 => 626,  1560 => 625,  1551 => 621,  1544 => 617,  1535 => 610,  1520 => 608,  1516 => 607,  1512 => 606,  1503 => 602,  1496 => 597,  1490 => 595,  1488 => 594,  1482 => 593,  1474 => 590,  1464 => 583,  1458 => 582,  1452 => 579,  1446 => 578,  1437 => 574,  1430 => 569,  1424 => 567,  1421 => 566,  1412 => 563,  1404 => 562,  1401 => 561,  1397 => 560,  1389 => 557,  1381 => 551,  1372 => 548,  1363 => 547,  1359 => 546,  1350 => 542,  1340 => 535,  1334 => 534,  1328 => 531,  1322 => 530,  1316 => 527,  1307 => 521,  1301 => 520,  1295 => 517,  1289 => 516,  1280 => 512,  1270 => 505,  1264 => 504,  1258 => 501,  1252 => 500,  1243 => 496,  1236 => 492,  1222 => 485,  1214 => 484,  1210 => 483,  1201 => 479,  1187 => 472,  1179 => 471,  1175 => 470,  1166 => 466,  1156 => 459,  1150 => 458,  1144 => 455,  1138 => 454,  1132 => 451,  1127 => 449,  1120 => 444,  1114 => 442,  1112 => 441,  1106 => 440,  1098 => 437,  1091 => 432,  1085 => 430,  1083 => 429,  1077 => 428,  1069 => 425,  1063 => 422,  1053 => 415,  1047 => 414,  1041 => 411,  1035 => 410,  1026 => 406,  1016 => 399,  1010 => 398,  1004 => 395,  998 => 394,  989 => 390,  983 => 387,  976 => 382,  970 => 380,  968 => 379,  962 => 378,  954 => 375,  944 => 368,  938 => 367,  932 => 364,  926 => 363,  917 => 359,  911 => 356,  903 => 350,  888 => 348,  884 => 347,  878 => 344,  871 => 339,  856 => 337,  852 => 336,  846 => 333,  839 => 329,  832 => 327,  825 => 323,  818 => 318,  803 => 316,  799 => 315,  791 => 314,  785 => 311,  778 => 306,  772 => 305,  764 => 303,  756 => 301,  753 => 300,  749 => 299,  740 => 295,  732 => 289,  726 => 288,  718 => 286,  710 => 284,  707 => 283,  703 => 282,  697 => 279,  690 => 274,  684 => 273,  676 => 271,  668 => 269,  665 => 268,  661 => 267,  655 => 264,  648 => 259,  642 => 258,  634 => 256,  626 => 254,  623 => 253,  619 => 252,  613 => 249,  602 => 241,  595 => 236,  589 => 235,  581 => 233,  573 => 231,  570 => 230,  566 => 229,  560 => 226,  555 => 223,  550 => 220,  540 => 216,  532 => 215,  528 => 213,  524 => 212,  516 => 209,  512 => 207,  510 => 206,  501 => 202,  493 => 199,  482 => 193,  474 => 190,  463 => 182,  459 => 181,  450 => 179,  444 => 176,  434 => 171,  429 => 169,  423 => 165,  417 => 163,  415 => 162,  409 => 161,  404 => 159,  398 => 155,  392 => 153,  390 => 152,  384 => 151,  379 => 149,  369 => 144,  361 => 141,  354 => 136,  348 => 134,  346 => 133,  340 => 132,  335 => 130,  329 => 126,  323 => 124,  321 => 123,  315 => 122,  310 => 120,  304 => 116,  298 => 114,  296 => 113,  290 => 112,  285 => 110,  277 => 104,  262 => 102,  258 => 101,  252 => 98,  243 => 91,  228 => 89,  224 => 88,  218 => 85,  208 => 80,  203 => 78,  193 => 73,  188 => 71,  182 => 67,  176 => 65,  174 => 64,  168 => 63,  163 => 61,  154 => 55,  148 => 52,  142 => 49,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

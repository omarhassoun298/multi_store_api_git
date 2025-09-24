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
class __TwigTemplate_cdd5348ecd2681329a0200de1eb4e21661192f228e79b621d86710d982cc9819 extends Template
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
        echo ($context["text_tax"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 358
        echo ($context["entry_tax"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"1\" ";
        // line 361
        if (($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 362
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_tax\" value=\"0\" ";
        // line 365
        if ( !($context["config_tax"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 366
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 373
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
          <option value=\"\">";
        // line 377
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 378
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 379
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
        // line 386
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
          <option value=\"\">";
        // line 390
        echo ($context["text_none"] ?? null);
        echo "</option>
          <option value=\"shipping\" ";
        // line 391
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
          <option value=\"payment\" ";
        // line 392
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
        // line 399
        echo ($context["text_account"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 402
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
          ";
        // line 406
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 407
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 407);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 407) == ($context["config_customer_group_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 408
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 408);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 411
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 417
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        ";
        // line 420
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 421
            echo "          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 422
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 422);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 422), ($context["config_customer_group_display"] ?? null))) {
                echo "checked=\"checked\"";
            }
            echo " />
            <label class=\"form-check-label\">";
            // line 423
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 423);
            echo "</label>
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 426
        echo "        ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 427
            echo "          <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
        ";
        }
        // line 429
        echo "      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 434
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"1\" ";
        // line 438
        if (($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 439
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_customer_price\" value=\"0\" ";
        // line 442
        if ( !($context["config_customer_price"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 443
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-account\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 450
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
          <option value=\"0\">";
        // line 454
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 455
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 456
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 456);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 456) == ($context["config_account_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 457
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 457);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 460
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 466
        echo ($context["text_checkout"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">";
        // line 468
        echo ($context["entry_cart_weight"] ?? null);
        echo "</label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"1\" ";
        // line 471
        if (($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 472
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_cart_weight\" value=\"0\" ";
        // line 475
        if ( !($context["config_cart_weight"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 476
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 483
        echo ($context["help_checkout_guest"] ?? null);
        echo "\">";
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"1\" ";
        // line 487
        if (($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 488
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_checkout_guest\" value=\"0\" ";
        // line 491
        if ( !($context["config_checkout_guest"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 492
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 499
        echo ($context["help_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
          <option value=\"0\">";
        // line 503
        echo ($context["text_none"] ?? null);
        echo "</option>
          ";
        // line 504
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 505
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 505);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 505) == ($context["config_checkout_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 506
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 506);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 509
        echo "        </select>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 515
        echo ($context["help_order_status"] ?? null);
        echo "\">";
        echo ($context["entry_order_status"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
          ";
        // line 519
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 520
            echo "            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 520);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 520) == ($context["config_order_status_id"] ?? null))) {
                echo "selected=\"selected\"";
            }
            echo ">
              ";
            // line 521
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 521);
            echo "
            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 524
        echo "        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>";
        // line 530
        echo ($context["text_stock"] ?? null);
        echo "</legend>
    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 533
        echo ($context["help_stock_display"] ?? null);
        echo "\">";
        echo ($context["entry_stock_display"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"1\" ";
        // line 537
        if (($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 538
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_display\" value=\"0\" ";
        // line 541
        if ( !($context["config_stock_display"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 542
        echo ($context["text_no"] ?? null);
        echo "</label>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <label class=\"col-sm-2 col-form-label\">
        <span data-toggle=\"tooltip\" title=\"";
        // line 549
        echo ($context["help_stock_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</span>
      </label>
      <div class=\"col-sm-10\">
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"1\" ";
        // line 553
        if (($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 554
        echo ($context["text_yes"] ?? null);
        echo "</label>
        </div>
        <div class=\"form-check form-check-inline\">
          <input class=\"form-check-input\" type=\"radio\" name=\"config_stock_checkout\" value=\"0\" ";
        // line 557
        if ( !($context["config_stock_checkout"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
          <label class=\"form-check-label\">";
        // line 558
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
        // line 567
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 570
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 571
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 575
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 579
        echo ($context["button_clear"] ?? null);
        echo "
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <div class=\"row mb-3\">
                  <label for=\"input-icon\" class=\"col-sm-2 col-form-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 587
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                      <div class=\"card image\">
                          <img src=\"";
        // line 590
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-icon\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\" />
                          <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 591
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                          <div class=\"card-body\">
                              <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-primary btn-sm btn-block\">
                                  <i class=\"fa-solid fa-pencil\"></i>
                                  ";
        // line 595
        echo ($context["button_edit"] ?? null);
        echo "
                              </button>
                              <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-icon\" data-oc-thumb=\"#thumb-icon\" class=\"btn btn-warning btn-sm btn-block\">
                                  <i class=\"fa-regular fa-trash-can\"></i>
                                  ";
        // line 599
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
        // line 614
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
        // line 637
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
        // line 646
        echo ($context["text_select"] ?? null);
        echo "</option>';
          if (json['zone'] && json['zone'] !== '') {
            for (let i = 0; i < json['zone'].length; i++) {
              html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
              if (json['zone'][i]['zone_id'] == '";
        // line 650
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                html += ' selected=\"selected\"';
              }
              html += '>' + json['zone'][i]['name'] + '</option>';
            }
          } else {
            html += '<option value=\"0\" selected=\"selected\">";
        // line 656
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
        // line 670
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
        return array (  1587 => 670,  1570 => 656,  1561 => 650,  1554 => 646,  1542 => 637,  1516 => 614,  1498 => 599,  1491 => 595,  1484 => 591,  1478 => 590,  1470 => 587,  1459 => 579,  1452 => 575,  1445 => 571,  1439 => 570,  1433 => 567,  1421 => 558,  1415 => 557,  1409 => 554,  1403 => 553,  1394 => 549,  1384 => 542,  1378 => 541,  1372 => 538,  1366 => 537,  1357 => 533,  1351 => 530,  1343 => 524,  1334 => 521,  1325 => 520,  1321 => 519,  1312 => 515,  1304 => 509,  1295 => 506,  1286 => 505,  1282 => 504,  1278 => 503,  1269 => 499,  1259 => 492,  1253 => 491,  1247 => 488,  1241 => 487,  1232 => 483,  1222 => 476,  1216 => 475,  1210 => 472,  1204 => 471,  1198 => 468,  1193 => 466,  1185 => 460,  1176 => 457,  1167 => 456,  1163 => 455,  1159 => 454,  1150 => 450,  1140 => 443,  1134 => 442,  1128 => 439,  1122 => 438,  1113 => 434,  1106 => 429,  1100 => 427,  1097 => 426,  1088 => 423,  1080 => 422,  1077 => 421,  1073 => 420,  1065 => 417,  1057 => 411,  1048 => 408,  1039 => 407,  1035 => 406,  1026 => 402,  1020 => 399,  1006 => 392,  998 => 391,  994 => 390,  985 => 386,  971 => 379,  963 => 378,  959 => 377,  950 => 373,  940 => 366,  934 => 365,  928 => 362,  922 => 361,  916 => 358,  911 => 356,  903 => 350,  888 => 348,  884 => 347,  878 => 344,  871 => 339,  856 => 337,  852 => 336,  846 => 333,  839 => 329,  832 => 327,  825 => 323,  818 => 318,  803 => 316,  799 => 315,  791 => 314,  785 => 311,  778 => 306,  772 => 305,  764 => 303,  756 => 301,  753 => 300,  749 => 299,  740 => 295,  732 => 289,  726 => 288,  718 => 286,  710 => 284,  707 => 283,  703 => 282,  697 => 279,  690 => 274,  684 => 273,  676 => 271,  668 => 269,  665 => 268,  661 => 267,  655 => 264,  648 => 259,  642 => 258,  634 => 256,  626 => 254,  623 => 253,  619 => 252,  613 => 249,  602 => 241,  595 => 236,  589 => 235,  581 => 233,  573 => 231,  570 => 230,  566 => 229,  560 => 226,  555 => 223,  550 => 220,  540 => 216,  532 => 215,  528 => 213,  524 => 212,  516 => 209,  512 => 207,  510 => 206,  501 => 202,  493 => 199,  482 => 193,  474 => 190,  463 => 182,  459 => 181,  450 => 179,  444 => 176,  434 => 171,  429 => 169,  423 => 165,  417 => 163,  415 => 162,  409 => 161,  404 => 159,  398 => 155,  392 => 153,  390 => 152,  384 => 151,  379 => 149,  369 => 144,  361 => 141,  354 => 136,  348 => 134,  346 => 133,  340 => 132,  335 => 130,  329 => 126,  323 => 124,  321 => 123,  315 => 122,  310 => 120,  304 => 116,  298 => 114,  296 => 113,  290 => 112,  285 => 110,  277 => 104,  262 => 102,  258 => 101,  252 => 98,  243 => 91,  228 => 89,  224 => 88,  218 => 85,  208 => 80,  203 => 78,  193 => 73,  188 => 71,  182 => 67,  176 => 65,  174 => 64,  168 => 63,  163 => 61,  154 => 55,  148 => 52,  142 => 49,  136 => 46,  130 => 43,  124 => 40,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

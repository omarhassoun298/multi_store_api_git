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
class __TwigTemplate_297d68199f5a192600b9089d444ad85972d249e369949a2877bbae47e654386a extends Template
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
        echo ($context["text_form"] ?? null);
        echo "
      </div>
      <div class=\"cart-body\">
        <form action=\"";
        // line 37
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-store\" class=\"form-setting\">
          <ul class=\"nav nav-tabs\" id=\"storeTabs\" role=\"tablist\">
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link active\" id=\"tab-general-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-general\" type=\"button\" role=\"tab\" aria-controls=\"tab-general\" aria-selected=\"true\">
                ";
        // line 41
        echo ($context["tab_general"] ?? null);
        echo "
              </button>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link\" id=\"tab-store-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-store\" type=\"button\" role=\"tab\" aria-controls=\"tab-store\" aria-selected=\"false\">
                ";
        // line 46
        echo ($context["tab_store"] ?? null);
        echo "
              </button>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link\" id=\"tab-local-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-local\" type=\"button\" role=\"tab\" aria-controls=\"tab-local\" aria-selected=\"false\">
                ";
        // line 51
        echo ($context["tab_local"] ?? null);
        echo "
              </button>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link\" id=\"tab-option-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-option\" type=\"button\" role=\"tab\" aria-controls=\"tab-option\" aria-selected=\"false\">
                ";
        // line 56
        echo ($context["tab_option"] ?? null);
        echo "
              </button>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link\" id=\"tab-image-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-image\" type=\"button\" role=\"tab\" aria-controls=\"tab-image\" aria-selected=\"false\">
                ";
        // line 61
        echo ($context["tab_image"] ?? null);
        echo "
              </button>
            </li>
            <li class=\"nav-item\" role=\"presentation\">
              <button class=\"nav-link\" id=\"tab-server-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-server\" type=\"button\" role=\"tab\" aria-controls=\"tab-server\" aria-selected=\"false\">
                ";
        // line 66
        echo ($context["tab_server"] ?? null);
        echo "
              </button>
            </li>
          </ul>

          <div class=\"tab-content mt-3\" id=\"storeTabsContent\">
              <div class=\"tab-pane fade show active\" id=\"tab-general\" role=\"tabpanel\" aria-labelledby=\"tab-general-tab\">
                  <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-url\"><span data-toggle=\"tooltip\" data-html=\"true\" title=\"";
        // line 74
        echo twig_escape_filter($this->env, ($context["help_url"] ?? null), "html");
        echo "\">";
        echo ($context["entry_url"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_url\" value=\"";
        // line 76
        echo ($context["config_url"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_url"] ?? null);
        echo "\" id=\"input-url\" class=\"form-control\" />
                      ";
        // line 77
        if (($context["error_url"] ?? null)) {
            // line 78
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_url"] ?? null);
            echo "</div>
                      ";
        }
        // line 80
        echo "                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-ssl\"><span data-toggle=\"tooltip\" data-html=\"true\" title=\"";
        // line 83
        echo ($context["help_ssl"] ?? null);
        echo "\">";
        echo ($context["entry_ssl"] ?? null);
        echo "</span></label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_ssl\" value=\"";
        // line 85
        echo ($context["config_ssl"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_ssl"] ?? null);
        echo "\" id=\"input-ssl\" class=\"form-control\" />
                    </div>
                  </div>
                  <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-meta-title\">";
        // line 89
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 91
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\" />
                      ";
        // line 92
        if (($context["error_meta_title"] ?? null)) {
            // line 93
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_meta_title"] ?? null);
            echo "</div>
                      ";
        }
        // line 95
        echo "                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-meta-description\">";
        // line 98
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 100
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-meta-keyword\">";
        // line 104
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 106
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-theme\">";
        // line 110
        echo ($context["entry_theme"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_theme\" id=\"input-theme\" class=\"form-control\">
                        ";
        // line 113
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 114
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 114) == ($context["config_theme"] ?? null))) {
                // line 115
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 115);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 115);
                echo "</option>
                        ";
            } else {
                // line 117
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 117);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 117);
                echo "</option>
                        ";
            }
            // line 119
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "                      </select>
                      <br/>
                      <img src=\"\" alt=\"\" id=\"theme\" class=\"img-thumbnail\" /></div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-layout\">";
        // line 125
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-control\">
                        ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 129
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 129) == ($context["config_layout_id"] ?? null))) {
                // line 130
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 130);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 130);
                echo "</option>
                        ";
            } else {
                // line 132
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 132);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 132);
                echo "</option>
                        ";
            }
            // line 134
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "                      </select>
                    </div>
                  </div>
              </div>
              <div class=\"tab-pane fade\" id=\"tab-store\" role=\"tabpanel\" aria-labelledby=\"tab-store-tab\">
                <!-- Your form content for Store -->
              </div>
              <div class=\"tab-pane fade\" id=\"tab-local\" role=\"tabpanel\" aria-labelledby=\"tab-local-tab\">
                <!-- Your form content for Local -->
              </div>
              <div class=\"tab-pane fade\" id=\"tab-option\" role=\"tabpanel\" aria-labelledby=\"tab-option-tab\">
                <!-- Your form content for Options -->
              </div>
              <div class=\"tab-pane fade\" id=\"tab-image\" role=\"tabpanel\" aria-labelledby=\"tab-image-tab\">
                <!-- Your form content for Images -->
              </div>
              <div class=\"tab-pane fade\" id=\"tab-server\" role=\"tabpanel\" aria-labelledby=\"tab-server-tab\">
                <!-- Your form content for Server -->
              </div>
           </div>
        </form>
      </div>
    </div>

  </div>
  <script type=\"text/javascript\"><!--
\$('select[name=\\'config_theme\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=setting/setting/theme&user_token=";
        // line 163
        echo ($context["user_token"] ?? null);
        echo "&theme=' + this.value,
\t\tdataType: 'html',
\t\tbeforeSend: function() {
\t\t\t\$('select[name=\\'config_theme\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('select[name=\\'config_theme\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(html) {
\t\t\t\$('#theme').attr('src', html);
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('select[name=\\'config_theme\\']').trigger('change');
//--></script>   <script type=\"text/javascript\"><!--
\$('select[name=\\'config_country_id\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=localisation/country/country&user_token=";
        // line 184
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('select[name=\\'config_country_id\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('select[name=\\'config_country_id\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(json) {
\t\t\thtml = '<option value=\"\">";
        // line 193
        echo ($context["text_select"] ?? null);
        echo "</option>';

\t\t\tif (json['zone'] && json['zone'] != '') {
\t\t\t\tfor (i = 0; i < json['zone'].length; i++) {
\t\t\t\t\thtml += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

\t\t\t\t\tif (json['zone'][i]['zone_id'] == '";
        // line 199
        echo ($context["config_zone_id"] ?? null);
        echo "') {
\t\t\t\t\t\thtml += ' selected=\"selected\"';
\t\t\t\t\t}

\t\t\t\t\thtml += '>' + json['zone'][i]['name'] + '</option>';
\t\t\t\t}
\t\t\t} else {
\t\t\t\thtml += '<option value=\"0\" selected=\"selected\">";
        // line 206
        echo ($context["text_none"] ?? null);
        echo "</option>';
\t\t\t}

\t\t\t\$('select[name=\\'config_zone_id\\']').html(html);
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('select[name=\\'config_country_id\\']').trigger('change');
//--></script></div>
";
        // line 219
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
        return array (  448 => 219,  432 => 206,  422 => 199,  413 => 193,  401 => 184,  377 => 163,  347 => 135,  341 => 134,  333 => 132,  325 => 130,  322 => 129,  318 => 128,  312 => 125,  305 => 120,  299 => 119,  291 => 117,  283 => 115,  280 => 114,  276 => 113,  270 => 110,  261 => 106,  256 => 104,  247 => 100,  242 => 98,  237 => 95,  231 => 93,  229 => 92,  223 => 91,  218 => 89,  209 => 85,  202 => 83,  197 => 80,  191 => 78,  189 => 77,  183 => 76,  176 => 74,  165 => 66,  157 => 61,  149 => 56,  141 => 51,  133 => 46,  125 => 41,  118 => 37,  112 => 34,  108 => 32,  100 => 28,  97 => 27,  89 => 23,  87 => 22,  81 => 18,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/store_form.twig", "");
    }
}

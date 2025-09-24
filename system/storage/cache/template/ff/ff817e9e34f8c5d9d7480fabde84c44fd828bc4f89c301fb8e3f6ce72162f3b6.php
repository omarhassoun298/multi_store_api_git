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

/* extension/module/shopping_cart_rest_api.twig */
class __TwigTemplate_ba54a83e41fefe35f73460fad2ac28b2728c8dc0c7b9c43ee899706cb469f602 extends Template
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
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"save-changes btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "          <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "      <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>
    ";
        }
        // line 22
        echo "    ";
        if (($context["install_success"] ?? null)) {
            // line 23
            echo "      <div class=\"alert alert-success\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["install_success"] ?? null);
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>
    ";
        }
        // line 27
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 29
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        ";
        // line 32
        if (twig_test_empty(($context["module_shopping_cart_rest_api_licensed_on"] ?? null))) {
            // line 33
            echo "          ";
            echo ($context["xcDLOMddkCV"] ?? null);
            echo "
        ";
        }
        // line 35
        echo "        <form action=\"";
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 37
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"module_shopping_cart_rest_api_status\" id=\"input-status\" class=\"form-control restapi_status\">
                ";
        // line 40
        if (($context["module_shopping_cart_rest_api_status"] ?? null)) {
            // line 41
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\">";
            // line 42
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        } else {
            // line 44
            echo "                  <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 45
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        }
        // line 47
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-client_id\">
              <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 52
        echo ($context["text_client_id"] ?? null);
        echo "\">
                ";
        // line 53
        echo ($context["entry_client_id"] ?? null);
        echo "
              </span>
            </label>
            <div class=\"col-sm-10\">
              <input class=\"form-control\" type=\"text\" name=\"module_shopping_cart_rest_api_client_id\" value=\"";
        // line 57
        echo ($context["module_shopping_cart_rest_api_client_id"] ?? null);
        echo "\" required=\"required\"  />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-client_secret\">
                  <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 62
        echo ($context["text_client_secret"] ?? null);
        echo "\">
                    ";
        // line 63
        echo ($context["entry_client_secret"] ?? null);
        echo "
                  </span>
            </label>
            <div class=\"col-sm-10\">
              <input class=\"form-control\" type=\"text\" name=\"module_shopping_cart_rest_api_client_secret\" value=\"";
        // line 67
        echo ($context["module_shopping_cart_rest_api_client_secret"] ?? null);
        echo "\" required=\"required\"  />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-order-id\">
                  <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 72
        echo ($context["text_basic_token"] ?? null);
        echo "\">
                    ";
        // line 73
        echo ($context["entry_basic_token"] ?? null);
        echo "
                  </span>
            </label>
            <div class=\"col-sm-10\">
              <input class=\"form-control basic_token\" id=\"input-key\" type=\"text\" name=\"basic_token\"
                     value=\"";
        // line 78
        echo ($context["basic_token"] ?? null);
        echo "\" readonly />
              <br>
              <button type=\"button\" id=\"button-generate\" class=\"btn btn-primary\"><i class=\"fa fa-refresh\"></i> ";
        // line 80
        echo ($context["button_generate_basic_token"] ?? null);
        echo "</button>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-token_ttl\">
                  <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 85
        echo ($context["text_token_ttl"] ?? null);
        echo "\">
                    ";
        // line 86
        echo ($context["entry_token_ttl"] ?? null);
        echo "
                  </span>
            </label>
            <div class=\"col-sm-10\">
              <input class=\"form-control\" type=\"text\" name=\"module_shopping_cart_rest_api_token_ttl\" value=\"";
        // line 90
        echo ($context["module_shopping_cart_rest_api_token_ttl"] ?? null);
        echo "\" required=\"required\"  />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-allowed-ip\">
                    <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 95
        echo ($context["text_allowed_ip"] ?? null);
        echo "\">
                      ";
        // line 96
        echo ($context["entry_allowed_ip"] ?? null);
        echo "
                    </span>
            </label>
            <div class=\"col-sm-10\">
              <input class=\"form-control\" type=\"text\" name=\"module_shopping_cart_rest_api_allowed_ip\"
                     value=\"";
        // line 101
        echo ($context["module_shopping_cart_rest_api_allowed_ip"] ?? null);
        echo "\"/>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-entry-order-id\">
                  <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 106
        echo ($context["text_order_id"] ?? null);
        echo "\">
                    ";
        // line 107
        echo ($context["entry_order_id"] ?? null);
        echo "
                  </span>
            </label>
            <div class=\"col-sm-10\">
              ";
        // line 111
        if (twig_test_empty(($context["module_shopping_cart_rest_api_licensed_on"] ?? null))) {
            // line 112
            echo "              <div class=\"restAPILicenseError\"></div>
              <div class=\"restAPILicenseSuccess\"></div>
              <div class=\"restAPILicenseInfo\"></div>
              <table class=\"table\">
                <tr>
                  <td colspan=\"2\" style=\"border: none;\">
                    <input type=\"text\" class=\"rest_api_ord_id form-control\" placeholder=\"REST-XXX-XXX\" name=\"module_shopping_cart_rest_api_order_id\" id=\"module_shopping_cart_rest_api_order_id\" value=\"";
            // line 118
            echo ($context["module_shopping_cart_rest_api_order_id"] ?? null);
            echo "\" required=\"required\" />
                    <br>
                    <button type=\"button\" class=\"btn btn-success activateLicenseButton\"><i class=\"icon-ok\"></i> Activate License</button>
                  </td>
                </tr>
              </table>
                <script type=\"text/javascript\">
                  var domain='";
            // line 125
            echo ($context["hostname"] ?? null);
            echo "';
                  var timenow=";
            // line 126
            echo twig_date_format_filter($this->env, "now", "U");
            echo ";
                </script>
                <script type=\"text/javascript\" src=\"//license.opencart-api.com/validate.js?v=";
            // line 128
            echo twig_date_format_filter($this->env, "now", "U");
            echo "\"></script>
              ";
        }
        // line 130
        echo "
              ";
        // line 131
        if ( !twig_test_empty(($context["module_shopping_cart_rest_api_licensed_on"] ?? null))) {
            // line 132
            echo "                <input type=\"hidden\" class=\"rest_api_ord_id form-control\" name=\"module_shopping_cart_rest_api_order_id\" id=\"module_shopping_cart_rest_api_order_id\" value=\"";
            echo ($context["module_shopping_cart_rest_api_order_id"] ?? null);
            echo "\" required=\"required\" />
                <input name=\"nJvNVJoMHcQVIuHk\" type=\"hidden\" value=\"";
            // line 133
            echo ($context["module_shopping_cart_rest_api_licensed_on"] ?? null);
            echo "\" />
                <table class=\"table licensedTable\">
                  <tr>
                    <td style=\"border:none;\"><b>";
            // line 136
            echo ($context["module_shopping_cart_rest_api_order_id"] ?? null);
            echo "</b>
                      <span style=\"text-align:center;background-color:#c0f7a5;display: inline-block;padding: 5px 10px;\">VALID LICENSE</span>
                    </td>
                  </tr>
                </table>
              ";
        }
        // line 142
        echo "            </div>
          </div>
        </form>

        <div class=\"alert alert-info\">
          <h4><i class=\"fa fa-info\"></i> Info</h4>
          <p>Please follow the instructions in install.txt to install REST API extension.</p>
          <p>If you need help please check out our <a
                    href=\"https://opencart-api.com/opencart-rest-api-documentations/?utm=oauth_shopping\"
                    target=\"_blank\" class=\"alert-link\">Documentation</a>
            - You will find walkthrough <a href=\"https://opencart-api.com/tutorial/?utm=oauth_shopping\"
                                           target=\"_blank\" class=\"alert-link\">videos</a>,
            <a href=\"https://opencart-api.com/faqs/?utm=oauth_shopping\" target=\"_blank\" class=\"alert-link\">FAQs</a>,
            <a href=\"https://opencart-api.com/forum/?utm=oauth_shopping\" target=\"_blank\" class=\"alert-link\">forum</a>
            and more.
          </p>
          <p>
            You can find working PHP demo scripts <a
                    href=\"https://opencart-api.com/opencart-rest-api-demo-clients/?utm=oauth_shopping\"
                    target=\"_blank\" class=\"alert-link\">here</a>.
          </p>
          <p>
            If you have any questions about the extension, please do not hesitate to <a
                    href=\"https://opencart-api.com/contact/?utm=oauth_shopping\" target=\"_blank\"
                    class=\"alert-link\">contact us</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
  \$('#button-generate').on('click', function() {
    var client_id = \$('[name=module_shopping_cart_rest_api_client_id]').val();
    var client_secret = \$('[name=module_shopping_cart_rest_api_client_secret]').val();
    if(client_id.length < 1 || client_secret.length < 1) {
      alert(\"Client ID and client secret are required!\");
    } else {
      var b64 = btoa(client_id+\":\"+client_secret);
      \$('.basic_token').val(b64);
    }
  });
  //--></script>
";
        // line 185
        echo ($context["footer"] ?? null);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "extension/module/shopping_cart_rest_api.twig";
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
        return array (  379 => 185,  334 => 142,  325 => 136,  319 => 133,  314 => 132,  312 => 131,  309 => 130,  304 => 128,  299 => 126,  295 => 125,  285 => 118,  277 => 112,  275 => 111,  268 => 107,  264 => 106,  256 => 101,  248 => 96,  244 => 95,  236 => 90,  229 => 86,  225 => 85,  217 => 80,  212 => 78,  204 => 73,  200 => 72,  192 => 67,  185 => 63,  181 => 62,  173 => 57,  166 => 53,  162 => 52,  155 => 47,  150 => 45,  145 => 44,  140 => 42,  135 => 41,  133 => 40,  127 => 37,  121 => 35,  115 => 33,  113 => 32,  107 => 29,  103 => 27,  95 => 23,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/shopping_cart_rest_api.twig", "");
    }
}

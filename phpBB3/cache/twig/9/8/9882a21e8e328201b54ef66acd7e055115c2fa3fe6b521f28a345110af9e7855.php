<?php

/* memberlist_email.html */
class __TwigTemplate_9882a21e8e328201b54ef66acd7e055115c2fa3fe6b521f28a345110af9e7855 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "memberlist_email.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        if ((isset($context["S_CONTACT_ADMIN"]) ? $context["S_CONTACT_ADMIN"] : null)) {
            // line 4
            echo "<h2 class=\"titlespace\">";
            echo $this->env->getExtension('phpbb')->lang("CONTACT_ADMIN");
            echo "</h2>
";
        } elseif (        // line 5
(isset($context["S_SEND_USER"]) ? $context["S_SEND_USER"] : null)) {
            // line 6
            echo "<h2 class=\"titlespace\">";
            echo $this->env->getExtension('phpbb')->lang("SEND_EMAIL_USER");
            echo "</h2>
";
        } else {
            // line 8
            echo "<h2 class=\"titlespace\">";
            echo $this->env->getExtension('phpbb')->lang("EMAIL_TOPIC");
            echo "</h2>
";
        }
        // line 10
        echo "
<form method=\"post\" action=\"";
        // line 11
        echo (isset($context["S_POST_ACTION"]) ? $context["S_POST_ACTION"] : null);
        echo "\" id=\"post\">

\t";
        // line 13
        if ((isset($context["CONTACT_INFO"]) ? $context["CONTACT_INFO"] : null)) {
            // line 14
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t\t<div class=\"postbody\">
\t\t\t\t<div class=\"content\">
\t\t\t\t\t";
            // line 18
            echo (isset($context["CONTACT_INFO"]) ? $context["CONTACT_INFO"] : null);
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t\t<br class=\"clear\" />
\t";
        }
        // line 25
        echo "
\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t<div class=\"content\">

\t\t";
        // line 30
        if ((isset($context["ERROR_MESSAGE"]) ? $context["ERROR_MESSAGE"] : null)) {
            echo "<p class=\"error\">";
            echo (isset($context["ERROR_MESSAGE"]) ? $context["ERROR_MESSAGE"] : null);
            echo "</p>";
        }
        // line 31
        echo "\t\t<fieldset class=\"fields2\">
\t\t";
        // line 32
        if ((isset($context["S_SEND_USER"]) ? $context["S_SEND_USER"] : null)) {
            // line 33
            echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
            // line 34
            echo $this->env->getExtension('phpbb')->lang("RECIPIENT");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><strong>";
            // line 35
            echo (isset($context["USERNAME_FULL"]) ? $context["USERNAME_FULL"] : null);
            echo "</strong></dd>
\t\t\t</dl>
\t\t\t<dl>
\t\t\t\t<dt><label for=\"subject\">";
            // line 38
            echo $this->env->getExtension('phpbb')->lang("SUBJECT");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"subject\" id=\"subject\" size=\"50\" tabindex=\"1\" value=\"";
            // line 39
            echo (isset($context["SUBJECT"]) ? $context["SUBJECT"] : null);
            echo "\" /></dd>
\t\t\t</dl>
\t\t";
        } elseif (        // line 41
(isset($context["S_CONTACT_ADMIN"]) ? $context["S_CONTACT_ADMIN"] : null)) {
            // line 42
            echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
            // line 43
            echo $this->env->getExtension('phpbb')->lang("RECIPIENT");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><strong>";
            // line 44
            echo $this->env->getExtension('phpbb')->lang("ADMINISTRATOR");
            echo "</strong></dd>
\t\t\t</dl>
\t\t\t";
            // line 46
            if ( !(isset($context["S_IS_REGISTERED"]) ? $context["S_IS_REGISTERED"] : null)) {
                // line 47
                echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"email\">";
                // line 48
                echo $this->env->getExtension('phpbb')->lang("SENDER_EMAIL_ADDRESS");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"email\" id=\"email\" size=\"50\" maxlength=\"100\" tabindex=\"1\" value=\"";
                // line 49
                echo (isset($context["EMAIL"]) ? $context["EMAIL"] : null);
                echo "\" /></dd>
\t\t\t</dl>
\t\t\t<dl>
\t\t\t\t<dt><label for=\"name\">";
                // line 52
                echo $this->env->getExtension('phpbb')->lang("SENDER_NAME");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"name\" id=\"name\" size=\"50\" tabindex=\"2\" value=\"";
                // line 53
                echo (isset($context["NAME"]) ? $context["NAME"] : null);
                echo "\" /></dd>
\t\t\t</dl>
\t\t\t";
            }
            // line 56
            echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"subject\">";
            // line 57
            echo $this->env->getExtension('phpbb')->lang("SUBJECT");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"subject\" id=\"subject\" size=\"50\" tabindex=\"3\" value=\"";
            // line 58
            echo (isset($context["SUBJECT"]) ? $context["SUBJECT"] : null);
            echo "\" /></dd>
\t\t\t</dl>
\t\t";
        } else {
            // line 61
            echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"email\">";
            // line 62
            echo $this->env->getExtension('phpbb')->lang("EMAIL_ADDRESS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"email\" name=\"email\" id=\"email\" size=\"50\" maxlength=\"100\" tabindex=\"2\" value=\"";
            // line 63
            echo (isset($context["EMAIL"]) ? $context["EMAIL"] : null);
            echo "\" /></dd>
\t\t\t</dl>
\t\t\t<dl>
\t\t\t\t<dt><label for=\"name\">";
            // line 66
            echo $this->env->getExtension('phpbb')->lang("REAL_NAME");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"name\" id=\"name\" size=\"50\" tabindex=\"3\" value=\"";
            // line 67
            echo (isset($context["NAME"]) ? $context["NAME"] : null);
            echo "\" /></dd>
\t\t\t</dl>
\t\t\t<dl>
\t\t\t\t<dt><label for=\"lang\">";
            // line 70
            echo $this->env->getExtension('phpbb')->lang("DEST_LANG");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label><br />
\t\t\t\t\t<span>";
            // line 71
            echo $this->env->getExtension('phpbb')->lang("DEST_LANG_EXPLAIN");
            echo "</span></dt>
\t\t\t\t<dd><select name=\"lang\">";
            // line 72
            echo (isset($context["S_LANG_OPTIONS"]) ? $context["S_LANG_OPTIONS"] : null);
            echo "</select></dd>
\t\t\t</dl>
\t\t";
        }
        // line 75
        echo "\t\t<dl>
\t\t\t<dt><label for=\"message\">";
        // line 76
        echo $this->env->getExtension('phpbb')->lang("MESSAGE_BODY");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label><br />
\t\t\t<span>";
        // line 77
        echo $this->env->getExtension('phpbb')->lang("EMAIL_BODY_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><textarea class=\"inputbox\" name=\"message\" id=\"message\" rows=\"15\" cols=\"76\" tabindex=\"4\">";
        // line 78
        echo (isset($context["MESSAGE"]) ? $context["MESSAGE"] : null);
        echo "</textarea></dd>
\t\t</dl>
\t\t";
        // line 80
        if ((isset($context["S_REGISTERED_USER"]) ? $context["S_REGISTERED_USER"] : null)) {
            // line 81
            echo "\t\t<dl>
\t\t\t<dt>&nbsp;</dt>
\t\t\t<dd><label for=\"cc_sender\"><input type=\"checkbox\" name=\"cc_sender\" id=\"cc_sender\" value=\"1\" checked=\"checked\" tabindex=\"5\" /> ";
            // line 83
            echo $this->env->getExtension('phpbb')->lang("CC_SENDER");
            echo "</label></dd>
\t\t</dl>
\t\t";
        }
        // line 86
        echo "\t\t</fieldset>
\t</div>

\t</div>
</div>

<div class=\"panel\">
\t<div class=\"inner\">
\t<div class=\"content\">
\t\t<fieldset class=\"submit-buttons\">
\t\t\t<input type=\"submit\" tabindex=\"6\" name=\"submit\" class=\"button1\" value=\"";
        // line 96
        echo $this->env->getExtension('phpbb')->lang("SEND_EMAIL");
        echo "\" />
\t\t</fieldset>
\t</div>
\t</div>
";
        // line 100
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
</div>

</form>

";
        // line 105
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "memberlist_email.html", 105)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "memberlist_email.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 105,  267 => 100,  260 => 96,  248 => 86,  242 => 83,  238 => 81,  236 => 80,  231 => 78,  227 => 77,  222 => 76,  219 => 75,  213 => 72,  209 => 71,  204 => 70,  198 => 67,  193 => 66,  187 => 63,  182 => 62,  179 => 61,  173 => 58,  168 => 57,  165 => 56,  159 => 53,  154 => 52,  148 => 49,  143 => 48,  140 => 47,  138 => 46,  133 => 44,  128 => 43,  125 => 42,  123 => 41,  118 => 39,  113 => 38,  107 => 35,  102 => 34,  99 => 33,  97 => 32,  94 => 31,  88 => 30,  81 => 25,  71 => 18,  65 => 14,  63 => 13,  58 => 11,  55 => 10,  49 => 8,  43 => 6,  41 => 5,  36 => 4,  34 => 3,  31 => 2,  19 => 1,);
    }
}

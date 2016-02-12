<?php

/* viewtopic_print.html */
class __TwigTemplate_e20c9fb892f2c9233b79e1ccd0bc3aef64dc5eb596845d7aed4742fedc0ad98e extends Twig_Template
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
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo (isset($context["S_CONTENT_DIRECTION"]) ? $context["S_CONTENT_DIRECTION"] : null);
        echo "\" lang=\"";
        echo (isset($context["S_USER_LANG"]) ? $context["S_USER_LANG"] : null);
        echo "\">
<head>
<meta charset=\"utf-8\" />
<meta name=\"robots\" content=\"noindex\" />
";
        // line 6
        echo (isset($context["META"]) ? $context["META"] : null);
        echo "
<title>";
        // line 7
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo " &bull; ";
        echo (isset($context["PAGE_TITLE"]) ? $context["PAGE_TITLE"] : null);
        echo "</title>

<link href=\"";
        // line 9
        echo (isset($context["T_THEME_PATH"]) ? $context["T_THEME_PATH"] : null);
        echo "/print.css\" rel=\"stylesheet\">
";
        // line 10
        // line 11
        echo "</head>
<body id=\"phpbb\">
<div id=\"wrap\">
\t<a id=\"top\" class=\"anchor\" accesskey=\"t\"></a>

\t<div id=\"page-header\">
\t\t<h1>";
        // line 17
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "</h1>
\t\t<p>";
        // line 18
        echo (isset($context["SITE_DESCRIPTION"]) ? $context["SITE_DESCRIPTION"] : null);
        echo "<br /><a href=\"";
        echo (isset($context["U_FORUM"]) ? $context["U_FORUM"] : null);
        echo "\">";
        echo (isset($context["U_FORUM"]) ? $context["U_FORUM"] : null);
        echo "</a></p>

\t\t<h2>";
        // line 20
        echo (isset($context["TOPIC_TITLE"]) ? $context["TOPIC_TITLE"] : null);
        echo "</h2>
\t\t<p><a href=\"";
        // line 21
        echo (isset($context["U_TOPIC"]) ? $context["U_TOPIC"] : null);
        echo "\">";
        echo (isset($context["U_TOPIC"]) ? $context["U_TOPIC"] : null);
        echo "</a></p>
\t</div>

\t<div id=\"page-body\">
\t\t<div class=\"page-number\">";
        // line 25
        echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
        echo "</div>
\t\t";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "postrow", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["postrow"]) {
            // line 27
            echo "\t\t\t<div class=\"post\">
\t\t\t\t<h3>";
            // line 28
            echo $this->getAttribute($context["postrow"], "POST_SUBJECT", array());
            echo "</h3>
\t\t\t\t<div class=\"date\">";
            // line 29
            echo $this->env->getExtension('phpbb')->lang("POSTED");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <strong>";
            echo $this->getAttribute($context["postrow"], "POST_DATE", array());
            echo "</strong></div>
\t\t\t\t<div class=\"author\">";
            // line 30
            echo $this->env->getExtension('phpbb')->lang("POST_BY_AUTHOR");
            echo " <strong>";
            echo $this->getAttribute($context["postrow"], "POST_AUTHOR", array());
            echo "</strong></div>
\t\t\t\t<div class=\"content\">";
            // line 31
            echo $this->getAttribute($context["postrow"], "MESSAGE", array());
            echo "</div>
\t\t\t</div>
\t\t\t<hr />
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "\t</div>

\t<div id=\"page-footer\">
\t\t<div class=\"page-number\">";
        // line 38
        echo (isset($context["S_TIMEZONE"]) ? $context["S_TIMEZONE"] : null);
        echo "<br />";
        echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
        echo "</div>
\t\t<div class=\"copyright\">Powered by phpBB&reg; Forum Software &copy; phpBB Limited<br />https://www.phpbb.com/</div>
\t</div>
</div>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "viewtopic_print.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 38,  119 => 35,  109 => 31,  103 => 30,  96 => 29,  92 => 28,  89 => 27,  85 => 26,  81 => 25,  72 => 21,  68 => 20,  59 => 18,  55 => 17,  47 => 11,  46 => 10,  42 => 9,  35 => 7,  31 => 6,  22 => 2,  19 => 1,);
    }
}

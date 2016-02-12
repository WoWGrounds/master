<?php
define("ACMS", TRUE);

//Include Parser Files
  include("../../config/config.php");
  $connect = new mysqli("$db_host", "$db_user", "$db_pass")or die(mysql_error());
  
  include("../../lib/sql.php");
    include("../../lib/global.php");
      include("../../parser/template.php");
        include("./shout_parse.php");

$shout = "
<!-- Shoutbox {data} -->
<!-- Shoutbox {module.shoutbox.data} -->
  <div class=\"shout-back\">
    {date} By <a href=\"?page=new_message&action=member&user={author}\">{author}</a>:<br/>
    {body}<br/>
  </div>
<!-- {/module.shoutbox.data} -->
<!-- {/data} -->
<div class=\"shout-back\">
  <center><a href=\"?p={prev}#shout\">Previous</a> - <a href=\"?p={next}#shout\">Next</a></center>
</div>
";

//Define Parser
  $replace = new style;
  
//Parse & Return Shouts.
  echo $replace->parse($shout, $data);
?>
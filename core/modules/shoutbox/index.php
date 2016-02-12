<?php if(!defined('ACMS')){ header("Location: ../../../"); }

include("./core/modules/shoutbox/function.php");

$shout = new shoutbox;
  $shout = array(
  "js" => "<script type=\"text/javascript\" src=\"./core/modules/shoutbox/js/shout.js\"></script>",
  "data" => $shout->get,
  "prev" => $shout->prev,
  "next" => $shout->next,
  "post_shout" => post_shout(),
  );
    return $shout;
?>
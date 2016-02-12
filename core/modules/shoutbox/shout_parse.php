<?php
if(!defined('ACMS')){ header("Location: ../../"); }

include("./function_refresh.php");

$shout = new shoutbox;
  $data = array(
  "data" => $shout->get,
  "prev" => $shout->prev,
  "next" => $shout->next,
  );
?>
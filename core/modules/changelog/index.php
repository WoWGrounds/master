<?php if(!defined('ACMS')){ header("Location: ../../../"); }

class changelog
{
  public $get = array();
  
  function changelog()
  {
    global $db, $db_data;
      include("./core/modules/changelog/config.php");
    
    $sql = $db->query("SELECT id, title, author, body, date FROM $db_data.clog ORDER BY id DESC LIMIT $config_limit");
      while($get = $db->get($sql))
        $this->get[] = bbcode($get);
          //$this->get[] = str_replace(array("\r\n", "\r", "\n"), "<br />", bbcode($get));
  }
}

$change = new changelog;
  $change = array(
  "list" => $change->get,
  );
    return $change;
?>
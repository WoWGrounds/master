<?php if(!defined('ACMS')){ header("Location: ../../../"); }
class shoutbox
{
  public $get = array();
  
  function shoutbox()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, author, body, date FROM $db_data.shouts ORDER BY id DESC LIMIT 2000");
      while($get = $db->get($sql))
        $this->get[] = bbcode($get);
  }
}

function shout_truncate()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "manage_shoutbox" && $_GET['action'] == "truncate")
  {
    $sql = $db->query("TRUNCATE $db_data.shouts");
      header("Location: ?page=manage_shoutbox");
  }
  
  if(isset($_GET['page']) && isset($_GET['action']) && isset($_GET['id']) && $_GET['page'] == "manage_shoutbox" && $_GET['action'] == "delete")
  {
    $id = clean($_GET['id']);
    
    if(!empty($id))
    {
      $sql = $db->query("DELETE FROM $db_data.shouts WHERE id='$id'");
        header("Location: ?page=manage_shoutbox");
    }
  }
}

$shout = new shoutbox;
  $shout = array(
  "shouts" => $shout->get,
  "truncate" => shout_truncate(),
  );
  
  return $shout;
?>
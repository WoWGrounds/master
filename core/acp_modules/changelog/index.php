<?php if(!defined('ACMS')){ header("Location: ../../../"); }

class clog_list
{
  public $get = array();
  
  function clog_list()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, title, author, date FROM $db_data.clog ORDER BY id DESC");
      while($get = $db->get($sql))
        $this->get[] = $get;
  }
}

class clog_edit
{
  public $data = array();
  
  function clog_edit()
  {
    if(isset($_GET['page']) && $_GET['page'] == "manage_clog")
    {
      global $db, $db_data, $admin;
      
      if(isset($_POST['edit']))
      {
        $id = clean($_POST['id']);
        
        $sql = $db->query("SELECT id, title, author, body, date FROM $db_data.clog WHERE id='$id'");
          while($get = $db->get($sql))
            $this->data = $get;
      }
      else
      {
        $data = array(
        "id" => "0",
        "title" => "",
        "author" => "",
        "body" => "",
        "date" => "",
        );
        
        $this->data = $data;
      }
      
      if(isset($_POST['delete']))
      {
        $id = clean($_POST['nid']);
          $sql = $db->query("DELETE FROM $db_data.clog WHERE id='$id'");
            header("Location: ?page=manage_clog");
      }
      
      if(isset($_POST['save']))
      {
        $title = strip($_POST['title']);
          $body = strip($_POST['sbody']);
              $date = date("F d, Y");
                $nid = clean($_POST['nid']);
            
        if(!empty($title) && !empty($body) && $nid == 0)
        {
          $sql = $db->query("INSERT INTO $db_data.clog (title, author, body, date) VALUES ('$title', '$admin', '$body', '$date')");
            die(header("Location: ?page=manage_clog"));
        }
        else if(!empty($title) && !empty($body) && $nid != 0)
        {
          $sql = $db->query("UPDATE $db_data.clog SET title='$title', author='$admin', body='$body' WHERE id='$nid'");
            header("Location: ?page=manage_clog");
        }
      }
    }
  }
}

$clog_list = new clog_list;
  $clog_edit = new clog_edit;

  $clog = array(
  "clog_list" => $clog_list->get,
  "clog_edit" => $clog_edit->clog_edit(),
  "clog" => $clog_edit->data,
  );
  
  return $clog;
?>
<?php if(!defined('ACMS')){ header("Location: ../../../"); }

class shoutbox
{
  public $get = array();
  public $prev;
  public $next;
  
  function shoutbox()
  {
    global $db, $db_data, $db_acc;
      include("./core/modules/shoutbox/config.php");
      
    if(isset($_GET['p']))
    {
      $page = $_GET['p'];
      if($page >= 2)
      {
        $page = $page;
      }
      else
      {
        $page = 0;
      }
        $p = $_GET['p'];
    }
    else
    {
      $page = 0;
        $p = 1;
    }
    if($page)
	  {
	    $start = ($page - 1) * $config_limit;
	  }
	  else
	  {
	    $start = 0;
	  }
	  
	  if($p == 0)
    {
      $p = 1;
    }
    
    $prev = $p-1;
      $next = $p+1;
      
    if($prev <= 0)
    {
      $prev = 1;
    }
    
    if($next <= 0)
    {
      $next = 2;
    }
    
    $this->prev = $prev;
      $this->next = $next;
    
    $sql = $db->query("SELECT id, author, body, date FROM $db_data.shouts ORDER BY id DESC LIMIT $start, $config_limit");
      while($get = $db->get($sql))
        $this->get[] = str_replace(array("\r\n", "\r", "\n"), "<br />", bbcode($get));
  }
}

function post_shout()
{
  global $db, $db_data, $login;
  
  if(isset($_POST['shout-post']))
  {
    if(!$login)
    {
      return"You must login to shout.";
    }
    else
    {
      if(empty($_POST['sbody']))
      {
       return"Your shout was empty.";
      }
      else
      {
        $text = strip($_POST['sbody']);
          $text_length = strlen($text);
          
        if($text_length < 10)
        {
          return"Minimum characters: 10.";
        }
        else
        {
          if($text_length > 255)
          {
            return"Maximum characters: 255.";
          }
          else
          {
            date_default_timezone_set('US/Pacific');
              $date = date("m-d, g:i");
            
            $sql = $db->query("INSERT INTO $db_data.shouts (author, body, date) VALUES ('$login', '$text', '$date')");
              header("Location: #sbox");
          }
        }
      }
    }
  }
  else
  {
    return"Characters, Min: 10, Max: 255.";
  }
}
?>
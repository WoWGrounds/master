<?php if(!defined('ACMS')){ header("Location: ../../"); }
//Session Exists ?
    if (!isset($_SESSION)) 
    {
      session_start();
    }
#- Login Data
    if(isset($_COOKIE["login"]))
    {
      $login1 = $_COOKIE["login"];
        $login1 = clean($login1);
      
      $ck1 = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE sha_pass_hash='$login1'");
        $ck2 = $db->num($ck1);
          $ck3 = $db->get($ck1);
        
      if($ck2 == 1)
      {
        $login = $ck3['username'];
      }
      else
      {
        header("Location: ./?page=logout");
      }
    }
    else
    {
      $login = "";
    }
    
    if(isset($_SESSION["acp"]))
    {
      $admin = $_SESSION['acp'];
    }
    else
    {
      $admin = "";
    }
?>
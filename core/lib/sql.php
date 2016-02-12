<?php
if(!defined('ACMS')){ header("Location: ../../"); }

class DB
{
  function query($string)
  {
    global $debug, $connect;
    
    $sql = $connect->query($string);
    if($sql == TRUE)
    {
      return $sql;
    }
    else
    {
      if($debug == 0)
      {
        die("Mysql Query Error: Oops, something went wrong. (Enable debug mode for an error list).");
      }
      else
      {
        die($connect->error);
      }
    }
  }
  
  function get($string)
  {
    global $debug, $connect;
    
    while($get = mysqli_fetch_assoc($string))
    if($get == TRUE)
    {
      return $get;
    }
    else
    {
      if($debug == 0)
      {
        die("Mysql Fetch_Assoc Error: Oops, something went wrong. (Enable debug mode for an error list).");
      }
      else
      {
        die($connect->error);
      }
    }
  }

function num($string)
  {
    global $debug;
    
    $get = mysqli_num_rows($string);
      return $get;
  }
}

$db = new DB;
?>
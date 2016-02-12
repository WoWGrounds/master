<?php define("ACMS", TRUE);
#- Include Code & Page Generated Time Script By Danniehansen @ Quad-Line.com

if(file_exists("../install"))
{
  die("Please install Azer CMS V3.0 to access the Admin Control Panel.");
}

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;

#- Includes Needed
$includes = array(
  "../core/config/config.php",
  "../core/lib/sql.php",
  "../core/lib/global.php",
  "../core/inc/login.php",
  "../core/acp_inc/functions.php",
  "../core/parser/template.php",
  "../core/parser/acp.php",
);

if(!empty($includes) AND is_array($includes)) {
  $error_inc = array();
  
  foreach($includes as $nr => $include) {
    $inc = (!empty($include) ? include($include) : false);
    
    if($include == "../core/config/config.php") {
        if($debug == 0)
        {
          $value = 0;
        }
        else
        {
          $value = -1;
        }
        error_reporting($value);
        $connect = new mysqli($db_host, $db_user, $db_pass);
        
        if($connect->connect_errno)
        {
          if($debug == 0)
          {
            die("Mysql Connect Error: Oops, something went wrong. (Enable debug mode for an error list).");
          }
          else
          {
            die($connect->connect_error);
          }
        }
    }
    
    if(!$inc) {
        $error_inc[] = $include;
    }
  }
  
  if(!empty($error_inc)) {
    $content = "One or more Core files are missing:<br /><table><tr><td><b>Path:</b></td></tr>";
    
    foreach($error_inc as $nr_e => $error) {
      $content .= '<tr><td>'.$error.'</td></tr>';
    }
    
    $content .= '</table>';
    
    die($content);
  }
}

$sql = $db->query("SELECT id, path, install, active FROM $db_data.acp_styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
$get = $db->get($sql);

if(!$admin)
{
  $style = "./styles/login/index.php";
  if(file_exists($style))
  {
    $file = bbcode(logged(file_get_contents($style)));
      echo $replace->parse($file, $data);
  }
  else
  {
    die("The Login System is missing.");
  }
}
else
{
  $style = "./styles/".$get['path']."/index.php";
  if(file_exists($style))
  {
    if($get['path'] != "global" && $get['path'] != "login")
    {
      $file = bbcode(logged(file_get_contents($style)));
        echo $replace->parse($file, $data);
    }
    else
    {
      die("The global & login folder(s) are CMS file, please install a valid style.");
    }
  }
  else 
  {
    die("The style @ ".$style." doesn't exist or is missing the index file.");
  }
}

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime);

echo "<!-- Page Generated In {$totaltime} Seconds (ACMS V3.0) -->";
?>
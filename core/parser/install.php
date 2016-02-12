<?php
if(!defined('ACMS')){ header("Location: ../../"); }

//Define Parser
  $replace = new style;
  
#- Module Include
  $location = "./core/install";
  
  //Get Modules
    $module = scandir($location);
      foreach($module as $value)
      {
        if ($value != "." && $value != ".." && $value != "index.php")
        {
          $mod_key = str_replace(".php", "", $value);
            $mod_f = file_get_contents("$location/$value/index.php");
              $mod_file[$mod_key] = eval('?>'.$mod_f);
        }
      }
      
  //Page System
    function install_page()
    {
      if(isset($_GET['page']))
      {
        $page = clean($_GET['page']);
      }
      else
      {
        $page = "home";
      }
      
      $file = "./install/pages/{$page}.php";
      
      if(file_exists($file))
      {
        return file_get_contents($file);
      }
      else
      {
        return "Missing Install Page -> ./install/pages/{$page}.php";
      }
    }
  
  $data = array(
  "title" => "Azer CMS V3.0 &bull; Installer",
  "page" => install_page(),
  "module" => $mod_file,
  );
?>
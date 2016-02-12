<?php
if(!defined('ACMS')){ header("Location: ../../"); }

//Define Parser
  $replace = new style;
  
//Define Logs(Login)
  $llog = new login_logs;
  
//Define Logs(Vote)
  $vlog = new vote_logs;
  
//Define Store Log
  $stlg = new store_log;
  
//Define Global Properties
  $prop = new properties;
  
//Define Vote Sites
  $vote = new vote_sites;
    $vse = new vs_edit;
    
//Define Store Categories
  $sct = new store_categories;
    $sce = new sc_edit;
    
//Define Store Items
  $sit = new store_items;
    $sie = new si_edit;
  
//Define Store Realms
  $srlm = new store_realms;
  
//Define Store Item Categoires
  $ict = new store_ict;
    
//Define Realm Access
  $racs = new realm_access;
  $acls = new access_list;
  
//Define Realms
  $rle = new realms_edit;

//Define News
  $nlist = new news_list;
    $nedit = new news_edit;
    
//Define Accounts
  $vact = new view_accounts;
  
//Define Characters
  $vchar = new view_characters;
  
//Define V.I.P Log
  $viplog = new vip_log;
  
//Style Install
  $style_install = new style_install;
    $acp_install = new acp_install;
  
//Get Modules
  $location = "../core/acp_modules";
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
    
  $stid = $db->get($db->query("SELECT staff_id FROM $db_acc.account WHERE username='$admin'"));
  
  $data = array(
  "ip" => $_SERVER['REMOTE_ADDR'],
  "title" => "Azer CMS &bull; ACP",
  "session" => $admin,
  "staff_id" => $stid['staff_id'],
  "page_system" => page_system(),
  "style" => style(),
  "module" => $mod_file,
  "acp_login" => acp_login(),
  "acp_logout" => logout(),
  "login_logs" => $llog->get,
  "vote_logs" => $vlog->get,
  "properties" => $prop->get,
  "prop_data" => $prop->data,
  "global_update" => global_update(),
  "vote_sites" => $vote->get,
  "new_vid" => $vote->nid,
  "vote_action" => vote_action(),
  "vs_edit" => $vse->get,
  "vote_update" => vote_update(),
  "store_cat" => $sct->get,
  "new_scid" => $sct->nid,
  "store_items" => $sit->get,
  "new_siid" => $sit->nid,
  "ict" => $ict->get,
  "store_realms" => $srlm->get,
  "sct_action" => store_cat_action(),
  "sit_action" => store_item_action(),
  "sc_edit" => $sce->get,
  "si_edit" => $sie->get,
  "sict" => $sie->ctype,
  "cat_update" => category_update(),
  "item_update" => item_update(),
  "style_install" => $style_install->get,
  "style_action" => style_action(),
  "acp_install" => $acp_install->get,
  "acp_action" => acp_action(),
  "news_list" => $nlist->get,
  "news_data" => $nedit->data,
  "news_edit" => $nedit->news_edit(),
  "account_search" => account_search(),
  "view_accounts" => $vact->get,
  "view_characters" => $vchar->get,
  "races" => $vchar->race,
  "ccl" => $vchar->ccl,
  "account_update" => update_account(),
  "character_update" => character_update(),
  "vip_log" => $viplog->get,
  "store_log" => $stlg->get,
  "purge" => purge(),
  "realm_access" => $racs->get,
  "acls" => $acls->alist,
  "access_action" => access_action(),
  "realm_update" => realm_update(),
  "realms_edit" => $rle->get,
  );
?>
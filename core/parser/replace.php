<?php
if(!defined('ACMS')){ header("Location: ../../"); }

//Anti - Bot
  $abot1 = rand(10,99);
  $abot2 = rand(10,99);
    $abot = "{$abot1} + {$abot2}";
    $abot_valid = "{$abot1} -+- {$abot2}"; 
    
//Define Parser
  $replace = new style;
   
//Define News & Get
  $news = new news;

//Login Data
  $login_data = new login_data;
  
//User Data
  $user_data = new user_data;
  
//Messag Center
  $message_center = new message_center;
  
//Vote Sites
  $vote_sites = new vote_sites;
  
//Message(New) Class
  $nmc = new msg_details;
  
//Realms / Status
  $realms = new realms;
  
//Unstuck
  $unstuck = new unstuck;
  
//Online Players
  $online_players = new online_players;
  
//Store Categories
  $store_cat = new store_cat;
  
//View Cart
  $vcart = new view_cart;
  
#- Module Include
  $location = "./core/modules";
  
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
  
  $data = array(
  "title" => $title,
  "server_title" => $server_title,
  "paypal_return" => "http://{$domain}/?page=account",
  "paypal_email" => $palmail,
  "paypal_url" => $palurl,
  "paypal_currency" => $palcur,
  "ip" => $_SERVER['REMOTE_ADDR'],
  "page_system" => page_system(),
  "realmlist" => $realmlist,
  "style" => style(),
  "news" => $news->get_news,
  "module" => $mod_file,
  "abot_valid" => $abot_valid,
  "abot" => $abot,
  "register" => register(),
  "activate" => activate(),
  "login" => login(),
  "logout" => logout(),
  "session" => $login,
  "copy_date" => date('Y'),
  "copyright" => $copyright,
  "style" => style(),
  "wowhead" => "<script type=\"text/javascript\" src=\"./styles/global/js/power.js\"></script>",
  "login_data" => $login_data->get,
  "user_data" => $user_data->get,
  "user_banned" => $user_data->banned,
  "user_rank" => $user_data->admin,
  "change_password" => change_password(),
  "update_email" => update_email(),
  "new_message" => $message_center->unread,
  "total_message" => $message_center->total,
  "sent_message" => $message_center->sent,
  "inbox" => $message_center->get_inbox,
  "outbox" => $message_center->get_outbox,
  "read_message" => $message_center->read_message,
  "unread_1" => "(New)",
  "unread_0" => "",
  "compose_message" => new_message(),
  "msg_title" => $nmc->msg_title,
  "msg_user" => $nmc->msg_user,
  "msg_body" => $nmc->msg_body,
  "msg_page" => $message_center->msg_page,
  "forgot_password" => forgot_password(),
  "login_error" => login_error(),
  "vote_sites" => $vote_sites->get,
  "vote" => vote(),
  "realms" => $realms->get,
  "db_error" => $realms->db_error,
  "aly" => $realms->aly,
  "horde" => $realms->horde,
  "total_online" => $realms->total,
  "online" => $realms->online,
  "uchars" => $unstuck->char,
  "crealms" => $unstuck->get,
  "tool_unstuck" => tool_unstuck(),
  "tool_revive" => tool_revive(),
  "online_players" => $online_players->get,
  "online_rname" => $online_players->realm_name,
  "top_10" => $online_players->top_10,
  "store_cat" => $store_cat->get,
  "store_cat_rn" => $store_cat->store_cat_rn,
  "store_cat_cn" => $store_cat->store_cat_cn,
  "store_items" => $store_cat->items,
  "add_to_cart" => add_to_cart(),
  "view_cart" => $vcart->get,
  "vote_sum" => $vcart->vote_sum,
  "vip_sum" => $vcart->vip_sum,
  "shop_data" => shop_data(),
  "purchase" => purchase(),
  );
?>
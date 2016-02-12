<?php
if(!defined('ACMS')){ header("Location: ../../"); }

//- Site Settings
  $debug = 0; #- Debug Mode Enabled? (0 = No | 1 = Yes)

//- Database Connection Info
  $port_host = "127.0.0.1"; #- Domain without http:// or IP Address
  $db_host = "127.0.0.1"; #- Database Host
  $db_user = "root"; #- Database User
  $db_pass = "Newpassword1234"; #- Database Pass
  $db_data = "azercms"; #- Database DB
  $db_acc = "auth"; #- Account Database
  
//- Paypal Settings |:| Do Not Edit
  $palurl = array(
  "1" => "www.paypal.com",
  "2" => "www.sandbox.paypal.com",
  );
  
  $palcur = array(
  "1" => "USD",
  "2" => "EURO",
  "3" => "Other Currency Here", // Other Currency - https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes
  );
  
//- Paypal Manual Edit For Security
  $palmail = "e.jacobrx@gmail.com";
  $palurl = $palurl[1]; // 1 = Paypal, 2 = SandBox
  $palcur = $palcur[1]; // 1 = USD, 2 = EURO, 3 = Other
  
//- RA/Telnet Settings - Manual Edit
  $ra_host = "127.0.0.1"; #- World Server Host
  $ra_user = "admin"; #- Account Username (Access = 4)
  $ra_pass = "Newpassword1234"; #- Account Password (Access = 4)
?>
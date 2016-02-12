<?php define("ACMS", TRUE);
//- Global Includes Needed
  include("../../config/config.php");
    include("../../lib/sql.php");
      include("../../lib/global.php");

//- Mysql Connection
  error_reporting(0);
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
      
//- Set Date
  date_default_timezone_set('US/Pacific');
    $date = date("l F d, Y @ g:i A");
    
//- Paypal IPN Azer CMS V3.0
  //- Read The Post From Paypal & Add 'CMD'
    $req = 'cmd=_notify-validate';

    foreach ($_POST as $key => $value)
    {
      $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }
  //- Post Back To Paypal System For Validation
    $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
      $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
          $fp = fsockopen ("ssl://{$palurl}", 443, $errno, $errstr, 30);
          
  //- Assign Posted Data Local Variables
    $transaction_id = strip($_POST['txn_id']);
      $payer_email = strip($_POST['payer_email']);
        $item_name = strip($_POST['item_name']);
          $item_number = strip($_POST['item_number']);
            $payment_status = strip($_POST['payment_status']);
              $payment_amount = strip($_POST['mc_gross']);
                $payment_currency = strip($_POST['mc_currency']);
                  $txn_id = strip($_POST['txn_id']);
                    $receiver_email = strip($_POST['receiver_email']);
                      $username = clean($_POST['custom']);
                      
$log = "-- Payment Failed @ {$date}. Details --

Transaction Id: {$transaction_id}
Payer Email: {$payer_email}
Item Name: {$item_name}
Item Number: {$item_number}
Payment Status: {$payment_status}
Payment Amount: {$payment_amount}
Payment Currency: {$payment_currency}
Txn Id: {$txn_id}
Receiver Email: {$receiver_email}
User: {$username}";

$log1 = "-- Payment Success @ {$date}. Details --

Transaction Id: {$transaction_id}
Payer Email: {$payer_email}
Item Name: {$item_name}
Item Number: {$item_number}
Payment Status: {$payment_status}
Payment Amount: {$payment_amount}
Payment Currency: {$payment_currency}
Txn Id: {$txn_id}
Receiver Email: {$receiver_email}
User: {$username}";
                      
  //- Log Failed Donation Or Continue
    if (!$fp)
    {
      $sqlj = $db->query("INSERT INTO $db_data.vip_log (body) VALUES ('$log')");
        $sqll = $db->query("INSERT INTO $db_data.messages (title, body, sender, user, date, unread, inbox_copy, outbox_copy) VALUES ('Donation Receipt', '$log', 'Admin', '$username', '$date', '1', '1', '1')");
    }
    else
    {
      fputs ($fp, $header . $req);
        while (!feof($fp))
        {
          $res = fgets($fp, 1024);
            if (strcmp($res, "VERIFIED") == 0 && $receiver_email == "$palmail" && $payment_currency == "$palcur")
            {
              $sql = $db->query("SELECT dp FROM $db_acc.account WHERE username='$username'");
                while($get = $db->get($sql))
                {
                  $old_dp = $get['dp'];
                    $new_dp = $old_dp + $payment_amount;
                  
                  $sqlc = $db->query("UPDATE $db_acc.account set dp='$new_dp' WHERE username='$username'");
                    $sqld = $db->query("INSERT INTO $db_data.vip_log (body) VALUES ('$log1')");
                      $sqle = $db->query("INSERT INTO $db_data.messages (title, body, sender, user, date, unread, inbox_copy, outbox_copy) VALUES ('Donation Receipt', '$log1', 'Admin', '$username', '$date', '1', '1', '1')");
                }
            }
            else if (strcmp ($res, "INVALID") == 0)
            {
              $sqla = $db->query("INSERT INTO $db_data.vip_log (body) VALUES ('$log')");
                $sqlb = $db->query("INSERT INTO $db_data.messages (title, body, sender, user, date, unread, inbox_copy, outbox_copy) VALUES ('Donation Receipt', '$log', 'Admin', '$username', '$date', '1', '1', '1')");
            }
        }
      fclose ($fp);
    }
?>
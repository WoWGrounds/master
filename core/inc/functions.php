<?php if(!defined('ACMS')){ header("Location: ../../"); }
function style()
{
  global $db, $db_data;
  
  $sql = $db->query("SELECT id, path, install, active FROM $db_data.styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
    $get = $db->get($sql);
  
  return $get['path'];
}

function page_system()
{
  global $db, $db_data;
  
  $sql = $db->query("SELECT id, path, install, active FROM $db_data.styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
    $get = $db->get($sql);
  
  if(isset($_GET['page']))
  {
    $page = page($_GET['page']);
    
    $location = "./styles/{$get['path']}/pages/{$page}.php";
      if(file_exists($location) && $page != "index")
      {
        if($page == "store_shop")
        {
          $file = bbcode(logged(file_get_contents($location)));
        }
        else
        {
          $file = logged(file_get_contents($location));
        }
        return $file;
      }
      else
      {
        $location = "./styles/{$get['path']}/pages/not_found.php";
          $file = bbcode(logged(file_get_contents($location)));
            return $file;
      }
  }
  else
  {
    $location = "./styles/{$get['path']}/news.php";
      $file = bbcode(logged(file_get_contents($location)));
        return $file;
  }
}

function login_error()
{
  global $db, $db_data;
  
  $sql = $db->query("SELECT id, path, install, active FROM $db_data.styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
    $get = $db->get($sql);
    
  $location = "./styles/{$get['path']}/pages/not_found.php";
    $file = logged(file_get_contents($location));
      return $file;
}

class news
{
  public $get_news = array();
  
  function news()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, title, author, body, date, avatar FROM $db_data.news ORDER BY id DESC LIMIT 5");
      while($get = bbcode($db->get($sql)))
        $this->get_news[] = $get = str_replace(array("\r\n", "\r", "\n"), "<br />", $get);
  }
}

function register()
{
  global $db, $db_data, $db_acc, $email_validation, $server_email, $server_title, $domain, $expansion;
  
  if(isset($_POST['create']))
  {
    $valid = $_POST['valid'];  
      $valid = explode(" -+- ", $valid);
        $code = $valid[0] + $valid[1];
        
    $username = clean($_POST['username']);
      $password = clean($_POST['password']);

    if(empty($_POST['abot']) || $_POST['abot'] != "$code")
    {
      if(empty($_POST['abot']))
      {
        $abot = 0;
      }
      else
      {
        $abot = $_POST['abot'];
      }
      return"{$valid[0]} + {$valid[1]} does not equal {$abot}.";
    }
    else
    {
      if(empty($username))
      {
        return"Invalid Username.";
      }
      else
      {
        $username = clean($_POST['username']);
          $sql = $db->query("SELECT username FROM $db_acc.account WHERE username='$username'");
            $acc = $db->num($sql);
            
        if($acc >= 1 || $username == "Admin")
        {
          return"That Username is already in use.";
        }
        else
        {
          if(empty($password))
          {
            return"Invalid Password.";
          }
          else
          {
            $email = valid_email($_POST['email']);
            
            if(empty($_POST['email']) || $email == FALSE)
            {
              return"Invalid Email Address.";
            }
            else
            {
              $email = ucfirst(strip($_POST['email']));
                $sql = $db->query("SELECT email FROM $db_acc.account WHERE email='$email'");
                  $ema = $db->num($sql);
                  
              if($ema >= 1)
              {
                return"That Email Address is already in use.";
              }
              else
              {
                //All Fields Are Good, Time to Clean & Insert
                $username = ucfirst(clean($_POST['username']));
                  $password = clean($_POST['password']);
                    $sha1 = encrypt($username, $password);
                      $email = ucfirst(strip($_POST['email']));
                        $sid = rand(10000, 90000);
                        
                $str = rs(50);
                  
                $sql = $db->query("INSERT INTO $db_acc.account (username, sha_pass_hash, email, expansion, staff_id, isactive, activation) VALUES ('$username', '$sha1', '$email', '$expansion', '$sid', '0', '$str')");
                  smsg("Admin", "$username", "Welcome to {$server_title}", "Thank you for creating an account, please enjoy your stay at {$server_title}.");
                
                if($email_validation == 0)
                {
                  $sql = $db->query("UPDATE $db_acc.account SET isactive='1' WHERE username='$username'");
                    return"The account '{$username}' has been created.";
                }
                else
                {
                  $subject = "{$username} - Account Activation";
                    $from = "From: {$server_email}";
                      $msg = "
Thank you for registering at {$server_title}. Use the link below to activate your account:

http://{$domain}/?page=activate&activation={$str}
Username: {$username}
Password: {$password}
                      
Enjoy your stay at {$server_title}!";
                        
                  if (mail($email, $subject, $msg, $from))
                  {
                    return"The account '{$username}' has been created, however we require email verification. You can activate your account by following the instructions sent to the email address you used to register.";
                  }
                  else
                  {
                    return"Activation Email failed to send, please contact an administrator.";
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function activate()
{
  global $db, $db_acc;
  
  if(isset($_GET['activation']))
  {
    $actv = clean($_GET['activation']);
      
    $sql = $db->query("SELECT username, activation, isactive as active FROM $db_acc.account WHERE activation='$actv' AND isactive='0'");
      $get = $db->get($sql);
      $ok = $db->num($sql);
      
    if($ok == 1)
    {
      $sql = $db->query("UPDATE $db_acc.account SET isactive='1' WHERE activation='$actv'");
        return "Thank you for activating the account '{$get['username']}'. You can now login.";
    }
    else
    {
      return "Invalid Activation link.";
    }
  }
}

function login()
{
  global $db, $db_acc, $db_data, $slsys, $ip;
  
  //- Set Date
  date_default_timezone_set('US/Pacific');
    $date = date("l F d, Y @ g:i A");
  
  if(isset($_POST['login']))
  {
    $username = ucfirst(clean($_POST['username']));
      $sql = $db->query("SELECT username FROM $db_acc.account WHERE username='$username'");
        $acc = $db->num($sql);
            
    if(empty($username) || $acc <= 0)
    {
      $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('Invalid/Empty', '$ip', '$date', 'Failed: Invalid Username', 'Site')");
        return"Invalid Username.";
    }
    else
    {
      $username = ucfirst(clean($_POST['username']));
        $password = clean($_POST['password']);
          $password = encrypt($username, $password);
            
      $sql = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE username='$username' AND sha_pass_hash='$password'");
        $login_ok = $db->num($sql);
          
      if($login_ok != 1)
      {
        $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Invalid Password', 'Site')");
          return"Invalid Password. <a href=\"?page=forgot_password\">Forgot Password</a>";
      }
      else
      {
        $username = ucfirst(clean($_POST['username']));
          $password = clean($_POST['password']);
            $password = encrypt($username, $password);
            
        $sql = $db->query("SELECT username, sha_pass_hash, isactive as active FROM $db_acc.account WHERE username='$username' AND sha_pass_hash='$password' AND isactive='1'");
          $login_ok = $db->num($sql);
          
        if($login_ok != 1)
        {
          $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Inactive Account', 'Site')");
            return"This account has not been activated yet.";
        }
        else
        {
          if($slsys == 0)
          {
            $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Login Disabled', 'Site')");
              return"Login Disabled.";
          }
          else
          {
            //- Login Ok
            $usid = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE username='$username'");
              $usgi = $db->get($usid);
                $user_id = $usgi['sha_pass_hash'];
                
            setcookie("login", "$user_id", time()+86400);
              $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Success', 'Site')");
                header("Location: ?page=account");
          }
        }
      }
    }
  }
}

function logout()
{
  if(isset($_GET['page']))
  {
    if($_GET['page'] == "logout")
    {
      global $login;
    
      setcookie("login", "$login", time()+0);
        sleep(5); //- Wait for Cookie to be deleted, else user data will still be shown.
          header("Location: ./");
    }
  }
}

class login_data
{
  public $get = array();
  
  function login_data()
  {
    global $db, $db_data, $login;
  
    $sql = $db->query("SELECT id, username, ip, date, status, lty FROM $db_data.login_log WHERE username='$login' AND lty='Site' ORDER BY id DESC LIMIT 5");
      while($get[] = $db->get($sql))
        $this->get = $get;
  }
}

class user_data
{
  public $get = array();
  public $admin;
  public $banned;
  
  function user_data()
  {
    global $db, $db_acc, $db_data, $login;
    
    $sql = $db->query("SELECT id, email, joindate, last_ip, locked, expansion, staff_id, vp, dp, rank FROM $db_acc.account WHERE username='$login'");
      while($get = $db->get($sql))
      {
        $this->get[$get['id']] = $get;
          $this->get[$get['id']]['vp'] = npm($get['vp']);
            $this->get[$get['id']]['dp'] = npm($get['dp']);
            
        $sql2 = $db->query("SELECT id, username, ip, date, status FROM $db_data.login_log WHERE username='$login' AND status='Success' ORDER BY id DESC LIMIT 1");
          $get2 = $db->get($sql2);
            $pid = $get2['id'];
        
        $sql1 = $db->query("SELECT id, username, ip, date, status FROM $db_data.login_log WHERE id<>'$pid' AND username='$login' AND status='Success' ORDER BY id DESC LIMIT 1");
          $num1 = npm($db->num($sql1));
            $get1 = $db->get($sql1);
          
        if($num1 == 0)
        {
          $this->get[$get['id']]['last_date'] = $get2['date'];
            $this->get[$get['id']]['last_ip1'] = $get2['ip'];
        }
        else
        {
          $this->get[$get['id']]['last_date'] = $get1['date'];
            $this->get[$get['id']]['last_ip1'] = $get1['ip'];
        }
          
        $this->get[$get['id']]['ip'] = $_SERVER['REMOTE_ADDR'];
          
          
        $locked = "No";
        
        if($get['locked'] != 0)
        {
          $locked = "Yes";
        }
        $this->banned = $locked;
    
        $rank = "Player";
    
        if($get['rank'] == 1)
        {
          $rank = "Game Master";
        }
        else if($get['rank'] == 2)
        {
          $rank = "Admin";
        }
        $this->admin = $rank;
      }
  }
}

function change_password()
{
  global $db, $db_acc, $login;
  
  if(isset($_POST['chp']))
  {
    $op = clean($_POST['opassword']);
      $np = clean($_POST['password']);
        $cnp = clean($_POST['cpassword']);
          $op = encrypt($login, $op);
            $password = encrypt($login, $np);
            
    if(empty($_POST['opassword']))
    {
      return"The password you entered does not match your current password.";
    }
    else
    {
      $sql = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE username='$login' AND sha_pass_hash='$op'");
        $valid = $db->num($sql);
      
      if($valid != 1)
      {
        return"The password you entered does not match your current password.";
      }
      else
      {
        if(empty($_POST['password']))
        {
          return"Your new password must contain at least one character.";
        }
        else
        {
          if(empty($_POST['cpassword']) || $_POST['cpassword'] != $_POST['password'])
          {
            return"New and confirmed passwords do not match.";
          }
          else
          {
            //- Change Password
            $sql = $db->query("UPDATE $db_acc.account SET sha_pass_hash='$password', sessionkey='', v='', s='' WHERE username='$login' AND sha_pass_hash='$op'");
              return"Your password has been changed.";
          }
        }
      }
    }
  }
}

function update_email()
{
  global $db, $db_acc, $login;
  
  if(isset($_POST['che']))
  {
    $pass = clean($_POST['password']);
      $ne = ucfirst(strip($_POST['email']));
        $cne = strip($_POST['cemail']);
          $password = encrypt($login, $pass);
            
    if(empty($_POST['password']))
    {
      return"The password you entered does not match your current password.";
    }
    else
    {
      $sql = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE username='$login' AND sha_pass_hash='$password'");
        $valid = $db->num($sql);
      
      if($valid != 1)
      {
        return"The password you entered does not match your current password.";
      }
      else
      {
        $evalid = valid_email($_POST['email']);
        
        if(empty($_POST['email']) || $evalid == FALSE)
        {
          return"Invalid Email Address.";
        }
        else
        {
          if(empty($_POST['cemail']) || $_POST['cemail'] != $_POST['email'])
          {
            return"New and confirmed emails do not match.";
          }
          else
          {
            $sql = $db->query("SELECT email FROM $db_acc.account WHERE email='$ne'");
              $check = $db->num($sql);
              
            if($check >= 1)
            {
              return"That email address is alread in use.";
            }
            else
            {
              //- Change Password
              $sql = $db->query("UPDATE $db_acc.account SET email='$ne' WHERE username='$login'");
                return"Your Email Address has been updated.";
            }
          }
        }
      }
    }
  }
}

class message_center
{
  public $unread;
  public $sent;
  public $total;
  public $msg_page;
  
  public $get_inbox = array();
  public $get_outbox = array();
  
  public $read_message = array();
  
  function message_center()
  {
    global $db, $db_data, $login;
    
    $new = $db->query("SELECT user, unread, inbox_copy FROM $db_data.messages WHERE user='$login' AND unread='1' AND inbox_copy='1'");
      $new = $db->num($new);
        $this->unread = $new;
        
    $total = $db->query("SELECT user, inbox_copy FROM $db_data.messages WHERE user='$login' AND inbox_copy='1'");
      $total = $db->num($total);
        $this->total = $total;
        
    $sent = $db->query("SELECT sender, outbox_copy FROM $db_data.messages WHERE sender='$login' AND outbox_copy='1'");
      $sent = $db->num($sent);
        $this->sent = $sent;
        
    //Get Messages
    $inbox = $db->query("SELECT id, title, body, sender, user, unread, inbox_copy FROM $db_data.messages WHERE user='$login' AND inbox_copy='1' ORDER BY id DESC");
      while($inget = $db->get($inbox))
      {
        $this->get_inbox[] = $inget;
      }
      
    $outbox = $db->query("SELECT id, title, body, sender, user, unread, outbox_copy FROM $db_data.messages WHERE sender='$login' AND outbox_copy='1' ORDER BY id DESC");
      while($outget = $db->get($outbox))
      {
        $this->get_outbox[] = $outget;
      }
      
    if(isset($_GET['page']) && isset($_GET['id']))
    {
      if(isset($_GET['box']))
      {
        $this->msg_page = page($_GET['box']);
      }
      
      $page = page($_GET['page']);
        $id = page($_GET['id']);
        
      if($page == "inbox" || $page == "outbox" && $id != 0)
      {
        if(isset($_GET['option']))
        {
          $option = page($_GET['option']);
            if($option == "delete")
            {
              if($page == "inbox")
              {
                $delete = $db->query("UPDATE $db_data.messages SET inbox_copy='0' WHERE id='$id' AND user='$login'");
                  header("Location: ?page=inbox#top");
              }
              else
              {
                $delete = $db->query("UPDATE $db_data.messages SET outbox_copy='0' WHERE id='$id' AND sender='$login'");
                  header("Location: ?page=outbox#top");
              }
            }
        }
      }
      
      if($page == "message")
      {
        if(isset($_GET['box']))
        {
          $box = page($_GET['box']);
          
          if($box == "inbox")
          {
            $message = $db->query("SELECT id, title, body, sender, user, date, unread, inbox_copy FROM $db_data.messages WHERE id='$id' AND user='$login' AND inbox_copy='1' ORDER BY id LIMIT 1");
              $check = $db->num($message);
                
              if($check != 1)
              {
                header("Location: ?page=account#msg");
              }
              
            while($msg = $db->get($message))
            {
              $msg = bbcode(str_replace(array("\r\n", "\r", "\n"), "<br />", $msg));
                $this->read_message[] = $msg;
            
              $read = $db->query("UPDATE $db_data.messages SET unread='0' WHERE id='$id'");  
            }
          }
          else
          {
            $message = $db->query("SELECT id, title, body, sender, user, date, unread, outbox_copy FROM $db_data.messages WHERE id='$id' AND sender='$login' AND outbox_copy='1' ORDER BY id LIMIT 1");
              $check = $db->num($message);
                
              if($check != 1)
              {
                header("Location: ?page=account#msg");
              }
              
            while($msg = $db->get($message))
            {
              $msg = bbcode(str_replace(array("\r\n", "\r", "\n"), "<br />", $msg));
                $this->read_message[] = $msg;
            }
          }
        }
      }
    }
  }
}

function new_message()
{
  global $db, $db_data, $db_acc, $login;
  
  if($login)
  {
    if(isset($_POST['send_message']))
    {
      $to = ucfirst(clean($_POST['to']));
        $title = strip($_POST['title']);
          $body = strip($_POST['body']);
            //- Set Date
            date_default_timezone_set('US/Pacific');
              $date = date("l F d, Y @ g:i A");
          
      if(empty($_POST['to']) || $to == "Admin")
      {
        return"Invalid User.";
      }
      else
      {
        if($to == "$login")
        {
          return"You can't send a private message to yourself.";
        }
        else
        {
          $user = $db->query("SELECT username FROM $db_acc.account WHERE username='$to'");
            $user = $db->num($user);
              
          if($user == 0)
          {
            return"Invalid User.";
          }
          else
          {
            if(empty($_POST['title']))
            {
              return"Your message needs a title.";
            }
            else
            {
              if(empty($_POST['body']))
              {
                return"Your message must contain at least one character.";
              }
              else
              {
                //Private Message is good for sending
                smsg("$login", "$to", "$title", "$body");
                  header("Location: ?page=outbox#top");
              }
            }
          }
        }
      }
    }
  }
}

class msg_details
{
  public $msg_user;
  public $msg_title;
  public $msg_body;
  
  function msg_details()
  {
    global $db, $db_data, $login;
    
    if($login && isset($_GET['action']))
    {
      if($_GET['action'] == "reply")
      {
        $id = page($_GET['id']);
          $sql = $db->query("SELECT id, title, body, sender, user FROM $db_data.messages WHERE id='$id' AND user='$login'");
            $get = $db->get($sql);
              $check = $db->num($sql);
              
        if($check == 1)
        {
          $this->msg_title = $get['title'];
            $this->msg_user = $get['sender'];
              $this->msg_body = "


\"{$get['body']}\"";
        }
      }
      else if($_GET['action'] == "member")
      {
        $this->msg_user = page($_GET['user']);
      }
    }
  }
}

function forgot_password()
{
  global $db, $db_acc, $server_title, $ip, $server_email;
  
  if(isset($_POST['forgot']))
  {
    $email = ucfirst(strip($_POST['email']));
    
    $sql = $db->query("SELECT username, email from $db_acc.account WHERE email='$email'");
      $verify = $db->num($sql);
        $get = $db->get($sql);
          $username = $get['username'];
            $str = rs(8);
              $password = encrypt($username, $str);
          
    $subject = "{$username} - {$server_title}(Password Recovery)";
      $from = "From: {$server_email}";
        $msg = "{$server_title} Staff:

Someone with the IP: $ip, has requested a new password. If this request was not made by you, please login, change your password, and proceed to notify an administrator.

Username: {$username}
New Password: {$str}";
                        
    if($verify != 1)
    {
      return"The email address entered, does not exist.";
    }
    else
    {
      if (mail($email, $subject, $msg, $from))
      {
        $sql = $db->query("UPDATE $db_acc.account SET sha_pass_hash='$password' WHERE email='$email'");
        return"A new password for the account '{$username}' has been sent to your email address.";
      }
      else
      {
        return"Password Recovery Email failed to send, please contact an administrator.";
      }
    }
  }
}

class vote_sites
{
  public $get = array();
  
  function vote_sites()
  {
    global $db, $db_data, $login;
    
    if($login)
    {
      $sql = $db->query("SELECT id, site_name, site_url, site_img, site_cost FROM $db_data.vote_sites");
        while($get = $db->get($sql))
        
      $this->get[] = $get;
    }
  }
}

function vote()
{
  global $db, $db_data, $db_acc, $login;
  
  if($login)
  {
    if(isset($_POST['site']))
    {
      $site_id = clean($_POST['site']);
      
      $time = time();
        $timer = time()+60*60*12;
        
      $check = $db->query("SELECT id, user, site_id, timer FROM $db_data.vote_logs WHERE user='$login' AND site_id='$site_id' AND timer >='$time' ORDER BY id DESC LIMIT 1");
        $valid = $db->num($check);
      
      if($valid != 1)
      {
        $sql = $db->query("SELECT id, site_name, site_url, site_img, site_cost FROM $db_data.vote_sites WHERE id='$site_id'");
          $get = $db->get($sql);
          
        $site_name = $get['site_name'];
          $site_cost = $get['site_cost'];
          
        date_default_timezone_set('US/Pacific');
          $date = date("l F d, Y @ g:i A");
          
        $uvp = $db->query("SELECT username, vp FROM $db_acc.account WHERE username='$login'");
          $gvp = $db->get($uvp);
            $vp = $site_cost + $gvp['vp'];
        
        $sql_1 = $db->query("INSERT INTO $db_data.vote_logs (user, site_name, site_id, site_cost, date, timer) VALUES ('$login', '$site_name', '$site_id', '$site_cost', '$date', '$timer')");
          $sql_2 = $db->query("UPDATE $db_acc.account SET vp='$vp' WHERE username='$login'");
          
        //return"Thank you for voting, you now have {$vp} Vote Points.";
        header("Location: ?page=vote");
      }
      else
      {
        return"You can only vote for each site once every 12 hours.";
      }
    }
    else
    {
      $num = rand(1,5);
      
      if($num == 1)
      {
        return"<b>Note:</b> You can vote for each site once every 12 hours.";
      }
      else if($num == 2)
      {
        return"<b>Note:</b> Voting helps increase the server population.";
      }
      else if($num == 3)
      {
        return"<b>Note:</b> You get vote points for voting, which you can spend in the item store.";
      }
      else if($num == 4)
      {
        return"<b>Note:</b> Voting helps increase the server population.";
      }
      else
      {
        return"<b>Note:</b> Don't want to vote? Donate today! (Donations are appreciated and in return you receive V.I.P points, which you can spend in the item store).";
      }
    }
  }
}

function status($port_id, $type)
{
  global $db_host, $ra_host, $port_host;
  
  $port = array();
    $port[] = $port_id;
    
  foreach($port as $id)
  {
    if($type == 1)
    {
      $host = $port_host;
    }
    else
    {
      $host = $ra_host;
    }
    
    $err = array('no' => NULL, 'str' => NULL);
      $on_up = @fsockopen($host, $id, $err['no'], $err['str'], (float)1.0);
      
    if(!$on_up)
    {
      return"Offline";
    }
    else
    {
      return"Online";
    }
  }
}

class realms
{
  public $get = array();
  public $db_error = array();
  public $aly = array();
  public $horde = array();
  public $total = array();
  public $online = array();
  
  function realms()
  {
    global $db_data, $db, $db_host, $connect;
    
    $realm_get = $db->query("SELECT id, rname, type, oid, char_db, port FROM $db_data.realms ORDER BY oid");
      while($realm = $db->get($realm_get))
      {
        $this->get[] = $realm;
      }
    
    foreach($this->get as $key => $value)
    {
      $port = status($value['port'], 1);
        $this->online[$value['char_db']] = $port;
        
      $cdb = $value['char_db'];
      
      $aly = "0";
        $horde = "0";
          $total = "0";
          
      if(!$connect->select_db($cdb))
      {
        $db_error = "<br/>Invalid Character DB.";
      }
      else
      {
        
        $db_error = "";
        
        $sql_aly = $db->query("SELECT race, online FROM $cdb.characters WHERE online='1' AND (race='1' OR race='3' OR race='4' OR race='7' OR race='11' OR race='22')");
          $aly = $db->num($sql_aly);
          
        $sql_horde = $db->query("SELECT race, online FROM $cdb.characters WHERE online='1' AND (race='2' OR race='5' OR race='6' OR race='8' OR race='10' OR race='9')");
          $horde = $db->num($sql_horde);
        
        if($horde == 0)
        {
          $horde = "0";
        }
        
        if($aly == 0)
        {
          $aly = "0";
        }
        
        $total = $aly+$horde;
        
        if($total == 0)
        {
          $total = "0";
        }
      }
      
      $this->db_error[$cdb] = $db_error;
        $this->aly[$cdb] = $aly;
          $this->horde[$cdb] = $horde;
            $this->total[$cdb] = $total;
    }
  }
}

class unstuck
{
  public $get = array();
  public $char = array();
  public $uchars = array();
  
  function unstuck()
  {
    global $db, $db_data, $db_acc, $login, $connect;
    
    $realm_get = $db->query("SELECT id, rname, type, oid, char_db, port FROM $db_data.realms ORDER BY oid");
      while($realm = $db->get($realm_get))
      {
        $cdb = $realm['char_db'];
          if($connect->select_db($cdb))
          {
            $this->get[] = $realm;
          }
      }
    
    foreach($this->get as $key => $value)
    {
      $acc_data = $db->query("SELECT id, username FROM $db_acc.account WHERE username='$login'");
        $acc = $db->get($acc_data);
        
      $cdb = $value['char_db'];
        $id = $acc['id'];
        
      if($connect->select_db($cdb))
      {
        $sql = $db->query("SELECT guid, account, name, level FROM $cdb.characters WHERE account='$id'");
          $check = $db->num($sql);
          
          if($check != 0)
          {
            while($get = $db->get($sql))
            {
              $guid = $get['guid'];
            
              $this->uchars[] = $get;
                $this->char[$cdb][$guid] = $get;
            }
          }
          else
          {
            $this->char[$cdb][1] = array('guid' => '0', 'name' => 'No Characters', 'level' => 'Unknown',);
          }
      }
    }
  }
}

function tool_unstuck()
{
  global $login, $db, $db_data, $db_acc;
  
  if($login)
  {
    if(isset($_POST['submit-unstuck']))
    {
      if(isset($_POST['unstuck']))
      {
        $var = $_POST['unstuck'];
          $data = explode("-", $var);
          
        $realm = clean($data[0]);
          $guid =  clean($data[1]);
          
        $get_realm = $db->query("SELECT id, char_db FROM $db_data.realms WHERE id='$realm'");
          $grlm = $db->get($get_realm);
            $cdb = $grlm['char_db'];
        
        $sql = $db->query("SELECT `account`.`id`, `account`.`username`, `characters`.`guid`, `characters`.`account` FROM `$db_acc`.`account`, `$cdb`.`characters` WHERE `account`.`id` = `characters`.`account` AND `account`.`username`='$login' AND `characters`.`guid`='$guid'");
          $check = $db->num($sql);
          
        if($check != 1)
        {
          return"Invalid Character Selection.";
        }
        else
        {
          //Position X
            $px='-14406.599609';
          //Position Y
            $py='419.352997';
          //Position Z
            $pz='22.390306';
          //Orientation
            $o='0.000000';
          //Map Id
            $m='0';
          //Zone Id
            $z='33';
            
          $sql = $db->query("UPDATE $cdb.characters SET position_x = '$px', position_y = '$py', position_z = '$pz', zone = '$z', map = '$m' WHERE guid='$guid'");
            return"<span style=\"font-size:11px;\">: Selected character, has been unstucked.</span>";
        }
      }
    }
  }
}

function tool_revive()
{
  global $login, $db, $db_data, $db_acc;
  
  if($login)
  {
    if(isset($_POST['submit-revive']))
    {
      if(isset($_POST['revive']))
      {
        $var = $_POST['revive'];
          $data = explode("-", $var);
          
        $realm = clean($data[0]);
          $guid =  clean($data[1]);
          
        $get_realm = $db->query("SELECT id, char_db FROM $db_data.realms WHERE id='$realm'");
          $grlm = $db->get($get_realm);
            $cdb = $grlm['char_db'];
        
        $sql = $db->query("SELECT `account`.`id`, `account`.`username`, `characters`.`guid`, `characters`.`account` FROM `$db_acc`.`account`, `$cdb`.`characters` WHERE `account`.`id` = `characters`.`account` AND `account`.`username`='$login' AND `characters`.`guid`='$guid'");
          $check = $db->num($sql);
          
        if($check != 1)
        {
          return"Invalid Character Selection.";
        }
        else
        {
          $sql = $db->query("UPDATE $cdb.characters SET `drunk`='0', `playerFlags` = playerFlags & ~ 16 WHERE guid='$guid'");
            $sql1 = $db->query("DELETE FROM $cdb.corpse WHERE guid='$guid'");
              $sql2 = $db->query("DELETE FROM $cdb.character_aura WHERE guid='$guid'");
            return"<span style=\"font-size:11px;\">: Selected character, has been revived.</span>";
        }
      }
    }
  }
}

class online_players
{
  public $get = array();
  public $realm_name;
  public $top_10 = array();
  
  function online_players()
  {
    global $db, $db_data, $connect;
    
    if(isset($_GET['page']) == "realm")
    {
      if(isset($_GET['id']))
      {
        $id = clean($_GET['id']);
        
        $get_db = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$id'");
          $check = $db->num($get_db);
          
        if($check != 1)
        {
          $this->realm_name = "Invalid Realm ID";
        }
        else
        {
          while($gdb = $db->get($get_db))
          {
            $cdb = $gdb['char_db'];
              $this->realm_name = $gdb['rname'];
          }
          
          if(!$connect->select_db($cdb))
          {
          
          }
          else
          {
            $sql = $db->query("SELECT name, level, race, class, gender FROM $cdb.characters WHERE online='1'");
              while($get = $db->get($sql))
              {
                $this->get[] = $get;
              }
              
            $pvp_get = $db->query("SELECT name, race, class, gender, level, totalKills, todayKills FROM $cdb.characters ORDER BY totalKills DESC LIMIT 0, 10");
              while($pvp = $db->get($pvp_get))
              {
                $this->top_10[] = $pvp;
              }
          }
        }
      }
    }
  }
}

class store_cat
{
  public $get = array();
  public $items = array();
  public $store_cat_rn;
  public $store_cat_cn;
  
  function store_cat()
  {
    global $db, $db_data, $db_acc, $login;
    
    if(isset($_GET['page']) && isset($_GET['data']) && $_GET['page'] == "store_shop")
    {
      $data = $_GET['data'];
        $pos = strpos($data, "-");
        if($pos == TRUE)
        {
          $ndt = explode("-", $data);
            $d1 = clean($ndt[0]);
              $d2 = clean($ndt[1]);
              
          if($d1 == FALSE)
          {
            $d1 = 0;
          }
        }
        else
        {
          $d1 = 0;
            $d2 = 0;
        }
        
      $sqli = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$d1'");
        $numi = $db->num($sqli);
          $geti = $db->get($sqli);
            $cdb = $geti['char_db'];
            
      $sqla = $db->query("SELECT id, username FROM $db_acc.account WHERE username='$login'");
        $geta = $db->get($sqla);
          $acid = $geta['id'];
          
      if($numi == 1)
      {
        $sqlc = $db->query("SELECT guid, account, name FROM $cdb.characters WHERE account='$acid' AND guid='$d2'");
          $numc = $db->num($sqlc);
            $getc = $db->get($sqlc);
            
        if($numc == 1)
        {
          $this->store_cat_cn = $getc['name'];
        }
        else
        {
          $this->store_cat_cn = "Invalid Character";
            $d2 = 0;
        }
      }
      else
      {
        $this->store_cat_cn = "Invalid Character";
          $d2 = 0;
      }
        
      if($numi == 0)
      {
        $d1 = 0;
      }
        
      if($d1 != 0)
      {
        $this->store_cat_rn = $geti['rname'];
        
        $sql = $db->query("SELECT id, cname, oid, realm FROM $db_data.store_categories WHERE realm='$d1' ORDER BY oid");
          while($get = $db->get($sql))
          {
            $this->get1[] = $get;
          
            foreach($this->get1 as $key => $value)
            {
              $id = $value['id'];
              
              $sqln = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items WHERE parent_category='$id'");
                while($getn = $db->get($sqln))
                {
                  $ct = $getn['ctype'];
                  
                  $this->items[$id][$getn['sid']] = $getn;
                  
                  if($ct == 1)
                  {
                    $this->items[$id][$getn['sid']]['ctype'] = "Vote";
                  }
                  else
                  {
                    $this->items[$id][$getn['sid']]['ctype'] = "V.I.P";
                  }
                }
            }
            
            $sqln = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items WHERE parent_category='$id' LIMIT 1");
              while($getn = $db->get($sqln))
              {
                $cid = $this->items[$id][$getn['sid']]['parent_category'];
                
                $sql1 = $db->query("SELECT id, cname, oid, realm FROM $db_data.store_categories WHERE id='$cid' AND realm='$d1' ORDER BY oid");
                  while($get1 = $db->get($sql1))
                  {
                    $this->get[] = $get1;
                  }
              }
         }
      }
      else
      {
        $this->store_cat_rn = "Invalid Realm ID";
      }
    }
  }
}

function add_to_cart()
{
  global $db, $db_data, $db_acc, $login;
  
  if(isset($_POST['atc']) || isset($_POST['rfc']) && isset($_GET['page']) && isset($_GET['data']) && $_GET['page'] == "store_shop")
  {
    $data = $_GET['data'];
        $pos = strpos($data, "-");
        if($pos == TRUE)
        {
          $ndt = explode("-", $data);
            $d1 = clean($ndt[0]);
              $d2 = clean($ndt[1]);
              
          if($d1 == FALSE)
          {
            $d1 = 0;
          }
        }
        else
        {
          $d1 = 0;
            $d2 = 0;
        }
        
    $sqli = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$d1'");
        $numi = $db->num($sqli);
          $geti = $db->get($sqli);
            $cdb = $geti['char_db'];
            
      $sqla = $db->query("SELECT id, username FROM $db_acc.account WHERE username='$login'");
        $geta = $db->get($sqla);
          $acid = $geta['id'];
          
      if($numi == 1)
      {
        $sqlc = $db->query("SELECT guid, account, name FROM $cdb.characters WHERE account='$acid' AND guid='$d2'");
          $numc = $db->num($sqlc);
            $getc = $db->get($sqlc);
            
        if($numc == 1)
        {
          $item = clean($_POST['item_id']);
            $parent = clean($_POST['parent']);
          
          if(isset($_POST['atc']))
          {
            $sqll = $db->query("INSERT INTO $db_data.cart (`realm`, `account`, `character`, `item`, `parent`) VALUES ('$d1', '$acid', '$d2', '$item', '$parent')");
          }
          else if(isset($_POST['rfc']))
          {
            $sqll = $db->query("DELETE FROM $db_data.cart WHERE id='$item'");
          }
            header("Location: ?page=store_shop&data={$data}");
        }
        else
        {
          header("Location: ?page=store_shop&data={$data}");
        }
      }
      else
      {
        header("Location: ?page=store_shop&data={$data}");
      }
  }
}

class view_cart
{
  public $get = array();
  public $item = array();
  public $vote_sum;
  public $vip_sum;
  
  function view_cart()
  {
    global $db, $db_data, $db_acc, $login;
    
    if(isset($_GET['page']) && isset($_GET['data']) && $_GET['page'] == "store_shop")
    {
      $sqla = $db->query("SELECT id, username FROM $db_acc.account WHERE username='$login'");
        $geta = $db->get($sqla);
      
      $data = $_GET['data'];
        $pos = strpos($data, "-");
        if($pos == TRUE)
        {
          $ndt = explode("-", $data);
            $d1 = clean($ndt[0]);
              $d2 = clean($ndt[1]);
              
          if($d1 == FALSE)
          {
            $d1 = 0;
          }
        }
        else
        {
          $d1 = 0;
            $d2 = 0;
        }
        
      $char = $d2;
      
      $sqlc = $db->query("SELECT `id`, `realm`, `account`, `character`, `item`, `parent` FROM $db_data.cart WHERE account='$geta[id]' AND realm='$d1' AND `character`='$d2'");
        while($getc = $db->get($sqlc))
        {
          $sqli = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items WHERE sid='$getc[item]' AND parent_category='$getc[parent]'");
            $this->item = $getc;
            
            while($geti = $db->get($sqli))
            {
              $ct = $geti['ctype'];
                
              $this->get[$getc['id']] = $geti;
                $this->get[$getc['id']]['cid'] = $getc['id'];
              
              if($ct == 1)
              {
                $this->get[$getc['id']]['ctype'] = "Vote";
              }
              else
              {
                $this->get[$getc['id']]['ctype'] = "V.I.P";
              }
              
              $sqli1 = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items WHERE sid='$getc[item]' AND ctype='1' AND parent_category='$getc[parent]'");
                while($geti1 = $db->get($sqli1))
                {
                  $this->vote_sum += $geti1['cost'];
                }
                
              $sqli2 = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items WHERE sid='$getc[item]' AND ctype='2' AND parent_category='$getc[parent]'");
                while($geti2 = $db->get($sqli2))
                {
                  $this->vip_sum += $geti2['cost'];
                }
            }
        }
    }
    if(!is_numeric($this->vote_sum))
    {
      $this->vote_sum = 0;
    }
    if(!is_numeric($this->vip_sum))
    {
      $this->vip_sum = 0;
    }
  }
}

function shop_data()
{
  if(isset($_GET['page']) && $_GET['page'] == "store_shop")
  {
    if(isset($_GET['data']))
    {
      return $_GET['data'];
    }
  }
}

function exe_send($command, $rpt)
{
  global $ra_host, $ra_user, $ra_pass;
  
  $conn = new SoapClient(NULL, array(
  'location' => "http://{$ra_host}:{$rpt}/",
  'uri'      => 'urn:TC',
  'style'    => SOAP_RPC,
  'login'    => $ra_user,
  'password' => $ra_pass,
  ));
  
  try
  {
    $result = $conn->executeCommand(new SoapParam($command,"command"));
  }
  catch(Exception $e)
  {
    return $e->getMessage();
  }
                
  return true;
}

function purchase()
{
  if(isset($_GET['page']) && isset($_POST['purchase']) && !empty($_POST['shop_data']) && $_GET['page'] == "store_shop")
  {
    global $db, $db_data, $db_acc, $login, $ra_host, $ra_user, $ra_pass;
      $vcost = 0;
      
    //- Set Date
      date_default_timezone_set('US/Pacific');
        $date = date("l F d, Y @ g:i A");
    
    $data = $_POST['shop_data'];
      $pos = strpos($data, "-");
    
    if($pos == TRUE)
      {
        $ndt = explode("-", $data);
          $d1 = clean($ndt[0]); //Realm
            $d2 = clean($ndt[1]); //Character
              
        if($d1 == FALSE)
        {
          $d1 = 0;
        }
      }
      
    //Perfrom Character Check
      //Validate Character & Account
      
    $sqlr = $db->query("SELECT id, char_db, port, ra_port FROM $db_data.realms WHERE id='$d1'");
      $chkr = $db->num($sqlr);
      
    if($chkr != 1)
    {
      // - Log Code
      $body = "Your recent purchase via the Item Store could not be processed, because the selected realm is Invalid.
      Your purchase will be flagged and reviewed by an administrator.
      
      [b]Error ID: FIR{$d1}-{$d2}[/b]";
        smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
        
        $esql1 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FIR', '$d1', '$d2', '$date')");
          header("Location: ?page=inbox#top");
    }
    else
    {
      $getr = $db->get($sqlr);
        $rpt = $getr['ra_port'];
          $cdb = $getr['char_db'];
            
      $port = status($rpt, 2);
      if($port != "Online")
      {
        // - Log Code
        $body = "Your recent purchase via the Item Store could not be processed, because the selected realm is offline.
        Your purchase will be flagged and reviewed by an administrator.
      
        [b]Error ID: FRO{$d1}-{$d2}[/b]";
          smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
          
          $esql2 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FRO', '$d1', '$d2', '$date')");
            header("Location: ?page=inbox#top");
      }
      else
      {
        $sqlc = $db->query("SELECT `account`.`id`, `account`.`username`, `characters`.`guid`, `characters`.`account` FROM `$db_acc`.`account`, `$cdb`.`characters` WHERE `account`.`id` = `characters`.`account` AND `characters`.`guid` = '$d2' AND `account`.`username` = '$login'");
          $chkc = $db->num($sqlc);
          
        if($chkc != 1)
        {
          // - Log Code
          $body = "Your recent purchase via the Item Store could not be processed, because the selected character is invalid.
          Your purchase will be flagged and reviewed by an administrator.
      
          [b]Error ID: FIC{$d1}-{$d2}[/b]";
            smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
            
            $esql3 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FIC', '$d1', '$d2', '$date')");
              header("Location: ?page=inbox#top");
        }
        else
        {
          $sqla = $db->query("SELECT id, username, vp, dp FROM $db_acc.account WHERE username='$login'");
            $geta = $db->get($sqla);
              $ovp = $geta['vp'];
                $odp = $geta['dp'];
                  $id = $geta['id'];
                
          $sqli = $db->query("SELECT `realm`, `account`, `character`, `item` FROM $db_data.cart WHERE `realm`='$d1' AND `account`='$id' AND `character`='$d2'");
            $chli = $db->num($sqli);
            
          if($chli <= 0)
          {
            // - Log Code
            $body = "Your recent purchase via the Item Store could not be processed, because your cart is empty.
            Your purchase will be flagged and reviewed by an administrator.
      
            [b]Error ID: FEC{$d1}-{$d2}[/b]";
              smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
              
              $esql4 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FEC', '$d1', '$d2', '$date')");
                header("Location: ?page=inbox#top");
          }
          else
          {
            $vcart = new view_cart;
              $tvc = $vcart->vote_sum;
                $tdc = $vcart->vip_sum;
                
            if($tvc > $ovp || $tdc > $odp)
            {
              // - Log Code
              $body = "Your recent purchase via the Item Store could not be processed, because the total cost exceeds the amount of Vote / V.I.P points on your account. Your purchase will be flagged and reviewed by an administrator.
      
              [b]Error ID: FIF{$d1}-{$d2}[/b]";
                smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
                
                $esql5 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FIF', '$d1', '$d2', '$date')");
                  header("Location: ?page=inbox#top");
            }
            else
            {
              $cart_list = "";
              while($geti = $db->get($sqli))
              {
                $sqlip = $db->query("SELECT sid, name, display, item, amount FROM $db_data.store_items WHERE sid IN ($geti[item])");
                  while($getip = $db->get($sqlip))
                  {
                    $item = $getip['item'];
                      $item = explode(',', $item);
                    
                    foreach($item as $itd)
                    {
                      $sit[] = "{$itd}[:{$getip['amount']}],";
                    }
                    
                    $trid = rs(12);
                  }
              }
              
              $status = 2;
              
              $subject = "Item Store Purchase";
                $text = "Thank You, for your purchase.";
              
              $sql_char = $db->query("SELECT guid, name FROM $cdb.characters WHERE guid='$d2'");
                $chars = $db->get($sql_char);
                  $char = $chars['name'];
              
              foreach($sit as $cart)
              {
                $send = "send items $char \"$subject\" \"$text\" $cart";
                  $result = exe_send($send, $rpt);
                  
                if($result == true)
                {
                  $status = 1;
                }
              }
                      
              if($status == 1)
              {
                //Item Was Sent, Purchase Was Successful
                $vp = $ovp - $tvc;
                  $dp = $odp - $tdc;
                      
                $sql_go = $db->query("UPDATE $db_acc.account SET vp='$vp', dp='$dp' WHERE username='$login'");
                  //- Log Items
                  $sql_pi = $db->query("INSERT INTO $db_data.store_log (trs_id) VALUES ('$trid')");
                    $sql_cs = $db->query("SELECT `store_items`.`sid`, `store_items`.`name`, `store_items`.`item`, `cart`.`realm`, `cart`.`character`, `cart`.`item` FROM `$db_data`.`store_items`, `$db_data`.`cart` WHERE `cart`.`realm`='$d1' AND `cart`.`character`='$d2' AND `store_items`.`sid`=`cart`.`item`");
                      while($gcs = $db->get($sql_cs))
                      {
                        $id = $gcs['item'];
                           $itn = $gcs['name'];
                             
                         $sql_pi1 = $db->query("SELECT trs_id, prc_items FROM $db_data.store_log WHERE trs_id='$trid'");
                           $pi_get = $db->get($sql_pi1);
                             
                         if(empty($pi_get['prc_items']))
                         {
                           $curr_items = "{$pi_get['prc_items']}";
                         }
                         else
                         {
                           $curr_items = "{$pi_get['prc_items']},";
                         }
                           $sql_pi2 = $db->query("UPDATE $db_data.store_log SET prc_items='{$curr_items}{$id}-{$itn}' WHERE trs_id='$trid'");
                      }
                  
                $sql_clear = $db->query("DELETE FROM $db_data.cart WHERE `realm`='$d1' AND `character`='$d2'");
                          
                //- Log Code
                $sql_iul = $db->query("SELECT trs_id, prc_items FROM $db_data.store_log WHERE trs_id='$trid'");
                  $iul_get = $db->get($sql_iul);
                    $all_pits = $iul_get['prc_items'];
                        
                $body = "Your recent purchase via the Item Store has been processed, and all items have been sent via In-Game Mail.
                [b]Transaction ID:[/b] [i]{$trid}[/i]
                
                [b]Purchased Items:[/b] {$all_pits}.
                [i]The numbers related to the items above are unique id(s), not quantity purchased.[/i]
      
                Total Cost: Vote Points: {$tvc}, V.I.P Points: {$tdc}.";
                smsg("Admin", "$login", "Item Store - Purchase Receipt", "$body");
                    
                $esql6 = $db->query("UPDATE $db_data.store_log SET body='$body', eid='Success', acc_id='$d1', char_id='$d2', date='$date' WHERE trs_id='$trid'");
                  header("Location: ?page=inbox#top");
              }
              else
              {
                $body = "Your recent purchase via the Item Store could not be processed.
                Your purchase will be flagged and reviewed by an administrator.
      
                [b]Error ID: FTNE{$d1}-{$d2}[/b]";
                smsg("Admin", "$login", "Item Store - Failed Purchase", "$body");
                        
                //- Log Code
                $esql7 = $db->query("INSERT INTO $db_data.store_log (body, eid, acc_id, char_id, date) VALUES ('$body', 'FTNE', '$d1', '$d2', '$date')");
                  header("Location: ?page=inbox#top");
              }
            }
          }
        }
      }
    }
  }
}
?>
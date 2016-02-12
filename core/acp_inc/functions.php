<?php if(!defined('ACMS')){ header("Location: ../../"); }

function style()
{
  global $db, $db_data;
  
  $sql = $db->query("SELECT id, path, install, active FROM $db_data.acp_styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
    $get = $db->get($sql);
  
  return $get['path'];
}

function page_system()
{
  global $db, $db_data;
  
  $sql = $db->query("SELECT id, path, install, active FROM $db_data.acp_styles WHERE install='1' AND active='1' ORDER BY id DESC LIMIT 1");
    $get = $db->get($sql);
  
  if(isset($_GET['page']))
  {
    $page = page($_GET['page']);
    
    $location = "./styles/{$get['path']}/pages/{$page}.php";
      if(file_exists($location) && $page != "index")
      {
        $file = logged(file_get_contents($location));
          return $file;
      }
      else
      {
        $location = "./styles/{$get['path']}/pages/not_found.php";
          $file = logged(file_get_contents($location));
            return $file;
      }
  }
  else
  {
    $location = "./styles/{$get['path']}/pages/home.php";
      $file = logged(file_get_contents($location));
        return $file;
  }
}

function acp_login()
{
  if(!isset($_SESSION['acp']) && isset($_POST['login']))
  {
    $username = ucfirst(clean($_POST['username']));
      $password = clean($_POST['password']);
        $sid = clean($_POST['sid']);
        
    $pass = encrypt($username, $password);
    
    if(empty($username))
    {
      return"Invalid Username.";
    }
    else
    {
      if(empty($password))
      {
        return"Invalid Password.";
      }
      else
      {
        if(empty($sid))
        {
          return"Invalid Staff Id.";
        }
        else
        {
          global $db, $db_acc, $db_data, $ip;
          
          //- Set Date
          date_default_timezone_set('US/Pacific');
          $date = date("l F d, Y @ g:i A");
          
          $sql1 = $db->query("SELECT username, rank FROM $db_acc.account WHERE username='$username'");
            $num1 = $db->num($sql1);
              $get1 = $db->get($sql1);
              
          if($num1 != 1)
          {
            $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Invalid Account', 'ACP')");
              return"The account '{$username}', does not exists.";
          }
          else
          {
            $sql2 = $db->query("SELECT username, sha_pass_hash FROM $db_acc.account WHERE username='$username' AND sha_pass_hash='$pass'");
              $num2 = $db->num($sql2);
            
            if($num2 != 1)
            {
              $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Invalid Password', 'ACP')");
                return"The username & password entered, do not match.";
            }
            else
            {
              $sql3 = $db->query("SELECT username, staff_id FROM $db_acc.account WHERE username='$username' AND staff_id='$sid'");
                $num3 = $db->num($sql3);
                
              if($num3 != 1)
              {
                $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Invalid Staff ID', 'ACP')");
                  return"The username & staff id entered, do not match.";
              }
              else
              {
                if($get1['rank'] != 2)
                {
                  $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Failed: Access Denied', 'ACP')");
                    return"The account '{$username}', was denied access.";
                }
                else
                {
                  $sql = $db->query("INSERT INTO $db_data.login_log (username, ip, date, status, lty) VALUES ('$username', '$ip', '$date', 'Success', 'ACP')");
                    $_SESSION['acp'] = $username;
                      header("Location: ./");
                }
              }
            }
          }
        }
      }
    }
  }
}

function logout()
{
  if(isset($_GET['page']) && $_GET['page'] == "logout")
  {
    session_destroy();
      header("Location: ./");
  }
}

class login_logs
{
  public $get = array();
  
  function login_logs()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, username, ip, date, status, lty FROM $db_data.login_log ORDER BY id DESC LIMIT 2000");
      while($get = $db->get($sql))
        $this->get[] = $get;
  }
}

class vote_logs
{
  public $get = array();
  
  function vote_logs()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, user, site_name, site_id, site_cost, date, timer FROM $db_data.vote_logs ORDER BY id DESC LIMIT 2000");
      while($get = $db->get($sql))
        $this->get[] = $get;
  }
}

class properties
{
  public $get = array();
  public $data = array();
  
  function properties()
  {
    global $db, $db_data, $db_acc;
    
    $sql = $db->query("SELECT global_title, email_activation, login, copyright, realmlist, server_email, domain, server_title, expansion FROM $db_data.global");
      while($get = $db->get($sql))
      {
        if($get['email_activation'] == 0)
        {
          $this->data['email_activation'] = "Disabled";
            $this->data['email_activation1'] = "Enabled";
            
          $this->data['ea'] = "0";
            $this->data['ea1'] = "1";
        }
        else
        {
          $this->data['email_activation'] = "Enabled";
            $this->data['email_activation1'] = "Disabled";
            
          $this->data['ea'] = "1";
            $this->data['ea1'] = "0";
        }
        
        if($get['login'] == 1)
        {
          $this->data['login'] = "Enabled";
            $this->data['login1'] = "Disabled";
            
          $this->data['log'] = "1";
            $this->data['log1'] = "0";
        }
        else
        {
          $this->data['login'] = "Disabled";
            $this->data['login1'] = "Enabled";
            
          $this->data['log'] = "0";
            $this->data['log1'] = "1";
        }
        
        if($get['expansion'] == 2)
        {
          $this->data['exp'] = "Wrath Of The Lich King";
            $this->data['exp1'] = "Cataclysm";
            
          $this->data['ex'] = "2";
            $this->data['ex1'] = "3";
            
          $sqli = $db->query("UPDATE $db_acc.account SET expansion='2'");
        }
        else
        {
          $this->data['exp'] = "Cataclysm";
            $this->data['exp1'] = "Wrath Of The Lich King";
            
          $this->data['ex'] = "3";
            $this->data['ex1'] = "2";
            
          $sqli = $db->query("UPDATE $db_acc.account SET expansion='3'");
        }
      
        $this->get[] = $get;
      }
  }
}

function global_update()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && $_GET['page'] == "properties" && isset($_POST['update']))
  {
    $title = strip($_POST['global_title']);
      $email_act = clean($_POST['email_act']);
        $login = clean($_POST['login']);
          $cright = strip($_POST['cright']);
            $realm = strip($_POST['realm']);
              $semail = strip($_POST['semail']);
                $domain = strip($_POST['domain']);
                  $stitle = strip($_POST['stitle']);
                    $expansion = clean($_POST['expansion']);
                    
    $sql = $db->query("UPDATE $db_data.global SET global_title='$title', email_activation='$email_act', login='$login', copyright='$cright', realmlist='$realm', server_email='$semail', domain='$domain', server_title='$stitle', expansion='$expansion'");
      header("Location: ?page=properties");
  }
}

class vote_sites
{
  public $get = array();
  public $nid;
  
  function vote_sites()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, site_name, site_url, site_img, site_cost FROM $db_data.vote_sites ORDER BY id");
      while($get = $db->get($sql))
      {
        $this->get[] = $get;
      }
      
    $sqli = $db->query("SELECT id, site_name, site_url, site_img, site_cost FROM $db_data.vote_sites ORDER BY id DESC LIMIT 1");
      $geti = $db->get($sqli);
      
    $this->nid = $geti['id']+1;
  }
}

function vote_action()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "manage_sites")
  {
    $action = clean($_GET['action']);
      $id = clean($_GET['id']);
    
    if(!empty($id) && !empty($action))
    {
      if($action == "delete")
      {
        $sql = $db->query("DELETE FROM $db_data.vote_sites WHERE id='$id'");
          header("Location: ?page=manage_sites");
      }
    }
    else
    {
      header("Location: ?page=manage_sites");
    }
  }
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_sites")
  {
    $sname = strip($_POST['sname']);
      $simg = strip($_POST['simg']);
        $surl = strip($_POST['surl']);
          $scost = strip($_POST['scost']);
          
    $sql = $db->query("INSERT INTO $db_data.vote_sites (site_name, site_url, site_img, site_cost) VALUES ('$sname', '$surl', '$simg', '$scost')");
      header("Location: ?page=manage_sites");
  }
}

class vs_edit
{
  public $get = array();
  
  function vs_edit()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && $_GET['page'] == "manage_sites_edit")
    {
      $id = clean($_GET['id']);
    
      $sql = $db->query("SELECT id, site_name, site_url, site_img, site_cost FROM $db_data.vote_sites WHERE id='$id'");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
  }
}

function vote_update()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_sites_edit")
  {
    if(isset($_POST['update']))
    {
      $name = strip($_POST['sname']);
        $img = strip($_POST['simg']);
          $url = strip($_POST['surl']);
            $cost = strip($_POST['scost']);
              $id = clean($_POST['site_id']);
              
      if(!empty($id))
      {
        $sql = $db->query("UPDATE $db_data.vote_sites SET site_name='$name', site_url='$url', site_img='$img', site_cost='$cost' WHERE id='$id'");
          header("Location: ?page=manage_sites");
      }
      else
      {
        header("Location: ?page=manage_sites");
      }
    }
  }
}

class news_list
{
  public $get = array();
  
  function news_list()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, title, author, date FROM $db_data.news ORDER BY id DESC");
      while($get = $db->get($sql))
        $this->get[] = $get;
  }
}

class news_edit
{
  public $data = array();
  
  function news_edit()
  {
    if(isset($_GET['page']) && $_GET['page'] == "manage_news")
    {
      global $db, $db_data, $admin;
      
      if(isset($_POST['edit']))
      {
        $id = clean($_POST['id']);
        
        $sql = $db->query("SELECT id, title, author, body, date, avatar FROM $db_data.news WHERE id='$id'");
          while($get = $db->get($sql))
            $this->data[] = $get;
      }
      else
      {
        $data = array(
        "id" => "0",
        "title" => "",
        "author" => "",
        "body" => "",
        "date" => "",
        "avatar" => "",
        );
        
        $this->data[] = $data;
      }
      
      if(isset($_POST['delete']))
      {
        $id = clean($_POST['nid']);
          $sql = $db->query("DELETE FROM $db_data.news WHERE id='$id'");
            header("Location: ?page=manage_news");
      }
      
      if(isset($_POST['save']))
      {
        $title = strip($_POST['title']);
          $body = strip($_POST['sbody']);
            $avatar = strip($_POST['avatar']);
              $date = date("F d, Y");
                $nid = clean($_POST['nid']);
            
        if(!empty($title) && !empty($body) && !empty($avatar) && $nid == 0)
        {
          $sql = $db->query("INSERT INTO $db_data.news (title, author, body, date, avatar) VALUES ('$title', '$admin', '$body', '$date', '$avatar')");
            die(header("Location: ?page=manage_news"));
        }
        else if(!empty($title) && !empty($body) && !empty($avatar) && $nid != 0)
        {
          $sql = $db->query("UPDATE $db_data.news SET title='$title', author='$admin', body='$body', avatar='$avatar' WHERE id='$nid'");
            header("Location: ?page=manage_news");
        }
      }
    }
  }
}

function account_search()
{
  global $db, $db_acc, $db_data;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_accounts")
  {
    if(isset($_POST['find_account']))
    {
      $data = strip($_POST['account']);
      
      if($data == "all")
      {
        $sql = $db->query("SELECT id, username, email FROM $db_acc.account ORDER BY id");
      }
      else
      {
        $sql = $db->query("SELECT id, username, email FROM $db_acc.account WHERE id='$data' OR username='$data' OR email='$data'");
      }
        $check = $db->num($sql);
          while($get = $db->get($sql))
          
      if($check != 0)
      {
        if($check == 1)
        {
          $id = $get['id'];
        }
        else
        {
          $id .= "{$get['id']}-";
        }
        
        header("Location: ?page=manage_accounts_edit&id={$id}");
      }
    }
  }
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_characters")
  {
    if(isset($_POST['find_characters']))
    {
      $data = strip($_POST['character']);
        $rlm = strip($_POST['realm']);
        
      $sql1 = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$rlm'");
        $get1 = $db->get($sql1);
          $cdb = $get1['char_db'];
      
      if($data == "all")
      {
        $sql = $db->query("SELECT guid, name FROM $cdb.characters ORDER BY guid");
      }
      else
      {
        $sql = $db->query("SELECT guid, name FROM $cdb.characters WHERE name='$data' ORDER BY guid");
      }
        $check = $db->num($sql);
          while($get = $db->get($sql))
          
      if($check != 0)
      {
        if($check == 1)
        {
          $id = $get['guid'];
        }
        else
        {
          $id .= "{$get['guid']}-";
        }
        
        header("Location: ?page=manage_characters_edit&id={$id}&realm=$rlm");
      }
    }
  }
}

class view_accounts
{
  public $get = array();
  
  function view_accounts()
  {
    global $db, $db_acc;
    
    if(isset($_GET['id']))
    {
    $oid = $_GET['id'];
    
    $pos = strpos($oid, "-");
    
    $id = explode("-", $oid);
      $id = clean($id);
      
    foreach($id as $uid)
    {
      $sql = $db->query("SELECT id, username, email, mutetime, staff_id, activation, isactive as active, vp, dp, rank FROM $db_acc.account WHERE id='$uid'");
        while($get = $db->get($sql))
        {
          $this->get[$get['id']] = $get;
            $aid = $get['id'];
            
          $mute = $get['mutetime'];
          if($mute == 0)
          {
            $this->get[$aid]['mute1'] = "No";
              $this->get[$aid]['mute2'] = "Yes";
                $this->get[$aid]['mutetime1'] = 0;
                  $this->get[$aid]['mutetime2'] = 1;
          }
          else
          {
            $this->get[$aid]['mute1'] = "Yes";
              $this->get[$aid]['mute2'] = "No";
                $this->get[$aid]['mutetime1'] = 1;
                  $this->get[$aid]['mutetime2'] = 0;
          }
            
          $active = $get['active'];
          if($active == 1)
          {
            $this->get[$aid]['actt1'] = "Yes";
              $this->get[$aid]['actt2'] = "No";
                $this->get[$aid]['act1'] = "1";
                  $this->get[$aid]['act2'] = "0";
          }
          else
          {
            $this->get[$aid]['actt1'] = "No";
              $this->get[$aid]['actt2'] = "Yes";
                $this->get[$aid]['act1'] = "0";
                  $this->get[$aid]['act2'] = "1";
          }
            
          $admin = $get['rank'];
          if($admin == 2)
          {
            $this->get[$aid]['admin1'] = "Admin";
              $this->get[$aid]['admin2'] = "User";
                $this->get[$aid]['adm1'] = "2";
                  $this->get[$aid]['adm2'] = "0";
          }
          else
          {
            $this->get[$aid]['admin1'] = "User";
              $this->get[$aid]['admin2'] = "Admin";
                $this->get[$aid]['adm1'] = "0";
                  $this->get[$aid]['adm2'] = "2";
          }
        }
      }
    }
  }
}

class view_characters
{
  public $get = array();
  public $race = array();
  public $ccl = array();
  
  function view_characters()
  {
    global $db, $db_acc, $db_data;
    
    if(isset($_GET['id']) && isset($_GET['page']) && $_GET['page'] == "manage_characters_edit")
    {
    $oid = $_GET['id'];
    
    $pos = strpos($oid, "-");
    
    $id = explode("-", $oid);
      $id = clean($id);
      
    $rlm = strip($_GET['realm']);
      
    $sql1 = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$rlm'");
        $get1 = $db->get($sql1);
          $cdb = $get1['char_db'];
      
    foreach($id as $uid)
    {
      $sql = $db->query("SELECT guid, account, name, race, class, gender, level FROM $cdb.characters WHERE guid='$uid'");
        while($get = $db->get($sql))
        {
          $this->get[$get['guid']] = $get;
            $aid = $get['guid'];
            
          $race = $get['race'];
          if($race == 1)
          {
            $this->race = array(
            "0" => array("val" => "Human", "val1" => 1,),
            "1" => array("val" => "Orc", "val1" => 2,),
            "2" => array("val" => "Dwarf", "val1" => 3,),
            "3" => array("val" => "Night Elf", "val1" => 4,),
            "4" => array("val" => "Undead", "val1" => 5,),
            "5" => array("val" => "Tauren", "val1" => 6,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 2)
          {
            $this->race = array(
            "0" => array("val" => "Orc", "val1" => 2,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Dwarf", "val1" => 3,),
            "3" => array("val" => "Night Elf", "val1" => 4,),
            "4" => array("val" => "Undead", "val1" => 5,),
            "5" => array("val" => "Tauren", "val1" => 6,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 3)
          {
            $this->race = array(
            "0" => array("val" => "Dwarf", "val1" => 3,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Night Elf", "val1" => 4,),
            "4" => array("val" => "Undead", "val1" => 5,),
            "5" => array("val" => "Tauren", "val1" => 6,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 4)
          {
            $this->race = array(
            "0" => array("val" => "Night Elf", "val1" => 4,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Undead", "val1" => 5,),
            "5" => array("val" => "Tauren", "val1" => 6,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 5)
          {
            $this->race = array(
            "0" => array("val" => "Undead", "val1" => 5,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Tauren", "val1" => 6,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 6)
          {
            $this->race = array(
            "0" => array("val" => "Tauren", "val1" => 6,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Gnome", "val1" => 7,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 7)
          {
            $this->race = array(
            "0" => array("val" => "Gnome", "val1" => 7,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Troll", "val1" => 8,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 8)
          {
            $this->race = array(
            "0" => array("val" => "Troll", "val1" => 8,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Gnome", "val1" => 7,),
            "8" => array("val" => "Goblin", "val1" => 9,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 9)
          {
            $this->race = array(
            "0" => array("val" => "Goblin", "val1" => 9,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Gnome", "val1" => 7,),
            "8" => array("val" => "Troll", "val1" => 8,),
            "9" => array("val" => "Blood Elf", "val1" => 10,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 10)
          {
            $this->race = array(
            "0" => array("val" => "Blood Elf", "val1" => 10,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Gnome", "val1" => 7,),
            "8" => array("val" => "Troll", "val1" => 8,),
            "9" => array("val" => "Goblin", "val1" => 9,),
            "10" => array("val" => "Drani", "val1" => 11,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else if($race == 11)
          {
            $this->race = array(
            "0" => array("val" => "Drani", "val1" => 11,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Gnome", "val1" => 7,),
            "8" => array("val" => "Troll", "val1" => 8,),
            "9" => array("val" => "Goblin", "val1" => 9,),
            "10" => array("val" => "Blood Elf", "val1" => 10,),
            "11" => array("val" => "Worgen", "val1" => 22,),
            );
          }
          else
          {
            $this->race = array(
            "0" => array("val" => "Worgen", "val1" => 22,),
            "1" => array("val" => "Human", "val1" => 1,),
            "2" => array("val" => "Orc", "val1" => 2,),
            "3" => array("val" => "Dwarf", "val1" => 3,),
            "4" => array("val" => "Night Elf", "val1" => 4,),
            "5" => array("val" => "Undead", "val1" => 5,),
            "6" => array("val" => "Tauren", "val1" => 6,),
            "7" => array("val" => "Gnome", "val1" => 7,),
            "8" => array("val" => "Troll", "val1" => 8,),
            "9" => array("val" => "Goblin", "val1" => 9,),
            "10" => array("val" => "Blood Elf", "val1" => 10,),
            "11" => array("val" => "Drani", "val1" => 11,),
            );
          }
          
          $class = $get['class'];
          if($class == 1)
          {
            $this->ccl = array(
            "0" => array("val" => "Warrior", "val1" => 1,),
            "1" => array("val" => "Paladin", "val1" => 2,),
            "2" => array("val" => "Hunter", "val1" => 3,),
            "3" => array("val" => "Rogue", "val1" => 4,),
            "4" => array("val" => "Priest", "val1" => 5,),
            "5" => array("val" => "Death Knight", "val1" => 6,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 2)
          {
            $this->ccl = array(
            "0" => array("val" => "Paladin", "val1" => 2,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Hunter", "val1" => 3,),
            "3" => array("val" => "Rogue", "val1" => 4,),
            "4" => array("val" => "Priest", "val1" => 5,),
            "5" => array("val" => "Death Knight", "val1" => 6,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 3)
          {
            $this->ccl = array(
            "0" => array("val" => "Hunter", "val1" => 3,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Rogue", "val1" => 4,),
            "4" => array("val" => "Priest", "val1" => 5,),
            "5" => array("val" => "Death Knight", "val1" => 6,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 4)
          {
            $this->ccl = array(
            "0" => array("val" => "Rogue", "val1" => 4,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Priest", "val1" => 5,),
            "5" => array("val" => "Death Knight", "val1" => 6,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 5)
          {
            $this->ccl = array(
            "0" => array("val" => "Priest", "val1" => 5,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Death Knight", "val1" => 6,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 6)
          {
            $this->ccl = array(
            "0" => array("val" => "Death Knight", "val1" => 6,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Priest", "val1" => 5,),
            "6" => array("val" => "Shaman", "val1" => 7,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 7)
          {
            $this->ccl = array(
            "0" => array("val" => "Shaman", "val1" => 7,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Priest", "val1" => 5,),
            "6" => array("val" => "Death Knight", "val1" => 6,),
            "7" => array("val" => "Mage", "val1" => 8,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 8)
          {
            $this->ccl = array(
            "0" => array("val" => "Mage", "val1" => 8,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Priest", "val1" => 5,),
            "6" => array("val" => "Death Knight", "val1" => 6,),
            "7" => array("val" => "Shaman", "val1" => 7,),
            "8" => array("val" => "Warlock", "val1" => 9,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else if($class == 9)
          {
            $this->ccl = array(
            "0" => array("val" => "Warlock", "val1" => 9,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Priest", "val1" => 5,),
            "6" => array("val" => "Death Knight", "val1" => 6,),
            "7" => array("val" => "Shaman", "val1" => 7,),
            "8" => array("val" => "Mage", "val1" => 8,),
            "9" => array("val" => "Druid", "val1" => 11,),
            );
          }
          else
          {
            $this->ccl = array(
            "0" => array("val" => "Druid", "val1" => 11,),
            "1" => array("val" => "Warrior", "val1" => 1,),
            "2" => array("val" => "Paladin", "val1" => 2,),
            "3" => array("val" => "Hunter", "val1" => 3,),
            "4" => array("val" => "Rogue", "val1" => 4,),
            "5" => array("val" => "Priest", "val1" => 5,),
            "6" => array("val" => "Death Knight", "val1" => 6,),
            "7" => array("val" => "Shaman", "val1" => 7,),
            "8" => array("val" => "Mage", "val1" => 8,),
            "9" => array("val" => "Warlock", "val1" => 9,),
            );
          }
          
            
          $gender = $get['gender'];
          if($gender == 0)
          {
            $this->get[$aid]['gender1'] = "Male";
              $this->get[$aid]['gender2'] = "Female";
                $this->get[$aid]['g1'] = 0;
                  $this->get[$aid]['g2'] = 1;
          }
          else
          {
            $this->get[$aid]['gender1'] = "Female";
              $this->get[$aid]['gender2'] = "Male";
                $this->get[$aid]['g1'] = 1;
                  $this->get[$aid]['g2'] = 0;
          }
        }
      }
    }
  }
}

function update_account()
{
  global $db, $db_acc, $db_data, $admin;
  
  if(isset($_GET['page']) && isset($_POST['delete']) && $_GET['page'] == "manage_accounts_edit")
  {
    $id = clean($_POST['uid']);
    
    $sql = $db->query("DELETE FROM $db_acc.account WHERE id='$id'");
      $sql1 = $db->query("DELETE FROM $db_data.cart WHERE account='$id'");
    
    header("Location: ?page=manage_accounts");
  }
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_accounts_edit")
  {
    $username = clean($_POST['username']);
    
    $id = clean($_POST['uid']);
      $email = ucfirst(strip($_POST['email']));
        $mute = npm(clean($_POST['mute']));
          $activation = strip($_POST['activation']);
            $active = npm(clean($_POST['active']));
              $vp = npm(clean($_POST['vp']));
                $dp = npm(clean($_POST['dp']));
                  $rank = npm(clean($_POST['access']));
                    
    if($active == 1)
    {
      $log = "Your account was manually activated/updated by [Administrator] {$admin}";
    }
    else
    {
      $log = "Your account was manually de-activated/updated by [Administrator] {$admin}";
    }
    
    //- Set Date
      date_default_timezone_set('US/Pacific');
        $date = date("l F d, Y @ g:i A");
                    
    if(!empty($email))
    {
      $sql = $db->query("UPDATE $db_acc.account SET email='$email', mutetime='$mute', activation='$activation', isactive='$active', vp='$vp', dp='$dp', rank='$rank' WHERE id='$id'");
        smsg("Admin", "$username", "Activation Alert", "$log");
          header("Location: ?page=manage_accounts_edit&id={$id}");
    }
    else
    {
      header("Location: ?page=manage_accounts_edit&id={$id}");
    }
  }
}

class vip_log
{
  public $get = array();
  
  function vip_log()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, body FROM $db_data.vip_log ORDER BY id DESC");
      while($get = $db->get($sql))
      {
        $this->get[] = str_replace(array("\r\n", "\r", "\n"), "<br />", $get);
      }
  }
}

function purge()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "purge" && $_GET['action'] == "1")
  {
    $sql1 = $db->query("DELETE FROM $db_data.messages WHERE inbox_copy='0' AND outbox_copy='0'");
      $sql2 = $db->query("DELETE FROM $db_data.messages WHERE sender='Admin' AND inbox_copy='0' AND outbox_copy='1'");
          $sql3 = $db->query("DELETE FROM $db_data.messages WHERE user=''");
        
    header("Location: ./");
  }
}

class style_install
{
  public $get = array();
  
  function style_install()
  {
    global $db, $db_data;
    
    $location = "../styles";
      $module = scandir($location);
    
    foreach($module as $value)
    {
      if ($value != "." && $value != ".." && $value != "index.php" && $value != "global")
      {
        $this->get[$value]['style_name'] = $value;
        
        $this->get[$value]["s1"] = "Install";
          $this->get[$value]["s1v"] = 1;
              
        $this->get[$value]["s2"] = "UnInstall";
          $this->get[$value]["s2v"] = 0;
          
        $this->get[$value]['style_id'] = 0;
        
        $sql = $db->query("SELECT id, path FROM $db_data.styles WHERE install='1'");
          while($get = $db->get($sql))
          {
            $this->get[$get['path']]["s1"] = "UnInstall";
              $this->get[$get['path']]["s1v"] = 0;
              
            $this->get[$get['path']]["s2"] = "Install";
              $this->get[$get['path']]["s2v"] = 1;
              
            $this->get[$get['path']]['style_id'] = $get['id'];
          }
      }
    }
  }
}

function style_action()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_styles")
  {
    $action = $_POST['install'];
      $sid = clean($_POST['id']);
        $path = strip($_POST['path']);
      
    if($action == 1)
    {
      $sql1 = $db->query("INSERT INTO $db_data.styles (path, install, active) VALUES ('$path', '1', '1')");
        header("Location: ?page=manage_styles");
    }
    else
    {
      $sql1 = $db->query("DELETE FROM $db_data.styles WHERE id='$sid'");
        header("Location: ?page=manage_styles");
    }
  }
}

class acp_install
{
  public $get = array();
  
  function acp_install()
  {
    global $db, $db_data;
    
    $location = "./styles";
      $module = scandir($location);
    
    foreach($module as $value)
    {
      if ($value != "." && $value != ".." && $value != "index.php" && $value != "global" && $value != "login")
      {
        $this->get[$value]['style_name'] = $value;
        
        $this->get[$value]["s1"] = "Install";
          $this->get[$value]["s1v"] = 1;
              
        $this->get[$value]["s2"] = "UnInstall";
          $this->get[$value]["s2v"] = 0;
          
        $this->get[$value]['style_id'] = 0;
        
        $sql = $db->query("SELECT id, path FROM $db_data.acp_styles WHERE install='1'");
          while($get = $db->get($sql))
          {
            $this->get[$get['path']]["s1"] = "UnInstall";
              $this->get[$get['path']]["s1v"] = 0;
              
            $this->get[$get['path']]["s2"] = "Install";
              $this->get[$get['path']]["s2v"] = 1;
              
            $this->get[$get['path']]['style_id'] = $get['id'];
          }
      }
    }
  }
}

function acp_action()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_styles_acp")
  {
    $action = $_POST['install'];
      $sid = clean($_POST['id']);
        $path = strip($_POST['path']);
      
    if($action == 1)
    {
      $sql1 = $db->query("INSERT INTO $db_data.acp_styles (path, install, active) VALUES ('$path', '1', '1')");
        header("Location: ?page=manage_styles_acp");
    }
    else
    {
      $sql1 = $db->query("DELETE FROM $db_data.acp_styles WHERE id='$sid'");
        header("Location: ?page=manage_styles_acp");
    }
  }
}

class store_log
{
  public $get = array();
  
  function store_log()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, body, eid, acc_id, char_id, date, trs_id, prc_items FROM $db_data.store_log ORDER BY id DESC");
      while($get = $db->get($sql))
      {
        $this->get[] = $get;
      }
  }
}

class store_categories
{
  public $get = array();
  public $nid;
  
  function store_categories()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT id, cname, oid, realm FROM $db_data.store_categories ORDER BY realm, id, oid");
      while($get = $db->get($sql))
      {
        $this->get[] = $get;
      }
      
    $sqli = $db->query("SELECT id FROM $db_data.store_categories ORDER BY id DESC LIMIT 1");
      $geti = $db->get($sqli);
      
    $this->nid = $geti['id']+1;
  }
}

class store_realms
{
  public $get = array();
  
  function store_realms()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && isset($_GET['id']) && $_GET['page'] == "manage_categories_edit")
    {
      $cid = clean($_GET['id']);
      
      $sql1 = $db->query("SELECT id, realm FROM $db_data.store_categories WHERE id='$cid'");
        $get1 = $db->get($sql1);
          $rid = $get1['realm'];
      
      $sql = $db->query("SELECT id, rname FROM $db_data.realms ORDER BY id='$rid' DESC");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
    else
    {
      $sql = $db->query("SELECT id, rname, type, oid, char_db, port, ra_port FROM $db_data.realms ORDER BY id");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
  }
}

function store_cat_action()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "manage_categories")
  {
    $action = clean($_GET['action']);
      $id = clean($_GET['id']);
    
    if(!empty($id) && !empty($action))
    {
      if($action == "delete")
      {
        $sql = $db->query("DELETE FROM $db_data.store_categories WHERE id='$id'");
          header("Location: ?page=manage_categories");
          
        $sql1 = $db->query("DELETE FROM $db_data.store_items WHERE parent_category='$id'");
      }
    }
    else
    {
      header("Location: ?page=manage_categories");
    }
  }
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_categories")
  {
    $rname = strip($_POST['rname']);
      $oid = strip($_POST['oid']);
        $realm = strip($_POST['realm']);
          
    $sql = $db->query("INSERT INTO $db_data.store_categories (cname, oid, realm) VALUES ('$rname', '$oid', '$realm')");
      header("Location: ?page=manage_categories");
  }
}

class sc_edit
{
  public $get = array();
  
  function sc_edit()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && $_GET['page'] == "manage_categories_edit")
    {
      $id = clean($_GET['id']);
    
      $sql = $db->query("SELECT id, cname, oid, realm FROM $db_data.store_categories WHERE id='$id'");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
  }
}

function category_update()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_categories_edit")
  {
    if(isset($_POST['update']))
    {
      $cname = strip($_POST['cname']);
        $oid = clean($_POST['oid']);
          $realm = clean($_POST['realm']);
            $id = clean($_POST['id']);
              
      if(!empty($id))
      {
        $sql = $db->query("UPDATE $db_data.store_categories SET cname='$cname', oid='$oid', realm='$realm' WHERE id='$id'");
          header("Location: ?page=manage_categories");
      }
      else
      {
        header("Location: ?page=manage_categories");
      }
    }
  }
}

class store_items
{
  public $get = array();
  public $nid;
  
  function store_items()
  {
    global $db, $db_data;
    
    $sql = $db->query("SELECT sid, name, display, item, ctype, cost, amount, parent_category FROM $db_data.store_items ORDER BY parent_category, sid");
      while($get = $db->get($sql))
      {
        $ctype = $get['ctype'];
          $sid = $get['sid'];
            $parent = $get['parent_category'];
        
        $this->get[$sid] = $get;
        
        if($ctype == 1)
        {
          $this->get[$sid]['ctype'] = "Vote";
        }
        else
        {
          $this->get[$sid]['ctype'] = "V.I.P";
        }
      }
      
    $sqli = $db->query("SELECT sid FROM $db_data.store_items ORDER BY sid DESC LIMIT 1");
      $geti = $db->get($sqli);
      
    $this->nid = $geti['sid']+1;
  }
}

class store_ict
{
  public $get = array();
  
  function store_ict()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && $_GET['page'] == "manage_items_edit")
    {
      $cid = clean($_GET['id']);
      
      $sql = $db->query("SELECT sid, parent_category FROM $db_data.store_items WHERE sid='$cid'");
        $get = $db->get($sql);
          $oid = $get['parent_category'];
        
      $sql1 = $db->query("SELECT `store_categories`.`id` as cid, `store_categories`.`cname`, `store_categories`.`realm`, `realms`.`id`, `realms`.`rname` FROM `$db_data`.`store_categories`, `$db_data`.`realms` WHERE `store_categories`.`realm`=`realms`.`id` ORDER BY `store_categories`.`id`='$oid' DESC");
        while($get1 = $db->get($sql1))
        {
          $this->get[] = $get1;
        }
    }
    else
    {
      $sql = $db->query("SELECT `store_categories`.`id` as cid, `store_categories`.`cname`, `store_categories`.`realm`, `realms`.`id`, `realms`.`rname` FROM `$db_data`.`store_categories`, `$db_data`.`realms` WHERE `store_categories`.`realm`=`realms`.`id` ORDER BY `realms`.`id`, `store_categories`.`id`");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
  }
}

function store_item_action()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "manage_items")
  {
    $action = clean($_GET['action']);
      $id = clean($_GET['id']);
    
    if(!empty($id) && !empty($action))
    {
      if($action == "delete")
      {
        $sql = $db->query("DELETE FROM $db_data.store_items WHERE sid='$id'");
          $sql1 = $db->query("DELETE FROM $db_data.cart WHERE item='$id'");
            header("Location: ?page=manage_items");
      }
    }
    else
    {
      header("Location: ?page=manage_items");
    }
  }
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_items")
  {
    $name = strip($_POST['name']);
      $display = clean($_POST['display']);
        $amount = clean($_POST['amount']);
          $item = strip($_POST['item']);
            $type = clean($_POST['type']);
              $cost = clean($_POST['cost']);
                $parent = clean($_POST['parent']);
                
    if($cost == "")
    {
      $cost = 0;
    }
          
    $sql = $db->query("INSERT INTO $db_data.store_items (name, display, amount, item, ctype, cost, parent_category) VALUES ('$name', '$display', '$amount', '$item', '$type', '$cost', '$parent')");
      header("Location: ?page=manage_items");
  }
}

class si_edit
{
  public $get = array();
    public $ctype;
  
  function si_edit()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && $_GET['page'] == "manage_items_edit")
    {
      $id = clean($_GET['id']);
    
      $sql = $db->query("SELECT sid, name, display, amount, item, ctype, cost, parent_category FROM $db_data.store_items WHERE sid='$id'");
        while($get = $db->get($sql))
        {
          if($get['ctype'] == 1)
          {
            $this->ctype = array(
            "0" => array("cid" => "Vote", "ci1" => 1,),
            "1" => array("cid" => "V.I.P", "ci1" => 2,),
            );
          }
          else
          {
            $this->ctype = array(
            "0" => array("cid" => "V.I.P", "ci1" => 2,),
            "1" => array("cid" => "Vote", "ci1" => 1,),
            );
          }
     
          $this->get[] = $get;
        }
    }
  }
}

function item_update()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_items_edit")
  {
    if(isset($_POST['update']))
    {
      $id = clean($_POST['id']);
        $name = strip($_POST['name']);
          $display = clean($_POST['display']);
            $amount = clean($_POST['amount']);
              $item = strip($_POST['item']);
                $type = clean($_POST['type']);
                  $cost = clean($_POST['cost']);
                    $parent = clean($_POST['parent']);
                    
      if($cost == "")
      {
        $cost = 0;
      }
              
      if(!empty($id))
      {
        $sql = $db->query("UPDATE $db_data.store_items SET name='$name', display='$display', amount='$amount', item='$item', ctype='$type', cost='$cost', parent_category='$parent' WHERE sid='$id'");
          header("Location: ?page=manage_items");
      }
      else
      {
        header("Location: ?page=manage_items");
      }
    }
  }
}

class realm_access
{
  public $get = array();
  
  function realm_access()
  {
    global $db, $db_acc;
    
    $sql = $db->query("SELECT id, gmlevel, RealmID FROM $db_acc.account_access ORDER BY id");
      while($get = $db->get($sql))
      {
        $id = $get['id'];
          $glevel = $get['gmlevel'];
            $this->get[$id] = $get;
          
        if($glevel >= 3)
        {
          $this->get[$id]['gmlevel'] = "Administrator";
        }
        else if($glevel == 2)
        {
          $this->get[$id]['gmlevel'] = "Game Master";
        }
        else if($glevel == 1)
        {
          $this->get[$id]['gmlevel'] = "Moderator";
        }
        else
        {
          $this->get[$id]['gmlevel'] = "Player";
        }
      }
  }
}

class access_list
{
  public $alist = array();
  
  function access_list()
  {
    $this->alist = array(
    "0" => array("alist" => "Moderator", "al1" => 1,),
    "1" => array("alist" => "Game Master", "al1" => 2,),
    "2" => array("alist" => "Administrator", "al1" => 3,),
    );
  }
}

function access_action()
{
  global $db, $db_acc;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_access")
  {
    if(isset($_POST['delete']))
    {
      $acid = clean($_POST['acid']);
      
      $sql = $db->query("DELETE FROM $db_acc.account_access WHERE id='$acid'");
        header("Location: ./?page=manage_access");
    }
    else if(isset($_POST['save']))
    {
      $acid = clean($_POST['acid']);
        $glevel = clean($_POST['glevel']);
        
      $sql = $db->query("INSERT INTO $db_acc.account_access (id, gmlevel, RealmID) VALUES ('$acid', '$glevel', '-1')");
        header("Location: ./?page=manage_access");
    }
    else
    {
      return"";
    }
  }
}

function realm_update()
{
  global $db, $db_data;
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_realms")
  {
    $rname = strip($_POST['rname']);
      $type = strip($_POST['type']);
        $oid = clean($_POST['oid']);
          $cdb = strip($_POST['cdb']);
            $port = clean($_POST['port']);
              $ra = clean($_POST['ra']);
    
    $sql = $db->query("INSERT INTO $db_data.realms (rname, type, oid, char_db, port, ra_port) VALUES ('$rname', '$type', '$oid', '$cdb', '$port', '$ra')");
      header("Location: ./?page=manage_realms");
  }
  
  if(isset($_GET['page']) && isset($_POST['save']) && $_GET['page'] == "manage_realms_edit")
  {
    $rname = strip($_POST['rname']);
      $type = strip($_POST['type']);
        $oid = clean($_POST['oid']);
          $cdb = strip($_POST['cdb']);
            $port = clean($_POST['port']);
              $ra = clean($_POST['ra']);
                $id = clean($_POST['id']);
    
    $sql = $db->query("UPDATE $db_data.realms SET rname='$rname', type='$type', oid='$oid', char_db='$cdb', port='$port', ra_port='$ra' WHERE id='$id'");
      header("Location: ./?page=manage_realms");
  }
  
  if(isset($_GET['page']) && isset($_GET['action']) && $_GET['page'] == "manage_realms" && $_GET['action'] == "delete")
  {
    $id = clean($_GET['id']);
      $sql = $db->query("DELETE FROM $db_data.realms WHERE id='$id'");
        header("Location: ./?page=manage_realms");
  }
}

class realms_edit
{
  public $get = array();
  
  function realms_edit()
  {
    global $db, $db_data;
    
    if(isset($_GET['page']) && $_GET['page'] == "manage_realms_edit")
    {
      $id = clean($_GET['id']);
      $sql = $db->query("SELECT id, rname, type, oid, char_db, port, ra_port FROM $db_data.realms WHERE id='$id'");
        while($get = $db->get($sql))
        {
          $this->get[] = $get;
        }
    }
  }
}

function character_update()
{
  global $db_data, $db;
  
  if(isset($_GET['page']) && $_GET['page'] == "manage_characters_edit")
  {
    if(isset($_POST['save']))
    {
      $id = clean($_GET['id']);
        $rlm = strip($_GET['realm']);
      
      $sql1 = $db->query("SELECT id, rname, char_db FROM $db_data.realms WHERE id='$rlm'");
        $get1 = $db->get($sql1);
          $cdb = $get1['char_db'];
          
      $account = clean($_POST['account']);
        $name = clean($_POST['name']);
          $race = clean($_POST['race']);
            $class = clean($_POST['class']);
              $gender = npm(clean($_POST['gender']));
                $level = clean($_POST['level']);
                
      $sql = $db->query("UPDATE $cdb.characters SET account='$account', name='$name', race='$race', class='$class', gender='$gender', level='$level' WHERE guid='$id'");
        header("Location: ./?page=manage_characters_edit&id={$id}&realm={$rlm}");
    }
  }
}
?>
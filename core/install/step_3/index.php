<?php if(!defined('ACMS')){ header("Location: ../../../"); }
  class step_3
  {
    public $sid;
    
    function step_3()
    {
      global $db;
    
      if(isset($_POST['save3']))
      {
        $pthost = $_POST['pthost'];
          $mshost = $_POST['mshost'];
        
        $msuser = $_POST['msuser'];
          $mspass = $_POST['mspass'];
        
        $cmsdb = $_POST['cmsdb'];
          $accdb = $_POST['accdb'];
          
        $rahost = $_POST['rahost'];
          $rauser = $_POST['rauser'];
            $rapass = $_POST['rapass'];
            
        $pemail = $_POST['pemail'];
          $pcur = $_POST['pcur'];
          
        $rname = $_POST['rname'];
          $rtype = $_POST['rtype'];
            $rcdb = $_POST['rcdb'];
              $rport = $_POST['rport'];
                $raport = $_POST['raport'];
        
        $connect = new mysqli($mshost, $msuser, $mspass);
        
        //
        $config_file = "./core/config/config.php";
          $copen = fopen($config_file, 'w');
  
$config = '<?php
if(!defined(\'ACMS\')){ header("Location: ../../"); }

//- Site Settings
  $debug = 0; #- Debug Mode Enabled? (0 = No | 1 = Yes)

//- Database Connection Info
  $port_host = "'.$pthost.'"; #- Domain without http:// or IP Address
  $db_host = "'.$mshost.'"; #- Database Host
  $db_user = "'.$msuser.'"; #- Database User
  $db_pass = "'.$mspass.'"; #- Database Pass
  $db_data = "'.$cmsdb.'"; #- Database DB
  $db_acc = "'.$accdb.'"; #- Account Database
  
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
  $palmail = "'.$pemail.'";
  $palurl = $palurl[1]; // 1 = Paypal, 2 = SandBox
  $palcur = $palcur['.$pcur.']; // 1 = USD, 2 = EURO, 3 = Other
  
//- RA/Telnet Settings - Manual Edit
  $ra_host = "'.$rahost.'"; #- World Server Host
  $ra_user = "'.$rauser.'"; #- Account Username (Access = 4)
  $ra_pass = "'.$rapass.'"; #- Account Password (Access = 4)
?>';

        fwrite($copen, $config);
          fclose($copen);
        //
        $sql13 = $connect->query("UPDATE $accdb.account SET rank='0', isactive='1'");
        
        $sqli = $connect->query("SELECT id, username, staff_id FROM $accdb.account WHERE username='$rauser'");
        
        $sqlie = $connect->prepare("SELECT id, username, staff_id FROM $accdb.account WHERE username='$rauser'");
          $sqlie->execute();
          $sqlie->store_result();
          $numi = $sqlie->num_rows();
            $get = $sqli->fetch_assoc();
              $id = $get['id'];
                $sid = $get['staff_id'];
      
        if($numi == 1)
        {
          $sid = rand(10000, 90000);
            $this->sid = $sid;
            
          $sql = $connect->query("INSERT INTO $accdb.account_access (id, gmlevel, RealmID) VALUES ('$id', '4', '-1') ");
            $sql12 = $connect->query("UPDATE $accdb.account SET rank='2', staff_id='$sid' WHERE id='$id'");
        }
        else
        {
          $sid = rand(10000, 90000);
            $this->sid = $sid;
              $sha1 = encrypt($rauser, $rapass);
        
          $sql2 = $connect->query("INSERT INTO $accdb.account (username, sha_pass_hash, rank, staff_id, isactive) VALUES ('$rauser', '$sha1', '2', '$sid', '1')");
            $sqll = $connect->query("SELECT id, username FROM $accdb.account WHERE username='$rauser'");
              $getl = $sqll->fetch_assoc();
                $id1 = $getl['id'];
            
          $sql1 = $connect->query("INSERT INTO $accdb.account_access (id, gmlevel, RealmID) VALUES ('$id1', '4', '-1') ");
        }
    
        $rsql = $connect->query("INSERT INTO $cmsdb.realms (rname, type, oid, char_db, port, ra_port) VALUES ('$rname', '$rtype', '1', '$rcdb', '$rport', '$raport')");
      }
    }
  }
  
  $step_3 = new step_3;
  
  $step_3 = array(
  "staff_id" => $step_3->sid,
  );
  
  return $step_3;
?>
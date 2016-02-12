<?php if(!defined('ACMS')){ header("Location: ../../../"); }
  class step_2
  {
    public $host1;
    public $host2;
    public $msuser;
    public $mspass;
    public $db1;
    public $db2;
    
    function step_2()
    {
      global $db;
    
      if(isset($_POST['save2']))
      {
        $pthost = $_POST['pthost'];
          $mshost = $_POST['mshost'];
        
        $msuser = $_POST['msuser'];
          $mspass = $_POST['mspass'];
        
        $cmsdb = $_POST['cmsdb'];
          $accdb = $_POST['accdb'];
        
        $this->host1 = $pthost;
        $this->host2 = $mshost;
        $this->msuser = $msuser;
        $this->mspass = $mspass;
        $this->db1 = $cmsdb;
        $this->db2 = $accdb;
        
        $global_title = $_POST['global_title'];
        $email_act = $_POST['email_act'];
        $login = $_POST['login'];
        $cright = $_POST['cright'];
        $realm = $_POST['realm'];
        $semail = $_POST['semail'];
        $domain = $_POST['domain'];
        $stitle = $_POST['stitle'];
        $expansion = $_POST['expansion'];
        
        $connect = new mysqli($this->host2, $this->msuser, $this->mspass);
        
        $connect->query("INSERT INTO $cmsdb.global (global_title, email_activation, login, copyright, realmlist, server_email, domain, server_title, expansion) VALUES ('$global_title', '$email_act', '$login', '$cright', '$realm', '$semail', '$domain', '$stitle', '$expansion')");
      }
    }
  }
  
  $step_2 = new step_2;
  
  $step_2 = array(
  "host1" => $step_2->host1,
  "host2" => $step_2->host2,
  "msuser" => $step_2->msuser,
  "mspass" => $step_2->mspass,
  "db1" => $step_2->db1,
  "db2" => $step_2->db2,
  );
  
  return $step_2;
?>
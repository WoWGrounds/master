<?php if(!defined('ACMS')){ header("Location: ../../"); }

#- Email Verification & Activation
  $global_settings = $db->query("SELECT global_title, email_activation, login, copyright, realmlist, server_email, domain, server_title, expansion FROM $db_data.global");
    while($settings = $db->get($global_settings))
    {
      $email_validation = $settings['email_activation']; #- Email Validation Required? (Auto)
        $slsys = $settings['login']; #- Login Enabled? (Auto)
          $title = $settings['global_title']; #- Site Title
            $copyright = $settings['copyright'];
              $realmlist = $settings['realmlist'];
                $server_email = $settings['server_email']; #- Address to send emails from
                  $domain = $settings['domain']; #- Omit http & ending /
                                                 #- Example: Azer-cms.info
                   $server_title = $settings['server_title']; #- Server Name for emails sent.
                     $expansion = $settings['expansion']; #- Cata Or Wotlk?
    }
    
  if($slsys == 0)
  {
    if(isset($_COOKIE["login"]))
    {
      header("Location: ./?page=logout");
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us" xml:lang="en-us">
  <head>
    <!--
    Html By Azer, Copyright 2012 Azer CMS. All Rights Reserved.
    Style Version: ACMS V3.0
    -->
    <title>{title}</title>
    <link rel="shortcut icon" href="./styles/login/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./styles/{style}/css/style.css" />
    <script type="text/javascript" src="./styles/global/js/jquery.js"></script>
    <script type="text/javascript" src="./styles/global/js/jquery.min.js"></script>
    <script type="text/javascript" src="../styles/global/js/interface.js"></script>
  </head>
  
  <body>
    <div class="head">
      <div class="hsp">
        <a href="./" border="none"><div class="logo"></div></a>
      </div>
      
      <div class="panel">
        <div class="psp">
          Welcome, {session}<br/>
          SID: {staff_id}<br/>
          [<a href="./?page=logout">Logout</a>]
        </div>
        
        <div class="avatar">
        
        </div>
      </div>
    </div>
    
    <div class="menu">
      <ul>
        <li><a href="./">Home</a></li>
        <li>
          <a href="#">Site</a>
          <ul>
            <li>
              <span class="sml" OnClick="location.href='./?page=manage_news'">News</span>
              <span class="sml" OnClick="location.href='./?page=manage_styles'">Styles</span>
              <span class="sml" OnClick="location.href='./?page=manage_styles_acp'">Styles<span style="font-size:8px;">(ACP)</span></span>
              <span class="sml" OnClick="location.href='./?page=manage_clog'">Server Info</span>
              <span class="sml" OnClick="location.href='./?page=manage_shoutbox'">ShoutBox</span>
              <span class="sml" OnClick="location.href='./?page=manage_sites'">Vote Sites</span>
              <span class="sml" OnClick="location.href='./?page=purge&action=1'">Purge Messages</span>
              <span class="sml" OnClick="location.href='./?page=properties'">Global Settings</span>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Store</a>
          <ul>
            <li>
              <span class="sml" OnClick="location.href='./?page=manage_items'">Manage Items</span>
              <span class="sml" OnClick="location.href='./?page=manage_categories'">Manage Categories</span>
            </li>
          </ul>
        </li>
        
        <li id="lhm" OnClick="location.href='../'"></li>
        
        <li style="margin-left:100px;">
          <a href="#">Server</a>
          <ul>
            <li>
              <span class="sml" OnClick="location.href='./?page=manage_accounts'">Accounts</span>
              <span class="sml" OnClick="location.href='./?page=manage_access'">Account Access</span>
              <span class="sml" OnClick="location.href='./?page=manage_characters'">Characters</span>
              <span class="sml" OnClick="location.href='./?page=manage_realms'">Realms</span>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Logs</a>
          <ul>
            <li>
              <span class="sml" OnClick="location.href='./?page=login'">Login</span>
              <span class="sml" OnClick="location.href='./?page=vote_log'">Vote</span>
              <span class="sml" OnClick="location.href='./?page=vip_log'">V.I.P</span>
              <span class="sml" OnClick="location.href='./?page=store_log'">Store</span>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Information</a>
          <ul>
            <li>
              <span class="sml" OnClick="location.href='./?page=about'">About</span>
              <span class="sml" OnClick="location.href='./?page=paypal'">Paypal</span>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    
    <div class="sub-menu">
    </div>
    
    <div class="wrapper">
      {page_system}
      
      <div class="cbs">
        <div style="text-align:center;">
          &copy; Copyright 2012 Azer CMS.<br/>
          All Rights Reserved.
        </div>
      </div>
    </div>
  </body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us" xml:lang="en-us">
  <head>
    <!--
    Html By Azer, Copyright 2012 Azer CMS. All Rights Reserved.
    Style Version: ACMS V3.0
    -->
    <title>{title}</title>
    <link rel="shortcut icon" href="./styles/login/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./styles/login/css/style.css" />
  </head>
  
  <body>
    <div class="logo">Azer CMS<span style="font-size:10px;">ACP V3.0</span></div>
    
    <div class="body">
      <table align="center" id="tl">
        <tr>
          <td>
            <table align="center">
              <form action="" method="post">
              <tr><td>Username:</td> <td><input type="text" name="username" id="login" AUTOCOMPLETE="off"></td></tr>
              <tr><td>Password:</td> <td><input type="password" name="password" id="login"></td></tr>
              <tr><td>Staff-Id:</td> <td><input type="password" name="sid" id="login"></td></tr>
            </table>
          </td>
          <td>
            <input type="submit" name="login" id="log" value="Login"></td></tr>
          </form>
      </table>

    <div class="info">
      <table width="100%" id="ci">
        <tr>
          <td align="left">Ip Address: <b>{ip}</b></td>
          <td align="right">Core: <input type="submit" value="Azer CMS" id="acms" OnClick="location.href='http://azer-cms.com'"></td>
        </tr>
      </table>
    </div>
    <div style="font-size:11px; margin:5px auto;">{acp_login}</div>
  </body>
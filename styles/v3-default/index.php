<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us" xml:lang="en-us">
  <head>
    <!--
    Html By Azer, Copyright 2012 Azer CMS. All Rights Reserved.
    Style Version: ACMS V3.0
    -->
    <title>{title}</title>
    <link rel="shortcut icon" href="./styles/{style}/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./styles/{style}/css/style.css" />
    <script type="text/javascript" src="./styles/global/js/store.js"></script>
    <script type="text/javascript" src="./styles/global/js/jquery.js"></script>
    <script type="text/javascript" src="./styles/global/js/jquery.min.js"></script>
    <script type="text/javascript" src="./styles/global/js/link.js"></script>
    <script type="text/javascript" src="./styles/global/js/jquery.dhslider.js"></script>
    <script type="text/javascript" src="./styles/global/js/interface.js"></script>
    {wowhead}
    {module.shoutbox.js}<!-- [END ShoutBox JS Include] {/module.shoutbox.js} [Important Don't Remove] -->
    <script type="text/javascript">
            $(document).ready(function () {
                $(".slide-body").DHslider({
                    speed: 1000,
                    auto: {
                        speed: 5000,
                        active: true
                    },
		    controls: {
			active: true,
			action: {
			    type: "fade",
			    speed: 1000,
			    fixed: true
			},
			numbers: true,
			callback: function () {}
		    },
                });
            });
    </script>
  </head>
  
  <div class="top-bar"></div>
  
  <div class="wrapper">
    <div class="info-bar">
      {login=Welcome, {session}.-}Welcome, Guest. Please <a href="?page=login">Login</a>.{/login}
    </div>
    
    <div class="menu">
      <ul>
        <li><a href="./" id="home"><div class="menu-space">Home</div></a></li>
        {login=
        <li><a href="?page=account"><div class="menu-space">Account</div></a></li>
        -}
        <li><a href="?page=register"><div class="menu-space">Register</div></a></li>
        {/login}
        <li><a href="?page=connect"><div class="menu-space">Connect</div></a></li>
        <li><a href="?page=forums"><div class="menu-space">Forums</div></a></li>
        {login=
        <li><a href="?page=vote"><div class="menu-space">Vote</div></a></li>
        <li><a href="?page=donate"><div class="menu-space">Donate</div></a></li>
        -}{/login}
        <!--<li><a href="?page=changelog"><div class="menu-space">ChangeLog</div></a></li>-->
        {login=
        <li><a href="?page=store_select"><div class="menu-space">Store</div></a></li>
        <li><a href="?page=logout"><div class="menu-space">Logout</div></a></li>
        -}
        <li><a href="?page=changelog"><div class="menu-space">ChangeLog</div></a></li>
        <li><a href="?page=login"><div class="menu-space">Login</div></a></li>
        {/login}
      </ul>
    </div>
    
    <div class="body">
      <div class="wrap">
        <div class="wrap-row">
          <!-- Body Left Side -->
            <div class="wleft">
              <div class="left-wrapper">
                <div class="slide-body">
                  <!---->
                  <div class="elements">
                    <a href="?page=vote"><img src="./styles/{style}/images/slides/slide-1.png" alt="" border="0" /></a>
                    <a href="#"><img src="./styles/{style}/images/slides/slide-1.png" alt="" border="0" /></a>
                    <a href="?page=donate"><img src="./styles/{style}/images/slides/slide-1.png" alt="" border="0" /></a>
                  </div>
                  
                  <div class="captions">
                    <div>Vote every 12 hours, to help increase server population, & earn epic rewards!</div>
                    <div><strong>{server_title}</strong> is always recruiting, stop by the forums for information on how to apply!</div>
                    <div>Donate today to help support the server, by helping with monthly cost(s) envolved with the server.</div>
                  </div> 
                </div>
              <!-- End Slider -->
                
              {page_system}
              
              </div>
            </div>
          <!-- -->
          <!-- Body Right Side -->
            <div class="wright">
              <div class="side_title">
                <div class="st-space">
                  {login=
                    User's Information
                  -}
                    Member's Login
                  {/login}
                </div>
              </div>
              <div class="right-space">
                {login=
                  {user_data}
                    Username: <b>{session}</b><br/>
                    Email: {email}<br/>
                    Join Date: {joindate}<br/>
                    Site Rank: {user_rank}<br/>
                    Current Ip: {ip}<br/>
                    Last Ip: {last_ip}<br/>
                    Expansion: {expansion}<br/>
                    Vote Points: {vp}<br/>
                    V.I.P Points: {dp}<br/>
                    Banned: {user_banned}<br/>
                  {/user_data}
                <br/>
                <center>[<a href="?page=account#msg">Message Center</a>] [<a href="?page=new_message#top">New Message</a>]</center>
                -}
                  <div class="login-table">
                  <form action="?page=login#top" method="post">
                    <div class="login-row">
                      <div class="login-cl">
                        <table class="cover">
                          <tr>
                            <td><div class="cover-u"></div></td> <td><input type="text" name="username" class="login-h" AutoComplete="off" value="Username" onfocus='if (this.value == "Username") this.value = "";' onblur='if (!this.value){ this.value = "Username"; }'></td>
                          </tr>
                            
                          <tr>
                            <td id="cvr"><div class="cover-p"></div></td> <td id="cvr"><input type="password" name="password" class="login-h" AutoComplete="off" value="Password" onfocus='if (this.value == "Password") this.value = "";' onblur='if (!this.value){ this.value = "Password"; }'></td>
                          </tr>
                        </table>
                      </div>
                      
                      <div class="login-cr">
                        <input type="submit" name="login" value="" class="login-button">
                      </div>
                    </form>
                    </div>
                  </div>
                {/login}
              </div>
              
              <div class="side_title">
                <div class="st-space">
                  Realm Status
                </div>
              </div>
              <div class="right-space">
                {realms}
                <div id="desc" title="{type}">
                <a href="?page=realm&id={id}"><b>{rname}</b></a> - {online.{char_db}}<br/>
                Alliance: {aly.{char_db}}<br/>
                Horde: {horde.{char_db}}<br/>
                Total Online: {total_online.{char_db}}<br/>
                {db_error.{char_db}}
                </div>
                  <div class="realm-divide"></div>
                {/realms}
              </div>
              
              <div class="side_title" id="sbox">
                <div class="st-space">
                  ShoutBox
                </div>
              </div>
              <div class="right-space" id="shout">
                <form action="#sbox" method="post" class="sub-form" name="sbox" id="sbox">
                <textarea name="sbody" class="shout-back" id="form"></textarea>
                <input type="submit" name="shout-post" value="Shout" class="msub"><input type="button" name="options" value="Options" class="msub" onclick="return toggleMe('options')"> {module.shoutbox.post_shout}<!--[END ShoutBox Post Function] {/module.shoutbox.post_shout} [Important Don't Remove]--><br/>
                <div id="options" style="display:none">
                  <input type="button" value="Bold" onclick="formatText(sbody,'b')" class="msub"> 
                  <input type="button" value="Italic" onclick="formatText(sbody,'i')" class="msub"> 
                  <input type="button" value="Underline" onclick="formatText(sbody,'u')" class="msub"> 
                  <input type="button" value="Img" onclick="formatText(sbody,'img')" class="msub"> 
                  <input type="button" value="Url" onclick="formatText(sbody,'url')" class="msub"> 
                  <input type="button" value="Mail" onclick="formatText(sbody,'mail')" class="msub">
                  <br/><center>
                  <img src="./styles/global/images/smilies/big_smile.png"     onclick="insertSmiley(':big_smile:')" /> 
                  <img src="./styles/global/images/smilies/cool.png"     onclick="insertSmiley(':cool:')" /> 
                  <img src="./styles/global/images/smilies/hmm.png"     onclick="insertSmiley(':hmm:')" /> 
                  <img src="./styles/global/images/smilies/lol.png"     onclick="insertSmiley(':lol:')" /> 
                  <img src="./styles/global/images/smilies/mad.png"     onclick="insertSmiley(':mad:')" /> 
                  <img src="./styles/global/images/smilies/neutral.png"     onclick="insertSmiley(':neutral:')" /> 
                  <img src="./styles/global/images/smilies/roll.png"     onclick="insertSmiley(':roll:')" /> 
                  <img src="./styles/global/images/smilies/sad.png"     onclick="insertSmiley(':sad:')" /> 
                  <img src="./styles/global/images/smilies/smile.png"     onclick="insertSmiley(':smile:')" /> 
                  <img src="./styles/global/images/smilies/tongue.png"     onclick="insertSmiley(':tongue:')" /> 
                  <img src="./styles/global/images/smilies/wink.png"     onclick="insertSmiley(':wink:')" /> 
                  <img src="./styles/global/images/smilies/yikes.png"     onclick="insertSmiley(':yikes:')" />
                  </form></center>
                </div>
                <div id="shout-body">
                  <!-- Shoutbox {module.shoutbox.data} -->
                    <div class="shout-back">
                      {date} By <a href="?page=new_message&action=member&user={author}">{author}</a>:<br/>
                      {body}<br/>
                    </div>
                  <!-- {/module.shoutbox.data} -->
                  <div class="shout-back">
                    <center><a href="?p={module.shoutbox.prev}#shout">Previous</a> - <a href="?p={module.shoutbox.next}#shout">Next</a></center>
                  </div>
                </div>
              </div>
            </div>
          <!-- -->
        </div>
      </div>
    </div>
    
    <div class="foot">
      <div class="foot-space">
        <a href="http://azer-cms.com">Core</a> | <a href="http://azer-cms.com/?page=topic&id=13&t=157#">Website Design</a> | <a href="?page=terms">Terms</a><br/>
          &copy; Copyright {copy_date} {copyright}.<br/>
            All Rights Reserved.
      </div>
    </div>
  </div>
</body>
</html>
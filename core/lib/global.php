<?php
if(!defined('ACMS')){ header("Location: ../../"); }

//- IP
  $ip = $_SERVER['REMOTE_ADDR'];

//Cleaning & Encryption Functions
function clean($value)
{
  $_CLEAN = preg_replace("/[^A-Za-z0-9]/", "", $value);
  
  if(empty($_CLEAN))
  {
    return FALSE;
  }
  else
  {
    return $_CLEAN;
  }
}

function page($value)
{
  $_CLEAN = preg_replace("/[^A-Za-z0-9_]/", "", $value);
  
  if(empty($_CLEAN))
  {
    return FALSE;
  }
  else
  {
    return $_CLEAN;
  }
}

function strip($value)
{
  global $connect;
  
  $value = $connect->real_escape_string(stripslashes(htmlentities($value)));
    return $value;
}

function encrypt($username, $password)
{
  $password = sha1(strtoupper($username) . ":" . strtoupper($password));
    $password = strtoupper($password);
      return $password;
}

#- Logged In ? -#
function logged($val)
{
  global $login;
  
  //Before Clean
  $before = array('/\{login\=(.*?)\-}(.*?)\{\/login\}/is', );
  
  if($login)
  {
    //After Clean       
    $after = array('$1',);
  }
  else
  {
    //After Clean       
    $after = array('$2',);
  }
  //Clean it
  $val = preg_replace ($before, $after, $val);
  return $val;
}

#- Logged In(ACP) ? -#
function acp($val1)
{
  global $admin;
  
  //Before Clean
  $before = array('/\{admin\=(.*?)\-}(.*?)\{\/admin\}/is', );
  
  if($admin)
  {
    //After Clean       
    $after = array('$1',);
  }
  else
  {
    //After Clean       
    $after = array('$2',);
  }
  //Clean it
  $val1 = preg_replace ($before, $after, $val1);
  return $val1;
}

function bbcode ($str) {
    //$str = htmlentities($str);

    $token = array(
                "'\[b\](.*?)\[/b\]'is",                                  
                '/\[i\](.*?)\[\/i\]/is',                                
                '/\[u\](.*?)\[\/u\]/is',                                
                '/\[url\=(.*?)\](.*?)\[\/url\]/is',                         
                '/\[url\](.*?)\[\/url\]/is',    
                '/\[img\](.*?)\[\/img\]/is',                            
                '/\[mail\=(.*?)\](.*?)\[\/mail\]/is',                    
                '/\[mail\](.*?)\[\/mail\]/is',                            
                '/\[font\=(.*?)\](.*?)\[\/font\]/is',                    
                '/\[size\=(.*?)\](.*?)\[\/size\]/is',                    
                '/\[color\=(.*?)\](.*?)\[\/color\]/is',   
                "':big_smile:'is",  
                "':cool:'is", 
                "':hmm:'is",
                "':lol:'is",  
                "':mad:'is",
                "':neutral:'is",
                "':roll:'is",
                "':sad:'is",
                "':smile:'is",
                "':tongue:'is",
                "':wink:'is",
                "':yikes:'is", 
                "':bull:'is", 
                '/\[item\=(.*?)\](.*?)\[\/item\]/is', 
                '/\[spell\=(.*?)\](.*?)\[\/spell\]/is', 
                "':warrior:'is",
                "':paladin:'is",
                "':hunter:'is",
                "':rogue:'is",
                "':priest:'is",
                "':dk:'is",
                "':shaman:'is",
                "':mage:'is",
                "':warlock:'is",
                "':druid:'is",
                "'\[ul\](.*?)\[/ul\]'is",
                "'\[ol\](.*?)\[/ol\]'is",
                "'\[li\](.*?)\[/li\]'is",
                );

    $tokenized = array(
                '<strong>$1</strong>',
                '<em>$1</em>',
                '<u>$1</u>',
				        '<a href="http://$1" target="BLANK">$2</a>',
				        '<a href="http://$1" target="BLANK">$1</a>',
                '<a href="$1" target="_blank"><img src="$1" width="125" border="1px solid #200000" title="Click For Bigger Image"/></a>',
                '<a href="mailto:$1">$2</a>',
                '<a href="mailto:$1">$1</a>',
                '<span style="font-family: $1;">$2</span>',
                '<span style="font-size: $1px;">$2</span>',
                '<span style="color: #$1;">$2</span>',
                '<img src="./styles/global/images/smilies/big_smile.png" border="">',
                '<img src="./styles/global/images/smilies/cool.png" border="">',
                '<img src="./styles/global/images/smilies/hmm.png" border="">',
                '<img src="./styles/global/images/smilies/lol.png" border="">',
                '<img src="./styles/global/images/smilies/mad.png" border="">',
                '<img src="./styles/global/images/smilies/neutral.png" border="">',
                '<img src="./styles/global/images/smilies/roll.png" border="">',
                '<img src="./styles/global/images/smilies/sad.png" border="">',
                '<img src="./styles/global/images/smilies/smile.png" border="">',
                '<img src="./styles/global/images/smilies/tongue.png" border="">',
                '<img src="./styles/global/images/smilies/wink.png" border="">',
                '<img src="./styles/global/images/smilies/yikes.png" border="">',
                '&bull;',
                '<a href="http://www.wowhead.com/item=$1" rel="item=$1">$2</a>',
                '<a href="http://www.wowhead.com/spell=$1" rel="spell=$1">$2</a>',
                '<span style="color:#C79C6E;">Warrior</span>',
                '<span style="color:#F58CBA;">Paladin</span>',
                '<span style="color:#ABD473;">Hunter</span>',
                '<span style="color:#FFF569;">Rogue</span>',
                '<span style="color:#ffffff;">Priest</span>',
                '<span style="color:#C41F3B;">Death Knight</span>',
                '<span style="color:#0070DE;">Shaman</span>',
                '<span style="color:#69CCF0;">Mage</span>',
                '<span style="color:#9482C9;">Warlock</span>',
                '<span style="color:#FF7D0A;">Druid</span>',
                '<ul>$1</ul>',
                '<ol>$1</ol>',
                '<li>$1</li>',
                );

    // Do simple BBCode's
    $str = preg_replace ($token, $tokenized, $str);
      return $str;
}

//Valid Email?
function valid_email($link)
{
  if($link != "")
  {
    $email = explode("@", $link);
    if(checkdnsrr($email[1], "MX"))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
}

//Random String
function rs($length)
{
  $str = "";
    $chars = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ123456789";
      $size = strlen( $chars );
                  
  if($length != 0)
  {
    $num = $length;
  }
  else
  {
    $num = 1;
  }
  
  for( $i = 0; $i < $num; $i++ )
  {
    $str .= $chars[ rand( 0, $size - 1 ) ];
  }
  
  return $str;
}

function smsg($from, $to, $title, $body)
{
  global $db, $db_data;
  
  //- Set Date
    date_default_timezone_set('US/Pacific');
      $date = date("l F d, Y @ g:i A");
    
  $msg_sql = $db->query("INSERT INTO $db_data.messages (title, body, sender, user, date, unread, inbox_copy, outbox_copy) VALUES ('$title', '$body', '$from', '$to', '$date', '1', '1', '1')");
}

function npm($value)
{
  if($value == FALSE)
  {
    return "0";
  }
  else
  {
    return "$value";
  }
}
?>
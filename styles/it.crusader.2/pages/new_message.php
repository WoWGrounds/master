<div class="body-title">{login=Private Messages-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
  <div class="box">
    <div class="title">{login=<span>New</span> Message-}Caution - <span>Connection Required</span>{/login}</div>
    <div class="body">
      {login=
      <table><form action="#top" method="post" name="msg" id="msg">
        <tr><td>To:</td> <td><input type="text" class="minput" name="to" AutoComplete="off" style="width:502px;" value="{msg_user}"></td></tr>
        <tr><td>Title:</td> <td><input type="text" class="minput" name="title" AutoComplete="off" style="width:502px;" value="{msg_title}"></td></tr>
        <tr><td style="vertical-align:top">Body:</td> <td><textarea class="minput" style="width:498px; height:125px;" name="body" id="body">{msg_body}</textarea></td></tr>
        <tr>
        <td></td>
        <td align="center">
          <input type="button" value="B" onclick="formatText(body,'b')">
          <input type="button" value="I" onclick="formatText(body,'i')">
          <input type="button" value="U" onclick="formatText(body,'u')">
          <input type="button" value="Url" onclick="formatText(body,'url')">
          <input type="button" value="IMG" onclick="formatText(body,'img')">
          <img src="./styles/global/images/smilies/big_smile.png" onclick="insertSmiley(':big_smile:')" /> 
          <img src="./styles/global/images/smilies/cool.png" onclick="insertSmiley(':cool:')" /> 
          <img src="./styles/global/images/smilies/hmm.png" onclick="insertSmiley(':hmm:')" /> 
          <img src="./styles/global/images/smilies/lol.png" onclick="insertSmiley(':lol:')" /> 
          <img src="./styles/global/images/smilies/mad.png" onclick="insertSmiley(':mad:')" /> 
          <img src="./styles/global/images/smilies/neutral.png" onclick="insertSmiley(':neutral:')" /> 
          <img src="./styles/global/images/smilies/roll.png" onclick="insertSmiley(':roll:')" /> 
          <img src="./styles/global/images/smilies/sad.png" onclick="insertSmiley(':sad:')" /> 
          <img src="./styles/global/images/smilies/smile.png" onclick="insertSmiley(':smile:')" /> 
          <img src="./styles/global/images/smilies/tongue.png" onclick="insertSmiley(':tongue:')" /> 
          <img src="./styles/global/images/smilies/wink.png" onclick="insertSmiley(':wink:')" /> 
          <img src="./styles/global/images/smilies/yikes.png" onclick="insertSmiley(':yikes:')" />
          <input type="submit" value="Send Message" class="msub" name="send_message">
        </td>
        </tr>
      </form></table>
      {compose_message}
      -}
      <p>You must be logged in to access this page</p>
      {/login}
    </div>
    <div class="bottom"></div>
  </div>
</div>
<div clsas="body-bottom"></div>
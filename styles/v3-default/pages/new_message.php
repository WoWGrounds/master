{login=
<!-- News/Page System -->
                <div class="title-bar" id="top">
                  <div class="tspace">
                    New Message &bull; <span style="font-size:11px;"><a href="?page=account#msg">Account</a> - <a href="?page=inbox">Inbox</a> - <a href="?page=outbox">Outbox</a></span>
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                    <table><form action="#top" method="post" name="msg" id="msg">
                      <tr><td>To:</td> <td><input type="text" class="minput" name="to" AutoComplete="off" style="width:502px;" value="{msg_user}"></td></tr>
                      <tr><td>Title:</td> <td><input type="text" class="minput" name="title" AutoComplete="off" style="width:502px;" value="{msg_title}"></td></tr>
                      <tr><td>Body:</td> <td><textarea class="minput" style="width:498px; height:125px;" name="body" id="body">{msg_body}</textarea></td></tr>
                      <tr>
                        <td></td>
                        <td align="center">
                          <input type="button" value="B" class="shout-bold" onclick="formatText(body,'b')">
                          <input type="button" value="I" class="shout-italic" onclick="formatText(body,'i')">
                          <input type="button" value="U" class="shout-under" onclick="formatText(body,'u')">
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
                    <br/><br/>
                  </div>
                </div>
<!-- -->
-}
{login_error}
{/login}
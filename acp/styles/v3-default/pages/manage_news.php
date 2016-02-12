      <div class="content-header">
        <div class="chs">Manage News</div>
      </div>
      
      <div class="content-body">
        <div class="cbs">
          <b>Post:</b> To add a post to the news system, fill out the form below, and click save.<br/>
          <b>Edit:</b> To edit a news post, select the post you want to edit, and click edit. Make wanted changes, and then click save.<br/>
          <b>Delete:</b> To delete a news post, select the post you want to delete, click edit, and then click delete.<br/>
          <br/>{news_edit}
          
          <form action="" method="post">
            <table class="ltlb" cellpadding="0" cellspacing="0">
              <tr id="head">
                <td align="center"><table class="nmt"  cellpadding="0" cellspacing="0"><tr><td width="30px;">Title:</td><td><textarea name="title" class="nmit" autocomplete="off">{news_data}{title}{/news_data}</textarea><input type="hidden" name="nid" value="{news_data}{id}{/news_data}"></td></tr></table></td>
              </tr>
      
              <tr id="head">
                <td align="center"><table class="nmt"  cellpadding="0" cellspacing="0"><tr><td width="30px;">Body:</td><td><textarea name="sbody" class="nmib" id="form">{news_data}{body}{/news_data}</textarea></td></tr></table></td>
              </tr>
      
              <tr>
                <td align="center">
                  <input type="button" value="Bold" onclick="formatText(sbody,'b')" class="msub"> 
                  <input type="button" value="Italic" onclick="formatText(sbody,'i')" class="msub"> 
                  <input type="button" value="Underline" onclick="formatText(sbody,'u')" class="msub"> 
                  <input type="button" value="Img" onclick="formatText(sbody,'img')" class="msub"> 
                  <input type="button" value="Url" onclick="formatText(sbody,'url')" class="msub"> 
                  <input type="button" value="Mail" onclick="formatText(sbody,'mail')" class="msub">
                  <br/>
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
                </td>
              </tr>
      
              <tr>
                <td align="center">
                  <table width="80%">
                    <tr>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a0.gif" border="none" width="64px" height="64px"><br/><input type="radio" value="a0" name="avatar" checked></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a1.gif" border="none"><br/><input type="radio" value="a1" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a2.gif" border="none"><br/><input type="radio" value="a2" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a3.gif" border="none"><br/><input type="radio" value="a3" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a4.gif" border="none"><br/><input type="radio" value="a4" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a5.gif" border="none"><br/><input type="radio" value="a5" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a6.gif" border="none"><br/><input type="radio" value="a6" name="avatar"></td>
                      <td style="border:none;"><img src="../styles/global/images/avatars/a7.gif" border="none"><br/><input type="radio" value="a7" name="avatar"></td>
                    </tr>
                  </table>
                </td>
              </tr>
      
              <tr>
                <td width="80%" align="center"><select name="id" class="nmis"><option value="0">-- Select News Post --</option>{news_list}<option value="{id}">{title} - By {author}, {date}</option>{/news_list}</select><input type="submit" name="edit" value="Edit"><input type="submit" name="delete" value="Delete"><input type="submit" name="save" value="Save"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      
      <div class="content-footer"></div>
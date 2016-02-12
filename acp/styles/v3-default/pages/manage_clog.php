      <div class="content-header">
        <div class="chs">Manage ChangeLog</div>
      </div>
      
      <div class="content-body">
        <div class="cbs">
          <b>Post:</b> To add a post to the changelog system, fill out the form below, and click save.<br/>
          <b>Edit:</b> To edit a changelog post, select the post you want to edit, and click edit. Make wanted changes, and then click save.<br/>
          <b>Delete:</b> To delete a changelog post, select the post you want to delete, click edit, and then click delete.<br/>
          <br/><!--{module.changelog.clog_edit}{/module.changelog.clog_edit}-->
          
          <form action="" method="post">
            <table class="ltlb" cellpadding="0" cellspacing="0">
              <tr id="head">
                <td align="center"><table class="nmt"  cellpadding="0" cellspacing="0"><tr><td width="30px;">Title:</td><td><textarea name="title" class="nmit" autocomplete="off">{module.changelog.clog.title}</textarea><input type="hidden" name="nid" value="{module.changelog.clog.id}"></td></tr></table></td>
              </tr>
      
              <tr id="head">
                <td align="center"><table class="nmt"  cellpadding="0" cellspacing="0"><tr><td width="30px;">Body:</td><td><textarea name="sbody" class="nmib" id="form">{module.changelog.clog.body}</textarea></td></tr></table></td>
              </tr><!--{/module.changelog.clog}-->
      
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
                <td width="80%" align="center"><select name="id" class="nmis"><option value="0">-- Select News Post --</option>{module.changelog.clog_list}<option value="{id}">{title} - By {author}, {date}</option>{/module.changelog.clog_list}</select><input type="submit" name="edit" value="Edit"><input type="submit" name="delete" value="Delete"><input type="submit" name="save" value="Save"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      
      <div class="content-footer"></div>
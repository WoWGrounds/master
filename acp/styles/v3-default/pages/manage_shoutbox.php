      <div class="content-header">
        <div class="chs">Manage Shoutbox <a href="?page=manage_shoutbox&action=truncate" style="font-size:11px;">(Truncate)</a></div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">ID</td>
                  <td width="20%">Author</td>
                  <td width="50%">Body</td>
                  <td width="10%">Date</td>
                  <td width="10%">Option</td>
                </tr>
              </table>
            </div>
          </div>
          {module.shoutbox.shouts}
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10%">{id}</td>
                  <td width="20%">{author}</td>
                  <td width="50%">{body}</td>
                  <td width="10%">{date}</td>
                  <td width="10%"><a href="?page=manage_shoutbox&action=delete&id={id}">Delete</a></td>
                  </tr>
              </table>
            </div>
          </div>
          {/module.shoutbox.shouts}<!--{module.shoutbox.truncate}-->
        </div>
      </div>
      
      <div class="content-footer"></div>
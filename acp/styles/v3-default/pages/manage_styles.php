      <div class="content-header">
        <div class="chs">Manage Styles</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">ID</td>
                  <td width="25%">Name</td>
                  <td width="30%">Path</td>
                  <td width="25%">Installed</td>
                  <td width="10%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          {style_install}
          <form action="" method="post">
          <div class="mc">
            <div style="padding-top:2px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10%">{style_id}</td>
                  <td width="25%">{style_name}</td>
                  <td width="30%">./styles/{style_name}/</td>
                  <td width="25%"><select name="install"><option value="{s1v}">--- {s1} ---</option><option value="{s2v}">--- {s2} ---</option></select></td>
                  <td width="10%"><input type="hidden" name="id" value="{style_id}"><input type="hidden" name="path" value="{style_name}"><input type="submit" name="save" value="Save" class="ltbls"></td>
                  </tr>
              </table>
            </div>
          </div>
          </form>
          {/style_install}
        </div>{style_action}
      </div>
      
      <div class="content-footer"></div>
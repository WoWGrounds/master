      <div class="content-header">
        <div class="chs">Global Settings</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl"><form action="" method="post">{properties}
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Title:</b> The global website title.</td>
                  <td width="30%"><input type="text" name="global_title" value="{global_title}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Email Activation:</b> Should registration require email activation?</td>
                  <td width="30%"><select name="email_act"><option value="{prop_data.ea}">{prop_data.email_activation}</option><option value="{prop_data.ea1}">{prop_data.email_activation1}</option></select></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Login:</b> Should the login system be enabled, or disabled?</td>
                  <td width="30%"><select name="login"><option value="{prop_data.log}">{prop_data.login}</option><option value="{prop_data.log1}">{prop_data.login1}</option></select></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Copyright:</b> Your server's name for website copyright settings.</td>
                  <td width="30%"><input type="text" name="cright" value="{copyright}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Realmlist:</b> Your server's realmlist.</td>
                  <td width="30%"><input type="text" name="realm" value="{realmlist}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Server Email:</b> Email address used to send email(s) from website to user(s).</td>
                  <td width="30%"><input type="text" name="semail" value="{server_email}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Domain:</b> Your server's domain without http://.</td>
                  <td width="30%"><input type="text" name="domain" value="{domain}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Server Title:</b> Your server's name for email topics/subjects.</td>
                  <td width="30%"><input type="text" name="stitle" value="{server_title}" class="ltbli" AutoComplete="off"></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Expansion:</b> Should user(s) be registered as Wotlk or Cataclysm?</td>
                  <td width="30%"><select name="expansion"><option value="{prop_data.ex}">{prop_data.exp}</option><option value="{prop_data.ex1}">{prop_data.exp1}</option></select></td>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="mc">
            <div style="padding:3px 0px 2px 0px;">
              <table class="tblg" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="70%"><b>Update Settings:</b> Click update, to update your website's global settings.</td>
                  <td width="30%"><input type="submit" name="update" value="Update" class="ltbls"></td>
                </tr>
              </table>
            </div>
          </div>
        {/properties}{global_update}</form></div>
      </div>
      
      <div class="content-footer"></div>
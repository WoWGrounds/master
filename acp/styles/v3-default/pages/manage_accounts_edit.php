      <div class="content-header">
        <div class="chs">Manage Accounts<span style="margin-left:725px; color:black;">[<a href="./?page=manage_accounts" style="color:black;">Account Search</a>]</span></div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="6%">ID</td>
                  <td width="10%">Username</td>
                  <td width="10%">Email</td>
                  <td width="6%">Muted</td>
                  <td width="10%">Staff ID</td>
                  <td width="11%">Active</td>
                  <td width="6%">Active</td>
                  <td width="10%">VP</td>
                  <td width="6%">DP</td>
                  <td width="10%">Rank</td>
                  <td width="15%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          {view_accounts}<form action="" method="post">
          <div class="mc">
            <div style="padding:3px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="6%"><input type="hidden" name="uid" value="{id}" class="fsa">{id}</td>
                  <td width="10%"><input type="hidden" name="username" value="{username}"><input type="text" value="{username}" class="fsa" AutoComplete="off" title="{username}"></td>
                  <td width="10%"><input type="text" name="email" value="{email}" class="fsa" AutoComplete="off" title="{email}"></td>
                  <td width="6%"><select name="mute"><option value="{mutetime1}">{mute1}</option><option value="{mutetime2}">{mute2}</option></select></td>
                  <td width="10%">{staff_id}</td>
                  <td width="11%"><input type="text" name="activation" value="{activation}" class="fsa" AutoComplete="off" title="{activation}"></td>
                  <td width="6%"><select name="active"><option value="{act1}">{actt1}</option><option value="{act2}">{actt2}</option></select></td>
                  <td width="10%"><input type="text" name="vp" value="{vp}" class="fsa" AutoComplete="off"></td>
                  <td width="6%"><input type="text" name="dp" value="{dp}" class="fsa" AutoComplete="off"></td>
                  <td width="10%"><select name="access"><option value="{adm1}">{admin1}</option><option value="{adm2}">{admin2}</option></select></td>
                  <td width="15%"><input type="submit" name="save" value="Save" class="ltbls"> <input type="submit" name="delete" value="Delete" class="ltbls"></td>
                  </tr>
              </table>
            </div>
          </div>
          </form>{/view_accounts}
          {account_update}
        </div>
      </div>
      
      <div class="content-footer"></div>
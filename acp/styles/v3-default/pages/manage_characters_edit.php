      <div class="content-header">
        <div class="chs">Manage Characters<span style="margin-left:705px; color:black;">[<a href="./?page=manage_characters" style="color:black;">Character Search</a>]</span></div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">Account</td>
                  <td width="25%">Name</td>
                  <td width="15%">Race</td>
                  <td width="15%">Class</td>
                  <td width="10%">Gender</td>
                  <td width="10%">Level</td>
                  <td width="15%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          {view_characters}<form action="" method="post">
          <div class="mc">
            <div style="padding:3px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10%"><input type="text" name="account" value="{account}" class="fsa" AutoComplete="off"></td>
                  <td width="25%"><input type="text" name="name" value="{name}" class="fsb" AutoComplete="off"></td>
                  <td width="15%"><select name="race">{races}<option value="{val1}">{val}</option>{/races}</select></td>
                  <td width="15%"><select name="class">{ccl}<option value="{val1}">{val}</option>{/ccl}</select></td>
                  <td width="10%"><select name="gender"><option value="{g1}">{gender1}</option><option value="{g2}">{gender2}</option></select></td>
                  <td width="10%"><input type="text" name="level" value="{level}" class="fsa" AutoComplete="off"></td>
                  <td width="15%"><input type="submit" name="save" value="Save" class="ltbls"></td>
                  </tr>
              </table>
            </div>
          </div>
          </form>{/view_characters}
          {character_update}
        </div>
      </div>
      
      <div class="content-footer"></div>
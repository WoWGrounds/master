      <div class="content-header">
        <div class="chs">Manage Realms <span style="margin-left:732px; color:black;">[<a href="./?page=manage_realms" style="color:black;">Realm Selection</a>]</span></div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="5%">ID</td>
                  <td width="20%">Name</td>
                  <td width="20%">About</td>
                  <td width="5%">Order</td>
                  <td width="20%">DB</td>
                  <td width="7%">Port</td>
                  <td width="7%">RA</td>
                  <td width="16%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {realms_edit}<form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="5%"><input type="hidden" name="id" value="{id}">{id}</td>
                  <td width="20%"><input type="text" name="rname" value="{rname}" class="fsb" AutoComplete="off"></td>
                  <td width="20%"><input type="text" name="type" value="{type}" class="fsb" AutoComplete="off"></td>
                  <td width="5%"><input type="text" name="oid" value="{oid}" class="fsa" AutoComplete="off"></td>
                  <td width="20%"><input type="text" name="cdb" value="{char_db}" class="fsb" AutoComplete="off"></td>
                  <td width="7%"><input type="text" name="port" value="{port}" class="fsa" AutoComplete="off"></td>
                  <td width="7%"><input type="text" name="ra" value="{ra_port}" class="fsa" AutoComplete="off"></td>
                  <td width="16%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{/realms_edit}{realm_update}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
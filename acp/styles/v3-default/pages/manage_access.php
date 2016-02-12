      <div class="content-header">
        <div class="chs">Manage Access</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="25%">Account</td>
                  <td width="25%">GM Level</td>
                  <td width="25%">Realms</td>
                  <td width="25%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {realm_access}<form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="25%"><input type="hidden" name="acid" value="{id}">{id}</td>
                  <td width="25%">{gmlevel}</td>
                  <td width="25%">All Realms</td>
                  <td width="25%"><input type="submit" name="delete" value="Delete"></td>
                </tr>
              </table>
            </div>
          </div></form>{/realm_access}
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="25%"><input type="text" name="acid" AutoComplete="off" value="Account ID" onfocus='if (this.value == "Account ID") this.value = "";' onblur='if (!this.value){ this.value = "Account ID"; }'></td>
                  <td width="25%"><select name="glevel">{acls}<option value="{al1}">{alist}</option>{/acls}</select></td>
                  <td width="25%">All Realms</td>
                  <td width="25%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{access_action}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
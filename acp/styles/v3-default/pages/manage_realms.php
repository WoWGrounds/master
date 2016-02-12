      <div class="content-header">
        <div class="chs">Manage Realms</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="6%">ID</td>
                  <td width="26%">Name</td>
                  <td width="15%">About</td>
                  <td width="6%">Order</td>
                  <td width="20%">DB</td>
                  <td width="6%">Port</td>
                  <td width="6%">RA</td>
                  <td width="15%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {store_realms}<div class="mc">
            <div style="padding:4px; 0px 3px 0px">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="6%">{id}</td>
                  <td width="26%">{rname}</td>
                  <td width="15%"><input type="text" class="fsb" value="{type}"></td>
                  <td width="6%">{oid}</td>
                  <td width="20%">{char_db}</td>
                  <td width="6%">{port}</td>
                  <td width="6%">{ra_port}</td>
                  <td width="15%"><a href="./?page=manage_realms_edit&id={id}">Edit</a> &bull; <a href="./?page=manage_realms&action=delete&id={id}">Delete</a></td>
                </tr>
              </table>
            </div>
          </div>{/store_realms}
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="6%">+</td>
                  <td width="26%"><input type="text" name="rname" value="Name" class="fsb" AutoComplete="off" onfocus='if (this.value == "Name") this.value = "";' onblur='if (!this.value){ this.value = "Name"; }'></td>
                  <td width="15%"><input type="text" name="type" value="Description" class="fsb" AutoComplete="off" onfocus='if (this.value == "Description") this.value = "";' onblur='if (!this.value){ this.value = "Description"; }'></td>
                  <td width="6%"><input type="text" name="oid" value="Order" class="fsa" AutoComplete="off" onfocus='if (this.value == "Order") this.value = "";' onblur='if (!this.value){ this.value = "Order"; }'></td>
                  <td width="20%"><input type="text" name="cdb" value="Character DB" class="fsb" AutoComplete="off" onfocus='if (this.value == "Character DB") this.value = "";' onblur='if (!this.value){ this.value = "Character DB"; }'></td>
                  <td width="6%"><input type="text" name="port" value="Port" class="fsa" AutoComplete="off" onfocus='if (this.value == "Port") this.value = "";' onblur='if (!this.value){ this.value = "Port"; }'></td>
                  <td width="6%"><input type="text" name="ra" value="Ra Port" class="fsa" AutoComplete="off" onfocus='if (this.value == "Ra Port") this.value = "";' onblur='if (!this.value){ this.value = "Ra Port"; }'></td>
                  <td width="15%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{realm_update}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
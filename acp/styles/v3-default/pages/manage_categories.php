      <div class="content-header">
        <div class="chs">Manage Store Categories</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="15%">ID</td>
                  <td width="30%">Name</td>
                  <td width="15%">Order</td>
                  <td width="25%">Realm</td>
                  <td width="15%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {store_cat}<div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="15%">{id}</td>
                  <td width="30%">{cname}</td>
                  <td width="15%">{oid}</td>
                  <td width="25%">{realm}</td>
                  <td width="15%"><a href="?page=manage_categories_edit&id={id}">Edit</a> &bull; <a href="?page=manage_categories&action=delete&id={id}">Delete</a></td>
                </tr>
              </table>
            </div>
          </div>{/store_cat}
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="15%">{new_scid}</td>
                  <td width="30%"><input type="text" name="rname" class="fsb" AutoComplete="off" value="Name" onfocus='if (this.value == "Name") this.value = "";' onblur='if (!this.value){ this.value = "Name"; }'></td>
                  <td width="15%"><input type="text" name="oid" class="fsa" AutoComplete="off" value="Order" onfocus='if (this.value == "Order") this.value = "";' onblur='if (!this.value){ this.value = "Order"; }'></td>
                  <td width="25%"><select name="realm">{store_realms}<option value="{id}">{rname}</option>{/store_realms}</select></td>
                  <td width="15%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{sct_action}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
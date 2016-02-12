      <div class="content-header">
        <div class="chs">Manage Store Items</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">ID</td>
                  <td width="20%">Name</td>
                  <td width="10%">Display</td>
                  <td width="10%">Amount</td>
                  <td width="10%">Items</td>
                  <td width="10%">Type</td>
                  <td width="10%">Cost</td>
                  <td width="10%">Parent</td>
                  <td width="10%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {store_items}<div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">{sid}</td>
                  <td width="20%">{name}</td>
                  <td width="10%">{display}</td>
                  <td width="10%">{amount}</td>
                  <td width="10%">{item}</td>
                  <td width="10%">{ctype}</td>
                  <td width="10%">{cost}</td>
                  <td width="10%">{parent_category}</td>
                  <td width="10%"><a href="?page=manage_items_edit&id={sid}">Edit</a> &bull; <a href="?page=manage_items&action=delete&id={sid}">Delete</a></td>
                </tr>
              </table>
            </div>
          </div>{/store_items}
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">{new_siid}</td>
                  <td width="20%"><input type="text" name="name" class="fsb" AutoComplete="off" value="Name" onfocus='if (this.value == "Name") this.value = "";' onblur='if (!this.value){ this.value = "Name"; }'></td>
                  <td width="10%"><input type="text" name="display" class="fsa" AutoComplete="off" value="Display" onfocus='if (this.value == "Display") this.value = "";' onblur='if (!this.value){ this.value = "Display"; }'></td>
                  <td width="10%"><input type="text" name="amount" class="fsa" AutoComplete="off" value="Amount" onfocus='if (this.value == "Amount") this.value = "";' onblur='if (!this.value){ this.value = "Amount"; }'></td>
                  <td width="10%"><input type="text" name="item" class="fsa" AutoComplete="off" value="Item" onfocus='if (this.value == "Item") this.value = "";' onblur='if (!this.value){ this.value = "Item"; }'></td>
                  <td width="10%"><select name="type"><option value="1">Vote</option><option value="2">V.I.P</option></select></td>
                  <td width="10%"><input type="text" name="cost" class="fsa" AutoComplete="off" value="Cost" onfocus='if (this.value == "Cost") this.value = "";' onblur='if (!this.value){ this.value = "Cost"; }'></td>
                  <td width="10%"><select name="parent" class="fsa">{ict}<option value="{cid}">{rname}-{cname}</option>{/ict}</select></td>
                  <td width="10%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{sit_action}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
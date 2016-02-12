      <div class="content-header">
        <div class="chs">Manage Store Categories<span style="margin-left:665px; color:black;">[<a href="./?page=manage_categories" style="color:black;">Category Selection</a>]</span></div>
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
          
          <form action="" method="post">{sc_edit}<div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="15%"><input type="hidden" name="id" class="fsa" value="{id}">{id}</td>
                  <td width="30%"><input type="text" name="cname" class="fsb" value="{cname}"></td>
                  <td width="15%"><input type="text" name="oid" class="fsa" value="{oid}"></td>
                  <td width="25%"><select name="realm">{store_realms}<option value="{id}">{rname}</option>{/store_realms}</td>
                  <td width="15%"><input type="submit" name="update" value="Update"></td>
                </tr>
              </table>
            </div>
          </div>{/sc_edit}</form>
          {cat_update}
        </div>
      </div>
      
      <div class="content-footer"></div>
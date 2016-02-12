      <div class="content-header">
        <div class="chs">Manage Store Items<span style="margin-left:725px; color:black;">[<a href="./?page=manage_items" style="color:black;">Item Selection</a>]</span></div>
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
          
          <form action="" method="post">{si_edit}<div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%"><input type="hidden" name="id" class="fsa" AutoComplete="off" value="{sid}">{sid}</td>
                  <td width="20%"><input type="text" name="name" class="fsb" AutoComplete="off" value="{name}"></td>
                  <td width="10%"><input type="text" name="display" class="fsa" AutoComplete="off" value="{display}"></td>
                  <td width="10%"><input type="text" name="amount" class="fsa" AutoComplete="off" value="{amount}"></td>
                  <td width="10%"><input type="text" name="item" class="fsa" AutoComplete="off" value="{item}"></td>
                  <td width="10%"><select name="type">{sict}<option value="{ci1}">{cid}</option>{/sict}</select></td>
                  <td width="10%"><input type="text" name="cost" class="fsa" AutoComplete="off" value="{cost}"></td>
                  <td width="10%"><select name="parent" class="fsa">{ict}<option value="{cid}">{rname}-{cname}</option>{/ict}</select></td>
                  <td width="10%"><input type="submit" name="update" value="Update"></td>
                </tr>
              </table>
            </div>
          </div>{/si_edit}</form>
          {item_update}<!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
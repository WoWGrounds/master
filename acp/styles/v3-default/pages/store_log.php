      <div class="content-header">
        <div class="chs">Store History</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="5%">ID</td>
                  <td width="10%">Status</td>
                  <td width="10%">Realm</td>
                  <td width="10%">Character</td>
                  <td width="35%">Date</td>
                  <td width="20%">TID</td>
                  <td width="10%">Items</td>
                </tr>
              </table>
            </div>
          </div>
          {store_log}
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="5%">{id}</td>
                  <td width="10%">{eid}</td>
                  <td width="10%">{acc_id}</td>
                  <td width="10%">{char_id}</td>
                  <td width="35%">{date}</td>
                  <td width="20%">{trs_id}</td>
                  <td width="10%"><a href="#" title="{prc_items}">Item List</a></td>
                  </tr>
              </table>
            </div>
          </div>
          {/store_log}
        </div>
      </div>
      
      <div class="content-footer"></div>
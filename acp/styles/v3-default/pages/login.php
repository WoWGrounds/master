      <div class="content-header">
        <div class="chs">Login History</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="5%">ID</td>
                  <td width="20%">Username</td>
                  <td width="10%">IP</td>
                  <td width="35%">Date</td>
                  <td width="5%">Type</td>
                  <td width="25%">Status</td>
                </tr>
              </table>
            </div>
          </div>
          {login_logs}
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="5%">{id}</td>
                  <td width="20%">{username}</td>
                  <td width="10%">{ip}</td>
                  <td width="35%">{date}</td>
                  <td width="5%">{lty}</td>
                  <td width="25%">{status}</td>
                  </tr>
              </table>
            </div>
          </div>
          {/login_logs}
        </div>
      </div>
      
      <div class="content-footer"></div>
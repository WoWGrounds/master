      <div class="content-header">
        <div class="chs">Voting History</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">ID</td>
                  <td width="25%">Username</td>
                  <td width="5%">Site ID</td>
                  <td width="20%">Site Name</td>
                  <td width="5%">Cost</td>
                  <td width="35%">Date</td>
                </tr>
              </table>
            </div>
          </div>
          {vote_logs}
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10%">{id}</td>
                  <td width="25%">{user}</td>
                  <td width="5%">{site_id}</td>
                  <td width="20%">{site_name}</td>
                  <td width="5%">{site_cost}</td>
                  <td width="35%">{date}</td>
                  </tr>
              </table>
            </div>
          </div>
          {/vote_logs}
        </div>
      </div>
      
      <div class="content-footer"></div>
      <div class="content-header">
        <div class="chs">Manage Voting</div>
      </div>
      
      <div class="content-body">
        <div class="cbsl">
          <div class="mc">
            <div style="padding-top:7px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">ID</td>
                  <td width="25%">Name</td>
                  <td width="15%">URL</td>
                  <td width="20%">IMG</td>
                  <td width="10%">Cost</td>
                  <td width="20%">Options</td>
                </tr>
              </table>
            </div>
          </div>
          
          {vote_sites}<div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">{id}</td>
                  <td width="25%">{site_name}</td>
                  <td width="15%"><a href="{site_url}" target="_BLANK">View</a></td>
                  <td width="20%"><img src="{site_img}" style="border-top:3px solid #efefef;"></td>
                  <td width="10%">{site_cost}</td>
                  <td width="20%"><a href="?page=manage_sites_edit&id={id}">Edit</a> &bull; <a href="?page=manage_sites&action=delete&id={id}">Delete</a></td>
                </tr>
              </table>
            </div>
          </div>{/vote_sites}
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                <tr id="head">
                  <td width="10%">{new_vid}</td>
                  <td width="25%"><input type="text" name="sname" class="fsa" AutoComplete="off" value="Name" onfocus='if (this.value == "Name") this.value = "";' onblur='if (!this.value){ this.value = "Name"; }'></td>
                  <td width="15%"><input type="text" name="surl" class="fsb" AutoComplete="off" value="URL" onfocus='if (this.value == "URL") this.value = "";' onblur='if (!this.value){ this.value = "URL"; }'></td>
                  <td width="20%"><input type="text" name="simg" class="fsb" AutoComplete="off" value="IMG" onfocus='if (this.value == "IMG") this.value = "";' onblur='if (!this.value){ this.value = "IMG"; }'></td>
                  <td width="10%"><input type="text" name="scost" class="fsa" AutoComplete="off" value="Cost" onfocus='if (this.value == "Cost") this.value = "";' onblur='if (!this.value){ this.value = "Cost"; }'></td>
                  <td width="20%"><input type="submit" name="save" value="Save"></td>
                </tr>
              </table>
            </div>
          </div></form>{vote_action}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
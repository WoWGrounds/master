      <div class="content-header">
        <div class="chs">Manage Voting <span style="margin-left:756px; color:black;">[<a href="./?page=manage_sites" style="color:black;">Site Selection</a>]</span></div>
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
          
          <form action="" method="post"><div class="mc">
            <div style="padding:3px 0px 3px 0px;">
              <table class="ltbl" cellpadding="0" cellspacing="0">
                {vs_edit}<tr id="head">
                  <td width="10%"><input type="hidden" name="site_id" value="{id}">{id}</td>
                  <td width="25%"><input type="text" name="sname" class="fsa" AutoComplete="off" value="{site_name}" onfocus='if (this.value == "Name") this.value = "";' onblur='if (!this.value){ this.value = "Name"; }'></td>
                  <td width="15%"><input type="text" name="surl" class="fsb" AutoComplete="off" value="{site_url}" onfocus='if (this.value == "URL") this.value = "";' onblur='if (!this.value){ this.value = "URL"; }'></td>
                  <td width="20%"><input type="text" name="simg" class="fsb" AutoComplete="off" value="{site_img}" onfocus='if (this.value == "IMG") this.value = "";' onblur='if (!this.value){ this.value = "IMG"; }'></td>
                  <td width="10%"><input type="text" name="scost" class="fsa" AutoComplete="off" value="{site_cost}" onfocus='if (this.value == "Cost") this.value = "";' onblur='if (!this.value){ this.value = "Cost"; }'></td>
                  <td width="20%"><input type="submit" name="update" value="Update"></td>
                </tr>{/vs_edit}
              </table>
            </div>
          </div></form>{vote_update}
          <!---->
        </div>
      </div>
      
      <div class="content-footer"></div>
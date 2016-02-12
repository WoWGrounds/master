      <div class="content-header">
        <div class="chs">Manage Characters</div>
      </div>
      
      <div class="content-body">
        <div class="cbs" style="text-align:center;">
          Enter the name associated with the character you are looking for.<br/>
          <br/>
          <form action="" method="post">
            <select name="realm">{store_realms}<option value="{id}">{rname}</option>{/store_realms}</select> <input type="text" name="character" class="fsc" AutoComplete="off"><input type="submit" name="find_characters" value="Search">
          </form>
          <br/>
          {account_search}
        </div>
      </div>
      
      <div class="content-footer"></div>
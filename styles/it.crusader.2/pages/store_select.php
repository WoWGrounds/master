<div class="body-title">{title} Store</div>
<div class="body-body">
  <!-- News/Page System {crealms} -->
  <div class="box">
    <div class="title">{login={rname} - <span>Store</span>-}Caution - <span>You must fill all fields below</span>{/login}</div>
    <div class="body">
      {login=
      <table style="width:95%;margin:0 auto">
        <tr>
          <th width="60%">Character</th>
          <th width="20%">Level</th>
          <th width="20%">Action</th>
        </tr>
        {uchars.{char_db}}
        <tr>
          <td width="60%">{name}</td>
          <td width="20%">{level}</td>
          <td width="20%"><a href="?page=store_shop&data={id}-{guid}">Select</a></td>
        </tr>
        {/uchars.{char_db}}
      </table>

      -}
      <p>You must be logged in to access this page</p>
      {/login}
    </div>
    <div class="bottom"></div>
  </div>
  <!-- {/crealms} --> 
</div>
<div class="body-bottom"></div>
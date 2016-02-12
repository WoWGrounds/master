<div class="body-title"><a href="./?page=store_select">Character Selection</a></div>
<div class="body-body">
  <!-- News/Page System {store_cat} -->
  <div class="box">
    <div class="title" OnClick="return toggleMe('{id}')" style="cursor:pointer;">{store_cat_rn} {cname} <b><span>+</span> (click)</div>
    <div class="body" id="{id}" style="display:none;">
      {store_items.{id}}
      <table style="width:95%;margin:0 auto">
        <tr align="center">
          <td align="left" width="60%"><b><a href="#" rel="">[item={display}]{name}[/item] (x{amount})</a></td>
          <td align="left"><b>{ctype}:</b> {cost}</td>
          <td align="right">
            <form action="" method="post">
              <input type="hidden" name="item_id" value="{sid}">
              <input type="hidden" name="parent" value="{parent_category}">
              <input type="submit" name="atc" value="Add" class="sub-link">
            </form>
          </td>
        </tr>
      </table>
      {/store_items.{id}}{add_to_cart}
    </div>
    <div class="bottom"></div>
  </div>
  <!-- {/store_cat} -->
  <div class="box">
    <div class="title">{store_cat_cn}'s Cart</div>
    <div class="body">
      {view_cart}
      <table style="width:95%;margin:0 auto">
        <tr align="center">
          <td align="left" width="60%"><b><a href="#" rel="">[item={display}]{name}[/item] (x{amount})</a></td>
          <td align="left"><b>{ctype}:</b> {cost}</td>
          <td align="right">
            <form action="" method="post">
              <input type="hidden" name="item_id" value="{cid}">
              <input type="hidden" name="parent" value="{parent_category}">
              <input type="submit" name="rfc" value="Remove" class="sub-link">
            </form>
          </td>
        </tr>
      </table>
      {/view_cart}
      <br />
      <table width="100%">
        <tr align="center">
          <td align="left" width="60%">Total: Vote Points: <span>{vote_sum}</span>, V.I.P Points: <span>{vip_sum}</span></td>
          <td align="left"></td>
          <td align="right">
            <form action="" method="post">
              <input type="hidden" name="shop_data" value="{shop_data}">
              <input type="submit" name="purchase" value="Purchase" class="sub-link">
            </form>
            {purchase}
          </td>
        </tr>
      </table>
    </div>
    <div class="bottom"></div>
  </div>
</div>
<div class="body-bottom"></div>
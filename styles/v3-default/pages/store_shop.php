{login=
<!-- News/Page System -->
                <div class="title-bar" id="char" OnClick="location.href='?page=store_select'">
                  <div class="tspace">
                    Character Selection
                  </div>
                </div>
                
                <div style="margin-bottom:5px;"></div>
<!-- -->

<!-- News/Page System {store_cat} -->
                <div class="title-bar" OnClick="return toggleMe('{id}')" style="cursor:pointer;">
                  <div class="tspace">
                    {store_cat_rn} {cname} <b><span OnClick="return toggleMe('{id}')" style="cursor:pointer;">+</span></b>
                  </div>
                </div>
                <div class="page-body" id="{id}" style="display:none;">
                  {store_items.{id}}<div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="#" rel="">[item={display}]{name}[/item] (x{amount})</a></td> <td align="left"><b>{ctype}:</b> {cost}</td> <td align="right"><form action="" method="post"><input type="hidden" name="item_id" value="{sid}"><input type="hidden" name="parent" value="{parent_category}"><input type="submit" name="atc" value="Add" class="sub-link"></form></td>
                        </tr>
                      </table>
                    </div>
                  </div>{/store_items.{id}}{add_to_cart}
                </div>
<!-- {/store_cat} -->

<!-- News/Page System -->
                <div style="margin-top:5px;"></div>
                <div class="title-bar">
                  <div class="tspace">
                    {store_cat_cn}'s Cart
                  </div>
                </div>
                <div class="page-body">
                  {view_cart}<div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="#" rel="">[item={display}]{name}[/item] (x{amount})</a></td> <td align="left"><b>{ctype}:</b> {cost}</td> <td align="right"><form action="" method="post"><input type="hidden" name="item_id" value="{cid}"><input type="hidden" name="parent" value="{parent_category}"><input type="submit" name="rfc" value="Remove" class="sub-link"></form></td>
                        </tr>
                      </table>
                    </div>
                  </div>{/view_cart}
                  
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="#" rel="">Total: Vote Points: {vote_sum}, V.I.P Points: {vip_sum}</a></td> <td align="left"></td> <td align="right"><form action="" method="post"><input type="hidden" name="shop_data" value="{shop_data}"><input type="submit" name="purchase" value="Purchase" class="sub-link"></form>{purchase}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
<!-- -->
-}
{login_error}
{/login}
{login=
<!-- News/Page System -->
                <div class="title-bar" id="char" OnClick="location.href='?page=account#char'">
                  <div class="tspace">
                    Account Panel
                  </div>
                </div>
                
                <div style="margin-bottom:5px;"></div>
<!-- -->

<!-- News/Page System {crealms} -->
                <div class="title-bar">
                  <div class="tspace">
                    {rname}{tool_unstuck}{tool_revive}
                  </div>
                </div>
                <div class="page-body">
                  {uchars.{char_db}}
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="#" rel="">{name}</a></td> <td align="left"><b>Level:</b> {level}</td> <td align="right"><!--<a href="?page=tool&action=unstuck&id={id}-{guid}">Unstuck</a>--><form action="" name="{guid}-unstuck" method="post" class="sub-form"><input type="hidden" name="unstuck" value="{id}-{guid}"><input type="submit" name="submit-unstuck" value="Unstuck" class="sub-link"></form> | <form action="" name="{guid}-revive" method="post" class="sub-form"><input type="hidden" name="revive" value="{id}-{guid}"><input type="submit" name="submit-revive" value="Revive" class="sub-link"></form><!--<a href="?page=tool&action=revive&id={id}-{guid}">Revive</a>--></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  {/uchars.{char_db}}
                </div>
<!-- {/crealms} -->
-}
{login_error}
{/login}
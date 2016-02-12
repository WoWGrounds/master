{login=
<!-- News/Page System {crealms} -->
                <div class="title-bar">
                  <div class="tspace">
                    {rname}
                  </div>
                </div>
                <div class="page-body">
                  {uchars.{char_db}}
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="#" rel="">{name}</a></td> <td align="left"><b>Level:</b> {level}</td> <td align="right"><a href="?page=store_shop&data={id}-{guid}">Select</a></td>
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
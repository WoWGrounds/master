{login=
<!-- News/Page System -->
                <div class="title-bar" id="top">
                  <div class="tspace">
                    {session}'s Outbox &bull; <span style="font-size:11px;"><a href="?page=account#msg">Account</a> - <a href="?page=inbox">Inbox</a> - <a href="?page=new_message">New Message</a></span>
                  </div>
                </div>
                <div class="page-body">
                {outbox}
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="?page=message&box=outbox&id={id}#top">{title}</a></td> <td align="left"><b>To:</b> {user}</td> <td align="right"><a href="?page=outbox&id={id}&option=delete">Delete</a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                {/outbox}
                </div>
<!-- -->
-}
{login_error}
{/login}
{login=
<!-- News/Page System -->
                <div class="title-bar" id="top">
                  <div class="tspace">
                    {session}'s Inbox &bull; <span style="font-size:11px;"><a href="?page=account#msg">Account</a> - <a href="?page=outbox#top">Outbox</a> - <a href="?page=new_message">New Message</a></span>
                  </div>
                </div>
                <div class="page-body">
                {inbox}
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%">
                        <tr align="center">
                          <td align="left" width="60%"><b><a href="?page=message&box=inbox&id={id}#top">{title} {unread_{unread}}</a></td> <td align="left"><b>From:</b> {sender}</td> <td align="right"><a href="?page=inbox&id={id}&option=delete">Delete</a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                {/inbox}
                </div>
<!-- -->
-}
{login_error}
{/login}
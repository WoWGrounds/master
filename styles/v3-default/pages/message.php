{login=
<!-- News/Page System {read_message}-->
                <div class="title-bar">
                  <div class="tspace">
                    {title} &bull; <span style="font-size:11px;"><a href="?page=account#msg">Account</a> - <a href="?page=inbox">Inbox</a> - <a href="?page=outbox">Outbox</a></span>
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                    <b>From:</b> {sender} {date}<br/>
                    [<a href="?page=new_message&action=reply&id={id}">Reply</a>] [<a href="?page={msg_page}&id={id}&option=delete">Delete</a>]<br/><br/>
                    {body}<br/><br/>
                  </div>
                </div>
<!-- {/read_message} -->
-}
{login_error}
{/login}
<div class="body-title">{login=Private Messages-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
  <div class="box">
    <div class="title">{login={session}'s <span>Outbox</span>-}Caution - <span>Connection Required</span>{/login}</div>
    <div class="body">
      {login=
      <table style="width:95%;margin:0 auto">
        <tr>
          <th width="60%">Title</th>
          <th width="20%">To</th>
          <th width="20%">Action</th>
        </tr>
        {outbox}
        <tr>
          <td><a href="./?page=message&amp;box=outbox&amp;id={id}#top">{title}</a></td>
          <td>{user}</td>
          <td><a href="./?page=message&amp;box=outbox&amp;id={id}#top">Read</a> - <a href="./?page=outbox&amp;id={id}&amp;option=delete">Delete</a></td>
        </tr>
        {/outbox}
      </table>
      <br>
      <p style="text-align:right">
        <a class="button" href="./?page=account">Account</a>&nbsp;
        <a class="button" href="./?page=inbox">Inbox</a>&nbsp;
        <a class="button" href="./?page=new_message">New Message</a>
      </p>
      -}
      <p>You must be logged in to access this page</p>
      {/login}
    </div>
    <div class="bottom"></div>
  </div>
</div>
<div class="body-bottom"></div>
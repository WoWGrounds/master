<div class="body-title">{login=Private Messages-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
  <div class="box">
    <div class="title">{login={session}'s <span>Inbox</span>-}Caution - <span>Connection Required</span>{/login}</div>
    <div class="body">
      {login=
      <table style="width:95%;margin:0 auto">
        <tr>
          <th width="60%">Title</th>
          <th width="20%">From</th>
          <th width="20%">Action</th>
        </tr>
        {inbox}
        <tr>
          <td><a href="./?page=message&amp;box=inbox&amp;id={id}#top">{title} {unread_{unread}}</a></td>
          <td>{sender}</td>
          <td><a href="./?page=message&amp;box=inbox&amp;id={id}#top">Read</a> - <a href="./?page=inbox&amp;id={id}&amp;option=delete">Delete</a></td>
        </tr>
        {/inbox}
      </table>
      <br>
      <p style="text-align:right">
        <a class="button" href="./?page=account">Account</a>&nbsp;
        <a class="button" href="./?page=outbox">Outbox</a>&nbsp;
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
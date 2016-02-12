<div class="body-title">{login=Private Messages-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
  <!-- News/Page System {read_message}-->
  <div class="box">
    <div class="title">{login=<span>{title}</span> from <span>{sender}</span> <i style="float:right">{date}</i>-}Caution - <span>Connection Required</span>{/login}</div>
    <div class="body">
      {login=
      {body}
      <br>
      <p style="text-align:right">
        <a class="button" href="./?page=new_message&amp;action=reply&amp;id={id}">Reply</a>
        <a class="button" href="./?page={msg_page}&amp;id={id}&amp;option=delete">Delete</a>
      </p>
      -}
      <p>You must be logged in to access this page</p>
      {/login}
    </div>
    <div class="bottom"></div>
  </div>
  <!-- {/read_message} -->
</div>
<div class="body-bottom"></div>
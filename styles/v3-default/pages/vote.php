{login=
<div class="vote-body-l">
<!-- News/Page System {vote_sites} -->
<div class="vote-body">
                <div class="vote-bar">
                  <div class="vspace">
                    {site_name}
                  </div>
                </div>
                <div class="page-vote">
                  <div class="vote-space">
                    <form action="" name="vote-{id}" method="post">
                      <img src="{site_img}" border="" id="vimg" OnClick="document['vote-{id}'].submit(); window.open('{site_url}', '_BLANK'); return false;"><br/>
                      {site_cost} Vote Points<br/>
                      
                      <input type="hidden" name="site" value="{id}">
                    </form>
                  </div>
                </div>
</div>
<!-- {/vote_sites} -->
<br/>
<span style="font-size:12px;">{vote}</span>
</div>
-}
{login_error}
{/login}
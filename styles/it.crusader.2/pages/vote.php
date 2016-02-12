<div class="body-title">{login=Vote For Us-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=By voting, you earn vote points that can be used on our store!-}Caution - <span>Connection Required</span>{/login}</div>
		<div class="body">
		{login=
		<table style="width:100%;margin:0 auto;">
			<tr>
				<td align="center" width="33%">Site</td>
				<td align="center" width="33%">Points</td>
				<td align="center" width="33%">Banner</td>
			</tr>
		<!-- News/Page System {vote_sites} -->
			<tr>
				<td align="center">{site_name}</td>
				<td align="center">{site_cost}</td>
				<td align="center">
					<form action="" method="post" name="vote-{id}">
						<input type="image" src="{site_img}" border="none" OnClick="document['vote-{id}'].submit(); window.open('{site_url}', '_BLANK'); return false;">
						<input type="hidden" name="site" value="{id}">
					</form>
				</td>
			</tr>
		<!-- {/vote_sites} -->
		</table>
		-}
		<p>You must be logged in to access this page</p>
		{/login}
		{login=<p style="text-align:center">{vote}</p>-}{/login}
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div class="body-bottom"></div>
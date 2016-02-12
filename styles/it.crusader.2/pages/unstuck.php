<div class="body-title">{login=Character Unstuck-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
	<!-- News/Page System {crealms} -->
	<div class="box">
		<div class="title">{login=Account Tool - <span>Character Unstuck</span><font class="author"><a href="./?page=account">Back to Account panel</a></font>-}Caution - <span>Connection Required</span>{/login}</div>
		<div class="body">
			{login=
			{rname} {tool_unstuck}{tool_revive}
			<table style="width:95%;margin:0 auto;">
				{uchars.{char_db}}
				<tr>
					<td width="60%"><b><a href="#" rel="">{name}</a></td>
					<td width="10%"><b>Level:</b> {level}</td>
					<td align="right">
						<form class="inline-form" action="" name="{guid}-unstuck" method="POST">
							<input type="hidden" name="unstuck" value="{id}-{guid}">
							<input type="submit" name="submit-unstuck" value="Unstuck" class="sub-link">
						</form>
						<form class="inline-form" action="" name="{guid}-revive" method="POST">
							<input type="hidden" name="revive" value="{id}-{guid}">
							<input type="submit" name="submit-revive" value="Revive" class="sub-link">
						</form>
					</td>
				</tr>
				{/uchars.{char_db}}
			</table>
			-}
			<p>You must be logged in to access this page</p>
			{/login}
		</div>
		<div class="bottom"></div>
	</div>
	<!-- {/crealms} -->
</div>
<div class="body-bottom"></div>
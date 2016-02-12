<div class="body-title">Realm Status</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{online_rname} - <span>Top 10 Slayers</span></div>
		<div class="body">
			<table width="100%">
				<tr>
					<td align="center"><u>Name</u></td>
					<td align="center"><u>Race</u></td>
					<td align="center"><u>Class</u></td>
					<td align="center"><u>Total Killed</u></td>
					<td align="center"><u>Kills Today</u></td>
				</tr>
				{top_10}
				<tr>
					<td align="center">{name}</td>
					<td align="center"><img src="./styles/global/images/race/{race}-{gender}.gif" width="18" height="18" /></td>
					<td align="center"><img src="./styles/global/images/class/{class}.gif" width="18" height="18" /></td>	
					<td align="center">{totalKills}</td>
					<td align="center">{todayKills}</td>
				</tr>
				{/top_10}
			</table>
		</div>
		<div class="bottom"></div>
	</div>
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=Realm Status - <span>{online_rname}</span>-}Caution - <span>Connection Required</span>{/login}</div>
		<div class="body">
			{login=
			<table width="100%">
				<tr>
					<td align="center"><u>Name</u></td>
					<td align="center"><u>Level</u></td>
					<td align="center"><u>Race</u></td>
					<td align="center"><u>Class</u></td>
				</tr>  
				{online_players}
				<tr>
					<td align="center">{online_players.name}</td>
					<td align="center">{online_players.level}</td>
					<td align="center"><img src="./global/images/race/{online_players.race}-{online_players.gender}.gif" border="none"></td>
					<td align="center"><img src="./global/images/class/{online_players.class}.gif" border="none"></td>
				</tr>
				{/online_players}
			</table>-}
			<p>You must login to see online players!</p>{/login}
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div class="body-bottom"></div>
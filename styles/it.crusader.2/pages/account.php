<div class="body-title">{login=Account Panel-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=Account Panel - <span>Account Informations</span>-}Caution - <span>Connection Required</span>{/login}</div>
		<div class="body">
		{login=
			<table style="width:95%;margin:0 auto;">{user_data}
				<tr>
					<td>Username : <span>{session}</span> (<a href="./?page=logout">logout</a>)</td>
					<td>Current IP : <span>{ip}</span></td>
				</tr>
				<tr>
					<td>Email : <span>{email}</span> (<a href="./?page=email">update</a>)</td>
					<td>Last IP : <span>{last_ip}</span></td>
				</tr>
				<tr>
					<td>Join Date : <span>{joindate}</span></td>
					<td>Vote Points : <span>{vp}</span></td>
				</tr>
				<tr>
					<td>Site Rank : <span>{user_rank}</span></td>
					<td>V.I.P Points : <span>{dp}</span></td>
				</tr>
				<tr>
					<td>Expansion : <span>{expansion}</span></td>
					<td>Banned: {user_banned}</td>
				</tr>
			{/user_data}</table>-}
		<p>You must be logged in to access this page</p>{/login}
		</div>
		<div class="bottom"></div>
	</div>

	{login=
	<!-- BOX -->
	<div class="box">
		<div class="title">Account Panel - <span>Account Tools</span></div>
		<div class="body">
			<table style="width:100%;margin:0 auto;">
				<tr>
					<td>
						<a href="./?page=unstuck">
							<div class="acc-tool">
								<span class="acc-icon unstuck"> </span>
								Character Unstuck
							</div>
						</a>
					</td>
					<td>
						<a href="./?page=change"><div class="acc-tool">
							<span class="acc-icon password"> </span>
							Change Password
						</div></a>
					</td>
					<td>
						<a href="./?page=email"><div class="acc-tool">
							<span class="acc-icon email"> </span>
							Change Email
						</div></a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="./?page=vote"><div class="acc-tool">
							<span class="acc-icon vote"> </span>
							Vote For Us
						</div></a>
					</td>
					<td>
						<a href="./?page=donate"><div class="acc-tool">
							<span class="acc-icon donate"> </span>
							Donate
						</div></a>
					</td>
					<td>
						<a href="./?page=store"><div class="acc-tool">
							<span class="acc-icon store"> </span>
							Go To Store
						</div></a>
					</td>
				</tr>
			</table>
		</div>
		<div class="bottom"></div>
	</div>-}{/login}

	{login=
	<div class="box">
		<div class="title">Recent <span>Login Activity</span></div>
		<div class="body">
			<table style="width:95%;margin:0 auto;">
				<tr>
					<th width="25%">Username</th>
					<th width="15%">IP</th>
					<th width="45%">Date</th>
					<th width="15%">Status</th>
				</tr>
				{login_data}
				<tr>
					<td width="25%">{username}</td>
					<td width="15%"><span>{ip}</span></td>
					<td width="45%">{date}</td>
					<td width="15%"><span>{status}</span></td>
				</tr>
				{/login_data}
			</table>
		</div>
		<div class="bottom"></div>
	</div>-}{/login}
</div>
<div class="body-bottom"></div>
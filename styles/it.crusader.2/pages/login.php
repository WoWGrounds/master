<div class="body-title">Member's Login</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=Caution - <span>Already Logged in</span>-}Member's Login{/login}</div>
		<div class="body">
			{login=<p>Sorry! You are already logged in!</p>-}
			<p>All login sessions will remain active for 24 hours, or until you logout.</p>
			<table style="margin:0 auto;"><form action="" method="POST">
				<tr><td>Username:</td> <td><input type="text" class="minput" name="username" AutoComplete="off"></td> <td></td></tr>
				<tr><td>Password:</td> <td><input type="password" class="minput" name="password" AutoComplete="off"></td> <td></td></tr>
				<tr><td></td> <td align="center"><input type="submit" class="msub" name="login" value="Login"> <a href="?page=forgot">Forgot Password</a> </form></td> <td></td>
			</table>
			{/login}
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div class="body-bottom"></div>
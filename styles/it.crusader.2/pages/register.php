<div class="body-title">Account Registration</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=Caution - <span>Already Logged In</span>-}Caution - <span>You must fill all fields below</span>{/login}</div>
		<div class="body">
			{login=
			<p>You are already logged in! You need to be logged out to register a new account. To do so, <a href="./?page=logout">click here</a>.</p>-}
			<p>By registering an account, you agree to be bound by our terms and conditions.</p><br />
			<table style="margin:0 auto;"><form action="" method="POST">
				<tr><td>Username:</td> <td><input type="text" name="username" AutoComplete="off"></td></tr>
				<tr><td>Password:</td> <td><input type="password" name="password" AutoComplete="off"></td></tr>
				<tr><td>Email:</td> <td><input type="email" name="email" AutoComplete="off"></td></tr>
				<tr><td><input type="hidden" name="valid" value="{abot_valid}">{abot}:</td>
				<td><input type="text" name="abot" AutoComplete="off"></td></tr>
				<tr><td></td> <td align="center"><input type="submit" name="create" value="Create Account"></td></tr>
			</form></table>{/login}
			<p style="text-align:center">{login=-}{register}{/login}</p>
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div class="body-bottom"></div>
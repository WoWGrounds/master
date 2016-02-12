<div class="body-title">{login=Donate-}404 Site Error: Login Error{/login}</div>
<div class="body-body">
	<!-- BOX -->
	<div class="box">
		<div class="title">{login=Donate To Help Our Server. $1.00 USD = 1 Point.-}Caution - <span>Connection Required</span>{/login}</div>
		<div class="body">
		{login=
			<table style="margin:0 auto;"><form name="_xclick" action="https://{paypal_url}/cgi-bin/webscr" method="post">
				<tr><td>Amount : </td> <td><input type="text" name="amount"></td></tr>
				<tr>
					<td>
	                    <input type="hidden" name="cmd" value="_xclick">
	                    <input type="hidden" name="custom" value="{session}">
	                    <input type="hidden" name="currency_code" value="{paypal_currency}">
	                    <input type="hidden" name="item_name" value="Donation">
	                    <input type="hidden" name="item_number" value="00011113478">
	                    <input type="hidden" name="business" value="{paypal_email}">
	                    <input type="hidden" name="return" value="{paypal_return}">
	                    <input type="hidden" name="cancel_return" value="{paypal_return}">
					</td>
					<td></td>
				</tr>
				<tr><td></td> <td align="center"><input type="submit" value="Donate"></td></tr>
			</form></table>-}
		<p>You must login to access this page and donate.</p>{/login}
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div class="body-bottom"></div>
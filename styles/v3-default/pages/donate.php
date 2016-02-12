{login=
<!-- News/Page System -->
                <div class="title-bar">
                  <div class="tspace">
                    Donate
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                    <center>
                    Donate To Help Our Server.<br/>$1.00 USD = 1 Point. 
                    <table align="center"><form name="_xclick" action="https://{paypal_url}/cgi-bin/webscr" method="post">
                    <tr><td>Amount:</td> <td><input type="text" name="amount" id="login" class="minput" AutoComplete="off"></td></tr>
                    <tr><td>
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="custom" value="{session}">
                    <input type="hidden" name="currency_code" value="{paypal_currency}">
                    <input type="hidden" name="item_name" value="Donation">
                    <input type="hidden" name="item_number" value="00011113478">
                    <input type="hidden" name="business" value="{paypal_email}">
                    <input type="hidden" name="return" value="{paypal_return}">
                    <input type="hidden" name="cancel_return" value="{paypal_return}">
                    </td>
                    <td>
                    </td></tr>
                    <tr><td></td> <td align="center"><input type="submit" value="Donate" class="msub"></td></tr>
                    </form></table>
                    </center>
                    <br/><br/>
                  </div>
                </div>
<!-- -->
-}
{login_error}
{/login}
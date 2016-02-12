{login=
<!-- News/Page System -->
                <div class="title-bar" id="top">
                  <div class="tspace">
                    Account Panel
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                  {user_data}
                    Username: <b>{session}</b><br/>
                    Email: {email}<br/>
                    Join Date: {joindate}<br/>
                    Site Rank: {user_rank}<br/>
                    Current Ip: {ip}<br/>
                    Last Ip: {last_ip}<br/>
                    Expansion: {expansion}<br/>
                    Vote Points: {vp}<br/>
                    V.I.P Points: {dp}<br/>
                    Banned: {user_banned}<br/>
                  {/user_data}
                  </div>
                </div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar" id="msg">
                  <div class="tspace">
                    Private Message Center
                  </div>
                </div>
                <div class="page-body">
                   <div class="mc">
                     <div class="mc-space">
                       <b><a href="?page=inbox#top">Inbox</a></b> - {new_message} New, {total_message} Total
                     </div>
                   </div>
                   <div class="mc">
                     <div class="mc-space">
                       <b><a href="?page=outbox#top">Outbox</a></b> - {sent_message} Sent
                     </div>
                   </div>
                   <div class="mc">
                     <div class="mc-space">
                       <b><a href="?page=new_message#top">New Message</a></b>
                     </div>
                   </div>
                </div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar" id="pass">
                  <div class="tspace">
                    Change Password
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                     <table><form action="#pass" method="POST">
                      <tr><td>Old Password:</td> <td><input type="password" class="minput" name="opassword" AutoComplete="off"></td> <td></td></tr>
                      <tr><td>New Password:</td> <td><input type="password" class="minput" name="password" AutoComplete="off"></td> <td></td></tr>
                      <tr><td>Confirm New Password:</td> <td><input type="password" class="minput" name="cpassword" AutoComplete="off"></td> <td></td></tr>
                      <tr><td></td> <td align="center"><input type="submit" class="msub" name="chp" value="Change Password"> </form></td> <td></td>
                    </table>
                    {change_password}
                  </div>
                </div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar" id="email">
                  <div class="tspace">
                    Update Email
                  </div>
                </div>
                <div class="page-body">
                  <div class="page-space">
                    <table><form action="#email" method="POST">
                      <tr><td>Password:</td> <td><input type="password" class="minput" name="password" AutoComplete="off"></td> <td></td></tr>
                      <tr><td>New Email:</td> <td><input type="text" class="minput" name="email" AutoComplete="off"></td> <td></td></tr>
                      <tr><td>Confirm New Email:</td> <td><input type="text" class="minput" name="cemail" AutoComplete="off"></td> <td></td></tr>
                      <tr><td></td> <td align="center"><input type="submit" class="msub" name="che" value="Change Email"> </form></td> <td></td>
                    </table>
                    {update_email}
                  </div>
                </div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar" id="char" OnClick="location.href='?page=tool#char'">
                  <div class="tspace">
                    Character Tools
                  </div>
                </div>
                
                <div style="margin-bottom:5px;"></div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar" id="logs">
                  <div class="tspace">
                    Recent Login Activity
                  </div>
                </div>
                <div class="page-body">
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%" align="center">
                        <tr style="font-weight:bold;" align="center"><td width="25%">Username</td> <td width="15%">IP</td> <td width="45%">Date</td> <td width="15%">Status</td></tr>
                      </table>
                    </div>
                  </div>
                    {login_data}
                      <div class="mc">
                        <div class="mc-space">
                          <table width="100%" align="center">
                            <tr align="center"><td width="25%">{username}</td> <td width="15%">{ip}</td> <td width="45%">{date}</td> <td width="15%">{status}</td></tr>
                          </table>
                        </div>
                      </div>
                   {/login_data}
                  </table>
                </div>
<!-- -->
-}
{login_error}
{/login}
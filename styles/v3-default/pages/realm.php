<!-- News/Page System -->
                <div class="title-bar">
                  <div class="tspace">
                    {online_rname}: Top 10 Slayers
                  </div>
                </div>
                <div class="page-body">
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%" align="center">
                        <tr style="font-weight:bold;" align="center"><td width="25%">Name</td> <td width="15%">Level</td> <td width="20%">Race/Class</td> <td width="20%">Total Kills</td> <td width="20%">Kills Today</td></tr>
                      </table>
                    </div>
                  </div>
                    {top_10}
                      <div class="mc">
                        <div class="mc-space">
                          <table width="100%" align="center">
                            <tr align="center"><td width="25%">{name}</td> <td width="15%">{level}</td> <td width="20%"><img src="./styles/global/images/race/{race}-{gender}.gif" border="0"> <img src="./styles/global/images/class/{class}.gif" border="0"></td> <td width="20%">{totalKills}</td> <td width="20%">{todayKills}</td></tr>
                          </table>
                        </div>
                      </div>
                   {/top_10}
                  </table>
                </div>
<!-- -->

<!-- News/Page System -->
                <div class="title-bar">
                  <div class="tspace">
                    {online_rname}: Online Players
                  </div>
                </div>
                <div class="page-body">
                  <div class="mc">
                    <div class="mc-space">
                      <table width="100%" align="center">
                        <tr style="font-weight:bold;" align="center"><td width="25%">Name</td> <td width="25%">Level</td> <td width="25%">Race</td> <td width="25%">Class</td></tr>
                      </table>
                    </div>
                  </div>
                    {online_players}
                      <div class="mc">
                        <div class="mc-space">
                          <table width="100%" align="center">
                            <tr align="center"><td width="25%">{name}</td> <td width="25%">{level}</td> <td width="25%"><img src="./styles/global/images/race/{race}-{gender}.gif" border="0"></td> <td width="25%"><img src="./styles/global/images/class/{class}.gif" border="0"></td></tr>
                          </table>
                        </div>
                      </div>
                   {/online_players}
                  </table>
                </div>
<!-- -->
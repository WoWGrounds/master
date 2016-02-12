<?php if(!defined('ACMS')){ header("Location: ../../../"); }
  #- ChangeLog Module Configuration
    $config_limit = 5; //- Sets limit on how many Shouts will be displayed.
                         //- Default 5
    
  ########################################
  #- Useful Operation Tags:              #
  #-                                     #
  #- Start Tag: {module.shoutbox.data}   #
  #- End Tag: {/module.shoutbox.data}    #
  #- Author Tag: {author}                #
  #- Date Tag: {date}                    #
  #- Body Tag: {body}                    #
  #- Prev Tag: {module.shoutbox.prev}    #
  #- Next Tag: {module.shoutbox.next}    #
  #- JS Include: {module.shoutbox.js}    #
  #- End JS: See Comment A Below         #
  #- Shout: {module.shoutbox.post_shout} #
  #- End Shout: See Comment B Below      #
  ########################################
  
  #- Comment A -#
  // <!-- [END ShoutBox JS Include] {/module.shoutbox.js} [Important Don't Remove] -->
  
  #- Comment B -#
  // <!-- [END ShoutBox Post Function] {/module.shoutbox.shout_post} [Important Don't Remove] -->
  
  #- Changing Shoutbox Refresh Time -#
    # Step 1. Browse to & open: ./core/modules/shoutbox/js/shout.js
    # Step 2. Find: //- var secs = 15; //Seconds for each refresh -\\
    # Step 3. Replace 15 with the number of your choice, (15 = 15 seconds)
    # Step 4. Save & Exit
    
  #- Credits -#
    # Shoutbox Auto Refresh Javascript By: Silver @ Ac-Web.org
      # http://www.ac-web.org/forums/member.php?u=177736
      # http://danniehansen.tumblr.com/
?>
var secs = 15; //Seconds for each refresh
var AwaitingResponse = false;
 
 
setInterval(function () {
    if(AwaitingResponse == false) {
        AwaitingResponse = true;
       
        $.ajax({
            type: "POST",
            dataType: "html",
            data: {},
            url: "./core/modules/shoutbox/shout.php",
            cache: false,
            success: function (data) {
                AwaitingResponse = false;
               
                $("#shout-body").html(data);
            }
        });
    }
}, (secs * 1000));
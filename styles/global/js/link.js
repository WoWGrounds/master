$(document).ready(function(){

 

$("body a").hover(

function() {

$(this).stop().animate({"opacity": "0.9"}, "slow");

},

function() {

$(this).stop().animate({"opacity": "1"}, "slow");

});

 

});
$(function(){
/*
setInterval(socket_time, 1000);
*/
function socket_time(){

$.get( "php/socket_time.php", function( data ) {
  console.log(data);
});


}

$("#allumer").click(function(){

$.ajax({
  method: "POST",
  url: "php/socket.php",
  data: { led: "allumer"},
}).done(function( msg ) {
   reponse=$.parseJSON(msg);
   console.log(reponse);
});

});


$("#eteindre").click(function(){

$.ajax({
  method: "POST",
  url: "php/socket.php",
  data: { led: "eteindre"},
}).done(function( msg ) {
   rep=$.parseJSON(msg);
   console.log(rep);
});

});

});
$(function(){
/*
setInterval(socket_time, 1000);
*/
 
var chart;
var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};



$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab
     
    if ($(this).attr("href") == "#messages") {
        var ctx = $("#myChart").get(0).getContext("2d");
        new Chart(ctx).Line(data);
        $("#home").empty();
        $("#profile").empty();
        $("#settings").empty();
        $("#doner").empty();
    }
 
 
});

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
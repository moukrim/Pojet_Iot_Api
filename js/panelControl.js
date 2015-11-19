  $(function() {
     var chart;
    
    
    var circle = $( "#circle" );
 
    $( "#temp" ).selectmenu({
      change: function( event, data ) {
         nomArduino=$('#liste_plantes option:selected').text();
         typeTemps=$('#temp option:selected').val();
         getStats();
      }
     });

    $( "#liste_plantes" ).selectmenu({
       change: function( event, data ) { 
         circle.css( "background-image", 'url("' + data.item.value + '")');
         nomArduino=$('#liste_plantes option:selected').text();
         typeTemps=$('#temp option:selected').val();
         getStats();
       }
     });
    
function remplirGraph(dataHumidite, dataLumiere, val){
  
  dataHumidite.datasets[0].data.push(val.valHum);
  dataHumidite.labels.push(val.date);
  
  dataLumiere.datasets[0].data.push(val.valLum);
  dataLumiere.labels.push(val.date);
  
  }    
    
function getStats(){
       $.ajax({
            method: "POST",
            url: "../php/getStats.php",
            data: { typeTemps: typeTemps, nomArduino: nomArduino},
          }).done(function( msg ) {
              reponse=$.parseJSON(msg);
              var dataHumidite= graphHumidite();
              var dataLumiere= graphLumiere();
            $.each(reponse, function (ind, val) {
              remplirGraph(dataHumidite, dataLumiere, val);
              });
             navLumiere(dataLumiere); 
             navHumidity(dataHumidite);
             $('a[data-toggle="tab"]').trigger('click');
          });
   }
      
function navHumidity(dataHumidite){
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#humidite") {
        $("#humidite").empty().append('<canvas id="myChart" width="880" height="300"></canvas>');
        var ctx = $("#myChart").get(0).getContext("2d");
        new Chart(ctx).Line(dataHumidite);
        $("#lumiere").empty();

    }
 
 
});
   
}

function navLumiere(dataLumiere){
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#lumiere") {
        $("#lumiere").empty().append('<canvas id="myChartLumiere" width="880" height="300"></canvas>');
        var ctx = $("#myChartLumiere").get(0).getContext("2d");
        new Chart(ctx).Line(dataLumiere);
        $("#humidite").empty();

    }
 
 
});
   
}

function graphHumidite() {
       var data = {
              labels: [],
              datasets: [
                  {
                      label: "My First dataset",
                      fillColor : "rgba(051,051,255,0.2)",
                      strokeColor : "rgba(220,220,220,1)",
                      pointColor : "rgba(153,204,153,1)",
                      pointStrokeColor: "#fff",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(220,220,220,1)",
                      data: []
                  }
              ]
      };
      return data;
}

function graphLumiere() {
       var data = {
              labels: [],
              datasets: [
                  {
                     label: "My First dataset",
                     fillColor : "rgba(051,051,255,0.2)",
                     strokeColor : "rgba(220,220,220,1)",
                     pointColor : "rgba(153,204,153,1)",
                     pointStrokeColor : "#fff",
                     pointHighlightFill : "#fff",
                     pointHighlightStroke : "rgba(220,220,220,1)",
                     data: []
                  }
              ]
      };
      return data;
}

$("#humidite").empty();
$("#lumiere").empty();




  });
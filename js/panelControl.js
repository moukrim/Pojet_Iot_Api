  $(function() {
     var chart;
    
    
    var circle = $( "#circle" );
 
    $( "#temp" ).selectmenu({
      change: function( event, data ) {
      }
     });

    $( "#liste_plantes" ).selectmenu({
       change: function( event, data ) { 
         circle.css( "background-image", 'url("' + data.item.value + '")');
         nomArduino=$('#liste_plantes option:selected').text();
         typeTemps=$('#temp option:selected').val();

         $.ajax({
            method: "POST",
            url: "../php/getStats.php",
            data: { typeTemps: typeTemps, nomArduino: nomArduino},
          }).done(function( msg ) {
             reponse=$.parseJSON(msg);
              var data= graphHumidite();
              var dataLumiere= graphLumiere();
            $.each(reponse, function (ind, val) {
              remplirGraph(data, dataLumiere, val);
              });
             navLumiere(dataLumiere); 
             navHumidity(data);
             $('a[data-toggle="tab"]').trigger('click');
          });
       }
     });
    
function remplirGraph(data, dataLumiere, val){
  
  data.datasets[0].data.push(val.valHum);
  data.labels.push(val.date);
  
  dataLumiere.datasets[0].data.push(val.valLum);
  dataLumiere.labels.push(val.date);
  
  }    
    
function navHumidity(data){
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#humidite") {
        $("#humidite").empty().append('<canvas id="myChart" width="880" height="300"></canvas>');
        var ctx = $("#myChart").get(0).getContext("2d");
        new Chart(ctx).Line(data);
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
                      fillColor: "rgba(220,220,220,0.2)",
                      strokeColor: "rgba(220,220,220,1)",
                      pointColor: "rgba(220,220,220,1)",
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
                      fillColor: "rgba(220,220,220,0.2)",
                      strokeColor: "rgba(220,220,220,1)",
                      pointColor: "rgba(220,220,220,1)",
                      pointStrokeColor: "#fff",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(220,220,220,1)",
                      data: []
                  }
              ]
      };
      return data;
}

$("#humidite").empty();
$("#lumiere").empty();




  });
  $(function() {
    var chart;
    var circle = $( "#circle" );
    
     $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#verifHumidite") {
        $.get("../php/verifHumidite.php", function (data) {
            array= $.parseJSON(data);
            if (array.length > 0) {
               
                $.each(array, function (ind, value) {
                  $("#verifHumidite").empty().append('<div class="alert alert-danger" role="alert">\
                                                <p>La plante '+value.nom+' sur l\'arduino '+value.nomArduino+' a besoin d\'eau!!!</p>\
                                             </div>\
                                             ');
              });
                console.log(data);
            }else{
               $("#verifHumidite").empty().append('<div class="alert alert-success" role="alert">\
                                                <p>Toutes les plantes ont suffisement d\'eau!!!</p>\
                                             </div>\
                                             ');
               console.log("empty");
            }
        });
        
        $("#lumiere").empty();
        $("#humidite").empty();
    }
});
 
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
        $("#lumiere").empty();
        $("#verifHumidite").empty();  
        $("#humidite").empty().append('<canvas id="myChart" width="880" height="300"></canvas>');
        var ctx = $("#myChart").get(0).getContext("2d");
        new Chart(ctx).Line(dataHumidite);
        //$("#lumiere").empty();
        //$("#verifHumidite").empty();

    }
 
 
});
   
}

function navLumiere(dataLumiere){
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#lumiere") {
        $("#humidite").empty();
        $("#verifHumidite").empty();
        $("#lumiere").empty().append('<canvas id="myChartLumiere" width="880" height="300"></canvas>');
        var ctx = $("#myChartLumiere").get(0).getContext("2d");
        new Chart(ctx).Line(dataLumiere);
        //$("#humidite").empty();
      //  $("#verifHumidite").empty();

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



  });
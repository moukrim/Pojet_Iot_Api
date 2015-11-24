  $(function() {
    var chart;
    var circle = $( "#circle" );
    
  
    $( "#temp" ).selectmenu({
      change: function( event, data ) {
             $("#verifHumidite").hide();
         nomArduino=$('#liste_plantes option:selected').text();
         typeTemps=$('#temp option:selected').val();
         getStats();
      }
     });

    $( "#liste_plantes" ).selectmenu({
       change: function( event, data ) {
         $("#verifHumidite").hide();
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
             nav(dataLumiere,dataHumidite); 
           //  navHumidity(dataHumidite);
             $('a[data-toggle="tab"]').trigger('click');
  
          });
   }

 $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     $("#verifHumidite").hide();
  });
function nav(dataLumiere,dataHumidite){
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     $("#verifHumidite").hide();
     e.target; // newly activated tab  
     if ($(this).attr("href") == "#lumiere") {
        console.log("lumiere");
        $("#lumiere").empty().append('<canvas id="myChartLumiere" width="880" height="300"></canvas>');
        var ctx = $("#myChartLumiere").get(0).getContext("2d");
        new Chart(ctx).Line(dataLumiere);
        $("#humidite").empty();
  
    }else if ($(this).attr("href") == "#humidite") {
          console.log("humidite");
        $("#humidite").empty().append('<canvas id="myChart" width="880" height="300"></canvas>');
        var ctx = $("#myChart").get(0).getContext("2d");
        new Chart(ctx).Line(dataHumidite);
        $("#lumiere").empty();
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

  $("#button1").click(function(){
      $("li").removeClass("active");
      $("#verifHumidite").show();
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
  });

 

  });
$(function(){

    $.get("../php/selectPlante.php", function (data) {
        resultats = $.parseJSON(data);
      
        $.each(resultats, function (ind, val) {
            $("#liste_plantes").append('\
                                        <option value="'+val.image+'">'+val.nomArduino+'</option>\
                                    ');   
        });
        console.log(resultats);

    });
    
    
});
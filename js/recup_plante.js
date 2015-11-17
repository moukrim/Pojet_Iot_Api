$(function(){
    
    $.get("../php/selectPlante.php", function (data) {

        resultats = $.parseJSON(data);
        $.each(resultats, function (ind, val) {
            $(".liste_plante").append('\
                <h1 class="page-header"></h1>\
                <div class="row">\
				<div class="col-md-7">\
                    <form action="../front/stats.php" method="post" >\
                        <input type="hidden" name="'+val.nomArduino+'"/>\
                        <a href="#" onclick="document.forms[0].submit();">\
                            <img class="img-responsive" src="'+val.image+'" alt="">\
                        </a>\
                    </form>\
				</div>\
				<div class="col-md-5">\
					<h3>'+val.nom+'</h3>\
					<h4>Subheading</h4>\
                    <p>testtest</p>\
					<a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>\
				</div>\
			</div>\
                ');
                
        });
        console.log(resultats);

    });
    
    
    
});
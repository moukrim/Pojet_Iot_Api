$(function(){
    
    $.get("../php/selectPlante.php", function (data) {

        resultats = $.parseJSON(data);
        $.each(resultats, function (ind, val) {
            $(".liste_plante").append('\
                <div class="row">\
				<div class="col-md-7">\
					<a href="#">\
						<img class="img-responsive" src="'+val.image+'" alt="">\
					</a>\
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
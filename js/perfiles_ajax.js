$(function(){

// Hace la Busqueda de los Examenes
  $.post('../php/autocompletaperfil.php', function(data){
    $('#nom_exa').attr('data-source',data);
  });

	$(".btn-agregar-examen").off("click");
	$(".btn-agregar-examen").on("click", function(e) {
		var datos = $("#nom_exa").val();
    var separada = datos.split("|");
    var id_exa = separada[0];
    var nombre_exa = separada[1];

		$.ajax({
			url: '../php/Controlador/OrdenControllerPerfil.php?page=1',
			type: 'post',
			data: {'nombre_exa':nombre_exa, 'id_exa':id_exa},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$("#nom_exa").val('');

				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalleperfil.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".eliminar-examen").off("click");
	$(".eliminar-examen").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../php/Controlador/OrdenControllerPerfil.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalleperfil.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".guardar-orden").off("click");
	$(".guardar-orden").on("click", function(e) {
		var perfil_id = $('#perfil_id').val();
		var descripcion_per =  $('#descripcion_per').val();
		var precio_per =  $('#precio_per').val();


		$.ajax({
			url: '../php/Controlador/OrdenControllerPerfil.php?page=3',
			type: 'post',
			data: {'perfil_id':perfil_id,'descripcion_per':descripcion_per,'precio_per':precio_per},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$("#descripcion_per").val('');
				$('#precio_per').val('');
				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalleperfil.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

});

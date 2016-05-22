$(function(){


	$(".btn-agregar-examen").off("click");
	$(".btn-agregar-examen").on("click", function(e) {
		var datos = $("#nom_exa").val();
    var separada = datos.split("|");
    var id_exa = separada[0];
    var nombre_exa = separada[1];
    var precio_exa = separada[2];

		$.ajax({
			url: '../php/Controlador/OrdenController.php?page=1',
			type: 'post',
			data: {'nombre_exa':nombre_exa, 'id_exa':id_exa, 'precio_exa':precio_exa},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$("#nom_exa").val('');

				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".eliminar-examen").off("click");
	$(".eliminar-examen").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../php/Controlador/OrdenController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".guardar-orden").off("click");
	$(".guardar-orden").on("click", function(e) {
		var paciente_id = $('#paciente_id').val();
		var medico_id = $('#medico_id').val();
		var fecha_ord =  $('#fecha_ord').val();
		var urgente_ord =  $('#urgente_ord').val();
		var observaciones_ord =  $('#observaciones_ord').val();
		var total_ord =  $('#total_ord').val();

		$.ajax({
			url: '../php/Controlador/OrdenController.php?page=3',
			type: 'post',
			data: {'paciente_id':paciente_id,'medico_id':medico_id,'fecha_ord':fecha_ord,'urgente_ord':urgente_ord,'observaciones_ord':observaciones_ord,'total_ord':total_ord},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$("#nom_exa").val('');
				$('#bpacientes').val('');
				$('#bmedicos').val('');
				$('#nombre_pac').text('');
				$('#telefono_pac').text('');
				$('#direccion_pac').text('');
				$('#observaciones_ord').val('');
				alertify.success(data.msj);
				$(".detalle-examenes").load('../php/detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

});

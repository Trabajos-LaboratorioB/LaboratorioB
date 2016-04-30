$(document).ready(function() {
  $('#registro').submit(function() {

    $.post('../php/rexamenes.php', {
        descripcion_exa: $('#nombre').val(),
        tipo_exa: $('#tipo').val(),
        precio_exa: $('#precio').val(),
        observaciones_exa: $('#nombre').val(),
      },

      function(res) {
        if (res.resp === 'true' ) {
          	alertify.success('Examenes Registrado Con Exito...');
          $('#registro').trigger('reset');

        } else {
          	alertify.error('El Examenes no se Pudo Regstrar...');
        }
      }

    );

    return false;

  });

});

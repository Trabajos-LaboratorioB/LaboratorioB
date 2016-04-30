$(document).ready(function() {

  // var fechana = new Date();
  //
  // $('#fechana').datepicker();

  // $('#fechana').focusout(function(){
  //   $('#edad').val();
  // });

  $('#registro').submit(function() {
    var cedula = $('#cond').val() + "-" + $('#cedula').val();
    var nombre = $('#nombre').val() + " " + $('#apellido').val();
    $.post('../php/rpacientes.php', {
        cedula: cedula,
        nombre: nombre,
        edad: $('#edad').val(),
        fechana: $('#fechana').val(),
        sexo: $('#sexo').val(),
        ocupacion: $('#ocupacion').val(),
        telefono: $('#telefono').val(),
        direccion: $('#direccion').val(),
        referencia: $('#referencia').val(),

      },

      function(res) {
        if (res.resp === 'true') {
          alert('Paciente Registrado Con Exito...');
          $('#registro').trigger('reset');

        } else {
          alert('El Paciente no se Pudo Regstrar...');
        }
      }

    );

    return false;

  });

});

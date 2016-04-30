$(document).ready(function() {

  $('#registro').submit(function() {
    var cedula = $('#cond').val() + "-" + $('#cedula').val();
    var celular = $('#cod').val() + "-" + $('#celular').val();
    $.post('../php/rusuarios.php', {
        usuario: $('#usuario').val(),
        pass: $('#pass').val(),
        apellido: $('#apellido').val(),
        nombre: $('#nombre').val(),
        cedula: cedula,
        fechana: $('#fechana').val(),
        fregistro: $('#fregistro').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        celular: celular,
        email: $('#email').val(),

      },

      function(res) {
        if (res.resp === 'true') {
          	alertify.error('Usuario Registrado Con Exito...');
          $('#registro').trigger('reset');

        } else {
          	alertify.error('El Usuario no se Pudo Regstrar...');
        }
      }

    );

    return false;

  });

});

$(document).ready(function() {

  $('#page-wrapper').load('panel_control.php');
    //Registrar Pacientes
  $('#rpacientes').click(function() {
    $('#page-wrapper').load('rpacientes.html');
  });

  $('#rusuarios').click(function() {
    $('#page-wrapper').load('rusuarios.html');
  });
    //Listar Pacinetes

  // $('#tablapac2').click(function() {
  //   $('#page-wrapper').load('tablapacientes2.html');
  // });

  $('#tablapacphp2').click(function() {
    $('#page-wrapper').load('tablapacientes2.php');
  });

  // $('#tablapac').click(function() {
  //   $('#page-wrapper').load('tablapacientes.php');
  // });

  // $('#tablajack').click(function() {
  //   $('#page-wrapper').load('tablaexamenes.html');
  // });

  // $('#tablaexam').click(function() {
  //   $('#page-wrapper').load('tablaexamenes.php');
  // });

  $('#rexamenes').click(function() {
    $('#page-wrapper').load('rexamenes.html');
  });

  $('#tablaexamphp2').click(function() {
    $('#page-wrapper').load('tablaexamenes2.php');
  });

  $('#cargarorden').click(function() {
    $('#page-wrapper').load('ordenes.php');
  });

  $('#cargarperfil').click(function() {
    $('#page-wrapper').load('perfiles.php');
  });

  $('#tablaord').click(function() {
    $('#page-wrapper').load('tablaordenes.php');
  });

  $('#tablaresul').click(function() {
    $('#page-wrapper').load('tablaresultados.php');
  });

  $('#tablausu').click(function() {
    $('#page-wrapper').load('tablausuarios.php');
  });

  // $('#tablaexa2').click(function() {
  //   $('#page-wrapper').load('tablaexamenes2.php');
  // });

  // $('#editpress').click(function() {
  //   $('#page-wrapper').load('tablaexamenes.php');
  // });




});

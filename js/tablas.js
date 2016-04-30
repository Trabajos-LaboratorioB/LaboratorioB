$(document).ready(function() {


$('#tablaexamenes').DataTable();
$('#tablaordenes').DataTable();
$('#tablapacientes').DataTable();
$('#tablausuarios').DataTable();
$('#tablaresultados').DataTable();

$('#addpac').click(function() {
  $('#page-wrapper').load('rpacientes.html');
});

$('#addexa').click(function() {
  $('#page-wrapper').load('rexamenes.html');
});

$('#addord').click(function() {
  $('#page-wrapper').load('ordenes.php');
});
$('#addusu').click(function() {
  $('#page-wrapper').load('rusuarios.html');
});
} );




































function actualizarexa(str){
    var examen_id = str;
    var descripcion_exa = $('#descripcion_exa'+str).val();
    var precio_exa = $('#precio_exa'+str).val();
    var tipo_exa = $('#tipo_exa'+str).val();

    var datos = "descripcion_exa="+descripcion_exa+"&precio_exa="+precio_exa+"&tipo_exa="+tipo_exa;

    $.ajax({
      type:"POST",
      url: "../php/actualizarexa.php?examen_id="+examen_id,
      data: datos
    }).done(function(data){
        //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
            $('#alerta').html(data);
            //Coloco un retraso de algunos segundos para que se recarge la Pagina
        setTimeout(function(){
            $('#page-wrapper').load('tablaexamenes.php');
        },1000);

      });
}


function eliminarexa(str){
    var examen_id = $('#examen_id'+str).val();
    var datos = "examen_id="+examen_id;
    var mensaje = 'Desea Eliminar el Examen '+examen_id+' ?';

        if(confirm(mensaje)==true){
          $.ajax({
            type:"POST",
            url: "../php/eliminarexa.php?examen_id="+examen_id,
            data: datos
          }).done(function(data){
            //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
            $('#alerta').html(data);
            //Coloco un retraso de algunos segundos para que se recarge la Pagina
            setTimeout(function(){
              $('#page-wrapper').load('tablaexamenes.php');
            },1000);
          });
        }




};



function actualizarpac(str){
    var paciente_id = str;
    var ced = $('#ced'+str).val();
    var cedula = $('#cedula'+str).val();
    var nombre_pac = $('#nombre_pac'+str).val();
    var cedula_pac = ced+'-'+cedula;
    var direccion_pac = $('#direccion_pac'+str).val();
    var fechanac_pac = $('#fechanac_pac'+str).val();
    var telcel_pac = $('#telcel_pac'+str).val();

    var datos = "nombre_pac="+nombre_pac+"&cedula_pac="+cedula_pac+"&direccion_pac="+direccion_pac+"&fechanac_pac="+fechanac_pac+"&telcel_pac="+telcel_pac;

    $.ajax({
      type:"POST",
      url: "../php/actualizarpac.php?paciente_id="+paciente_id,
      data: datos
      }).done(function(data){
        //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
            $('#alerta').html(data);
            //Coloco un retraso de algunos segundos para que se recarge la Pagina
        setTimeout(function(){
            $('#page-wrapper').load('tablapacientes.php');
        },1000);

      });

};

function eliminarpac(str){
  var nombre_pac = $('#nombre_pac'+str).val();
    var paciente_id = $('#paciente_id'+str).val();
    var datos = "paciente_id="+paciente_id;
    var mensaje = 'Desea Eliminar el Paciente '+nombre_pac+' ?';

        if(confirm(mensaje)==true){
          $.ajax({
            type:"POST",
            url: "../php/eliminarpac.php?paciente_id="+paciente_id,
            data: datos
          }).done(function(data){
            //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
            $('#alerta').html(data);
            //Coloco un retraso de algunos segundos para que se recarge la Pagina
            setTimeout(function(){
              $('#page-wrapper').load('tablapacientes.php');
            },1000);
          });
        }




};

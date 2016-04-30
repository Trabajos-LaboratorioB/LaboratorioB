function setPaciente(idpac,nompac,pacnac,cedpac,dirpac,fecpac,telpac){
  paciente_id = idpac;
  nombre_pac = nompac;
  cedula_pacnac = pacnac;
  cedula_pac = cedpac;
  direccion_pac = dirpac;
  fechanac_pac = fecpac;
  telcel_pac = telpac;
}
function getPaciente(){
  return paciente_id;
}
function getNombre(){
  return nombre_pac;
}
function getCedulanac(){
  return cedula_pacnac;
}
function getCedula(){
  return cedula_pac;
}
function getDireccion(){
  return direccion_pac;
}
function getFechanac(){
  return fechanac_pac;
}
function getTelcel(){
  return telcel_pac;
}


$(document).ready(function(){

  var paciente_id;
  var nombre_pac;
  var cedula_pac;
  var direccion_pac;
  var fechanac_pac;
  var telcel_pac;

    $('#BodyPacientes').on('click','.aPaciente',function(){
      // alert($(this).data('pacienteid'));

      setPaciente($(this).data('pacienteid'),$(this).data('nombrepac'),$(this).data('cedulapacnac'),$(this).data('cedulapac'),$(this).data('direccionpac'),$(this).data('fechanac'),$(this).data('telcelpac'));
      $('#page-wrapper').load('pacientes.html');
      });

      // $('#Pac_ID').val(getCita);
      $('#paciente_id').val(getPaciente);
      $('#nombre_pac').val(getNombre);
      $('#cedula_pacnac').val(getCedulanac);
      $('#cedula_pac').val(getCedula);
      $('#direccion_pac').val(getDireccion);
      $('#fechanac_pac').val(getFechanac);
      $('#telcel_pac').val(getTelcel);



    $('#editarPac').on('click','.ActPac',function(){
        var pac = $('#paciente_id').val();
        var nom = $('#nombre_pac').val();
        var cednac = $('#cedula_pacnac').val();
        var ced = $('#cedula_pac').val();
        var dir = $('#direccion_pac').val();
        var fec = $('#fechanac_pac').val();
        var tel = $('#telcel_pac').val();
        var cedula = cednac+"-"+ced;

        var datos = "nombre_pac="+nom+"&cedula_pac="+cedula+"&direccion_pac="+dir+"&fechanac_pac="+fec+"&telcel_pac="+tel;

            $.ajax({
              type:"POST",
              url: "../php/actualizarpac.php?paciente_id="+pac,
              data: datos
            }).done(function(data){
              $('#alerta').html(data);
              setTimeout(function(){
                $('#page-wrapper').load('tablapacientes2.php');
              },1000);
            });
      // alert(pac+"-"+nom+"-"+cedula+"-"+dir+"-"+fec+"-"+tel);

    });

    $('#BodyPacientes').on('click','.ePaciente',function(){

      var pac = $(this).data('pacienteid');
      var nom = $(this).data('nombrepac');

      var datos = "paciente_id="+pac;
      var mensaje = "Desea Eliminar a "+nom+" ?";

      if(confirm(mensaje)==true){
        $.ajax({
          type:"POST",
          url: "../php/eliminarpac.php?paciente_id="+pac,
          data: datos
        }).done(function(data){
          //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
          $('#alerta').html(data);
          //Coloco un retraso de algunos segundos para que se recarge la Pagina
          setTimeout(function(){
            $('#page-wrapper').load('tablapacientes2.php');
          },1000);
        });
      }

      // alert($(this).data('pacienteid'));
      // alert($(this).data('nombrepac'));
      });


});

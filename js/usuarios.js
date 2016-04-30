function setUsuario(idusu,usu,cla,car,nomusu,apeusu,cedusu,fecnacusu,fecingusu,dirusu,teleusu,celusu,emailusu,adm,estusu){
  // Capturo los datos para luego pasarlos a donde yo quiera en un panel
  usuario_id=idusu;
  usuario=usu;
  clave=cla;
  cargo=car;
  nombre_usu=nomusu;
  apellido_usu=apeusu;
  cedula_usu=cedusu;
  fechanac_usu=fecnacusu;
  fechaing_usu=fecingusu;
  direccion_usu=dirusu;
  telefono_usu=teleusu;
  celular_usu=celusu;
  email_usu=emailusu;
  admin=adm;
  estado_usu=estusu;
}

// obtengo el valor individual de cada vvariable para imprimiarla luego en cada campo
function getIdUsuario(){
  return usuario_id;
}
function getUsuario(){
  return usuario;
}
function getClave(){
  return clave;
}
function getCargo(){
  return cargo;
}
function getNombre(){
  return nombre_usu;
}
function getApellido(){
  return apellido_usu;
}
function getCedula(){
  return cedula_usu;
}
function getFechaNac(){
  return fechanac_usu;
}
function getFechaIng(){
  return fechaing_usu;
}
function getDireccion(){
  return direccion_usu;
}
function getTelefono(){
  return telefono_usu;
}
function getCelular(){
  return celular_usu;
}
function getEmail(){
  return email_usu;
}
function getAdmin(){
  return admin;
}
function getEstado(){
  return estado_usu;
}

$(document).ready(function(){

// cuanddo hago click en el boton de la  datatable paso los obtengo los datos del elemento que presiones los paso a un panel donde serran editados
    $('#BodyUsuarios').on('click','.aUsuario',function(){

      //  alert($(this).data('examenid'));

      setUsuario($(this).data('usuarioid'),$(this).data('usuario'),$(this).data('clave'),$(this).data('cargo'),$(this).data('nombreusu'),$(this).data('apellidousu'),$(this).data('cedulausu'),$(this).data('fechanacusu'),$(this).data('fechaingusu'),$(this).data('direccionusu'),$(this).data('telefonousu'),$(this).data('celularusu'),$(this).data('emailusu'),$(this).data('admin'),$(this).data('estadousu'));
      // cargo la proxima pagina con llos datos capturados
      $('#page-wrapper').load('usuarios.php');
    });

// asigno a cada campo de texto los valores capturados
    $('#usuario_id').val(getIdUsuario);
    $('#usuario').val(getUsuario);
    $('#clave').val(getClave);
    $('#cargo').val(getCargo);
    $('#nombre_usu').val(getNombre);
    $('#apellido_usu').val(getApellido);
    $('#cedula_usu').val(getCedula);
    $('#fechanac_usu').val(getFechaNac);
    $('#fechaing_usu').val(getFechaIng);
    $('#direccion_usu').val(getDireccion);
    $('#telefono_usu').val(getTelefono);
    $('#celular_usu').val(getCelular);
    $('#email_usu').val(getEmail);
    $('#admin').val(getAdmin);
    $('#estado_usu').val(getEstado);

// construyo un evento al dar click al boton Actualizar
    $('#editarUsu').on('click','.ActUsu',function(){
      // capturoo los datos de cada campo en la nueva pagina en panel
      var idusu = $('#usuario_id').val();
      var usu = $('#usuario').val();
      var cla = $('#clave').val();
      var car = $('#cargo').val();
      var nom = $('#nombre_usu').val();
      var ape = $('#apellido_usu').val();
      var cedusu = $('#cedula_usu').val();
      var fecnacusu = $('#fechanac_usu').val();
      var fecingusu = $('#fechaing_usu').val();
      var dirusu = $('#direccion_usu').val();
      var teleusu = $('#telefono_usu').val();
      var celusu = $('#celular_usu').val();
      var emausu = $('#email_usu').val();
      var admin = $('#admin').val();
      var estusu = $('#estado_usu').val();

// conncateno todos los datos en una variable para pasarlos por ajax
      var datos = "usuario="+usu+"&clave="+cla+"&cargo="+car+"&nombre_usu="+nom+"&apellido_usu="+ape+"&cedula_usu="+cedusu+"&fechanac_usu="+fecnacusu+"&fechaing_usu="+fecingusu+"&direccion_usu="+dirusu+"&telefono_usu="+teleusu+"&celular_usu="+celusu+"&email_usu="+emausu+"&admin="+admin+"&estado_usu="+estusu;

      $.ajax({
        type:"POST",
        url: "../php/actualizarusu.php?usuario_id="+idusu,
        data: datos
      }).done(function(data){
        $('#alerta').html(data);
        setTimeout(function(){
          $('#page-wrapper').load('tablausuarios.php');
        },1000);
      });
    });

// contruyo en evento al dar click al boton Eliminar en el datatable
    $('#BodyUsuarios').on('click','.eUsuario',function(){
// capturo el valor del del registro al que le di click
      var idusu = $(this).data('usuarioid');
      var datos = "usuario_id="+idusu;
      var mensaje = "Desea Eliminar el Examen "+idusu+" ?";

// si confirmo el alerta lo elimino
      if(confirm(mensaje)==true){
        $.ajax({
          type:"POST",
          url: "../php/eliminarusu.php?usuario_id="+idusu,
          data: datos
        }).done(function(data){
          //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
          $('#alerta').html(data);
          //Coloco un retraso de algunos segundos para que se recarge la Pagina
          setTimeout(function(){
            $('#page-wrapper').load('tablausuarios.php');
          },1000);
        });
      }
      // alert($(this).data('examenid'));

    });


  });

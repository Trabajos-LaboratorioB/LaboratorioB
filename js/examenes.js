function setExamen(idexa,desexa,preexa,tipexa){
  // Capturo los datos para luego pasarlos a donde yo quiera en un panel
  examen_id=idexa;
  descripcion_exa=desexa;
  precio_exa=preexa;
  tipo_exa=tipexa;
}

// obtengo el valor individual de cada vvariable para imprimiarla luego en cada campo
function getIdExamen(){
  return examen_id;
}
function getDescripcion(){
  return descripcion_exa;
}
function getPrecio(){
  return precio_exa;
}
function getTipo(){
  return tipo_exa;
}

$(document).ready(function(){

// cuanddo hago click en el boton de la  datatable paso los obtengo los datos del elemento que presiones los paso a un panel donde serran editados
    $('#BodyExamenes').on('click','.aExamen',function(){

      //  alert($(this).data('examenid'));

      setExamen($(this).data('examenid'),$(this).data('descripcionexa'),$(this).data('precioexa'),$(this).data('tipoexa'));
      // cargo la proxima pagina con llos datos capturados
      $('#page-wrapper').load('examenes.html');
    });

// asigno a cada campo de texto los valores capturados
    $('#examen_id').val(getIdExamen);
    $('#descripcion_exa').val(getDescripcion);
    $('#precio_exa').val(getPrecio);
    $('#tipo_exa').val(getTipo);

// construyo un evento al dar click al boton Actualizar
    $('#editarExa').on('click','.ActExa',function(){
      // capturoo los datos de cada campo en la nueva pagina en panel
      var exa = $('#examen_id').val();
      var des = $('#descripcion_exa').val();
      var pre = $('#precio_exa').val();
      var tip = $('#tipo_exa').val();

// conncateno todos los datos en una variable para pasarlos por ajax
      var datos = "descripcion_exa="+des+"&precio_exa="+pre+"&tipo_exa="+tip;

      $.ajax({
        type:"POST",
        url: "../php/actualizarexa.php?examen_id="+exa,
        data: datos
      }).done(function(data){
        $('#alerta').html(data);
        setTimeout(function(){
          $('#page-wrapper').load('tablaexamenes2.php');
        },1000);
      });
    });

// contruyo en evento al dar click al boton Eliminar en el datatable
    $('#BodyExamenes').on('click','.eExamen',function(){
// capturo el valor del del registro al que le di click
      var exa = $(this).data('examenid');
      var datos = "examen_id="+exa;
      var mensaje = "Desea Eliminar el Examen "+exa+" ?";

// si confirmo el alerta lo elimino
      if(confirm(mensaje)==true){
        $.ajax({
          type:"POST",
          url: "../php/eliminarexa.php?examen_id="+exa,
          data: datos
        }).done(function(data){
          //muestro el mensaje para que se mantenga sobre la Table Antes de que se Recargue la Pagina
          $('#alerta').html(data);
          //Coloco un retraso de algunos segundos para que se recarge la Pagina
          setTimeout(function(){
            $('#page-wrapper').load('tablaexamenes2.php');
          },1000);
        });
      }
      // alert($(this).data('examenid'));

    });


  });

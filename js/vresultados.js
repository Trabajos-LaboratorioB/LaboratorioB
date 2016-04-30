function setResultado(idord,cedpac,nompac,telpac,dirpac,obsord,fecord,urgord,totord){
  // Capturo los datos para luego pasarlos a donde yo quiera en un panel
  orden_id=idord;
  cedula_pac=cedpac;
  nombre_pac=nompac;
  telcel_pac=telpac;
  direccion_pac=dirpac;
  observaciones_ord=obsord;
  fecha_ord=fecord;
  urgente_ord=urgord;
  total_ord=totord;
}

// obtengo el valor individual de cada vvariable para imprimiarla luego en cada campo
function getIdOrden(){
  return orden_id;
}
function getCedulaPac(){
  return cedula_pac;
}
function getNombrePac(){
  return nombre_pac;
}
function getTelefonoPac(){
  return telcel_pac;
}
function getDireccionPac(){
  return direccion_pac;
}
function getObservaciones(){
  return observaciones_ord;
}
function getFechaOrd(){
  return fecha_ord;
}
function getUrgenteOrd(){
  return urgente_ord;
}
function getTotalOrd(){
  return total_ord;
}

$(document).ready(function(){

// cuanddo hago click en el boton de la  datatable paso los obtengo los datos del elemento que presiones los paso a un panel donde serran editados
    $('#BodyResultados').on('click','.vResultados',function(){

      //  alert($(this).data('examenid'));

      setResultado($(this).data('ordenid'),$(this).data('cedulapac'),$(this).data('nombrepac'),$(this).data('telcel'),$(this).data('direccionpac'),$(this).data('observacionesord'),$(this).data('fechaord'),$(this).data('urgenteord'),$(this).data('totalord'));
      // cargo la proxima pagina con llos datos capturados
      $('#page-wrapper').load('Resultados/vresultados.php');
    });

// asigno a cada campo de texto los valores capturados
    $('#orden_id').text(getIdOrden);
    $('#nombre_pac').text(getNombrePac);
    $('#cedula_pac').text(getCedulaPac);
    $('#telcel_pac').text(getTelefonoPac);
    $('#direccion_pac').text(getDireccionPac);
    $('#fecha_ord').text(getFechaOrd);
    $('#urgente_ord').text(getUrgenteOrd);
    $('#observaciones_ord').text(getObservaciones);
    $('#total_ord').text(getTotalOrd);


  });

  $(document).ready(function(){
    $.ajaxSetup({ cache: false });
       function fetch_data()
       {
         var orden_id = $("#orden_id").text();
            $.ajax({
                 url:"../pages/Resultados/selectvResultado.php?orden_id="+orden_id,
                 data: {'orden_id' : orden_id},
                 method:"POST",
                 success:function(data){
                      $('#live_data').html(data);
                 }
            });
       }
       fetch_data();


       function edit_data(id, text, column_name)
       {
            $.ajax({
                 url:"../pages/Resultados/editResultados.php",
                 method:"POST",
                 data:{id:id, text:text, column_name:column_name},
                 dataType:"json",
                 cache: false
            });
            //  .done(function(data){
            //   if(data.success == true){
            //   alertify.success(data.msj);
            //   }
            // });
            // success:function(data){
            //   alertify.success(data.msj);
            // }
       }

       $(document).on('blur', '.resultadoexa_ordet', function(){
         $.ajaxSetup({ cache: false });
            var id = $(this).data("id1");
            var text = $(this).text();
            edit_data(id, text, "resultadoexa_ordet");
       });


  });

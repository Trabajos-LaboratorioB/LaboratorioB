$(document).ready(function(){

      // limpia los datos del Paciente
      $('#limpiarpac').click(function(){
        $('#bpacientes').val('');
        $('#nombre_pac').text('');
        $('#telefono_pac').text('');
        $('#direccion_pac').text('');
        $('#observaciones_ord').val('');
      });

      // limpia los datos del cliente
      $('#limpiarcli').click(function(){
        $('#bclientes').val('');
        $('#nombre_cli').text('');
        $('#telefono_cli').text('');
        $('#rif_cli').text('');
      });

      $('#bpacientes').focusout(function(){
        var cedula = $('#bpacientes').val();
        $.post('../php/getPaciente.php',{
          cedula: cedula
        },

        function(resServer){

          if(resServer.res === 'true'){

              $('#nombre_pac').text(resServer[0].nombre_pac);
              $('#telefono_pac').text(resServer[0].telcel_pac);
              $('#direccion_pac').text(resServer[0].direccion_pac);
              $('#paciente_id').val(resServer[0].paciente_id);
              $('#bpacientes').val(resServer[0].cedula_pac);

          }else {


            alertify.error('El Pasientes no Existe o el Campo esta Vacio!!');
          }
        }
      );

      });

      $('#bclientes').focusout(function(){
        var rif = $('#bclientes').val();
        $.post('../php/getCliente.php',{
          rif: rif
        },

        function(resServer){

          if(resServer.res === 'true'){
            $('#rif_cli').text(resServer[0].rif_cli);
            $('#nombre_cli').text(resServer[0].nombre_cli);
            $('#telefono_cli').text(resServer[0].telefono_cli);
            $('#cliente_id').val(resServer[0].cliente_id);
          }else {
            alert('Debe Registrar al Cliente...');
          }
        }
      );

      });

      $.post('../php/autocompleta.php', function(data){
        $('#nom_exa').attr('data-source',data);
      });
      $.post('../php/autocompleta_pac.php', function(data){
        $('#bpacientes').attr('data-source',data);
      });

      $('#addpac').click(function() {
        $('#page-wrapper').load('rpacientes.html');
      });
});

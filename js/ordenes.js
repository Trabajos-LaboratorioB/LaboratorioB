$(document).ready(function(){

      // limpia los datos del Paciente
      $('#limpiarpac').click(function(){
        $('#bpacientes').val('');
        $('#nombre_pac').text('');
        $('#telefono_pac').text('');
        $('#direccion_pac').text('');
        $('#observaciones_ord').val('');
        $('#bmedicos').val('');
        $('#paciente_id').val('');
        $('#medico_id').val('');
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


            alertify.error('El Pasiente no Existe o el Campo esta Vacio!!');
          }
        }
      );

      });

      $('#bmedicos').focusout(function(){
        var nombre_med = $('#bmedicos').val();
        $.post('../php/getMedico.php',{
          nombre_med: nombre_med
        },

        function(resServer){

          if(resServer.res === 'true'){
            $('#medico_id').val(resServer[0].medico_id);
            $('#nombre_med').val(resServer[0].nombre_med);

          }else {
            alertify.error('El Medico no existe o el Campo esta Vacio!!');
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

      $.post('../php/autocompleta_med.php', function(data){
        $('#bmedicos').attr('data-source',data);
      });

      $('#addpac').click(function() {
        $('#page-wrapper').load('rpacientes.html');
      });
});

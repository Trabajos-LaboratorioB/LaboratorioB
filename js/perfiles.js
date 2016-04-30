$(document).ready(function(){


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

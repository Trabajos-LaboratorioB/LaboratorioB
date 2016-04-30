$(document).ready(function(){

  $('#login').submit(function(){
    event.preventDefault();
      $.post('../php/autenticar.php',
      {
        usuario:$('#usuario').val(),
        clave:$('#clave').val()
      },
    function(respuesta){
      if(respuesta.res=='true'){
        alert('Bienvenido...');
        window.open('index.html','_self');
      }else{
        alert('El usuario no existe...');
      }
    }

  );
  });
});

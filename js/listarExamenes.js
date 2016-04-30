
$(document).ready(function(){


  $.post('../php/tablaexamenes.php',function(res){
  
  for(pac in res){
      //var nombre=res[pac].apellido_pac+' '+res[pac].nombre_pac;
      $('#TablaExam').append('<tr class="gradeX">'+
      '<td>'+res[pac].examen_id+'</td>'+
      '<td>'+res[pac].descripcion_exa+'</td>'+
      '<td>'+res[pac].precio_exa+'</td>'+
      '<td>'+res[pac].tipo_exa+'</td>'+
      '<td><a href="#" data-idexa="'+res[pac].examen_id+'"data-descripcion="'+res[pac].descripcion_exa+'"data-precio="'+res[pac].precio_exa+'"data-tip="'+res[pac].tipo_exa+'" "class="aExac" >'+
      '<img  src="images/editar.png" width="30" heigth="30"></a>'+
      '<a href="#"><img  src="images/eliminar.png" width="30" heigth="30"></a>'+
      '</td>'+
      '</tr>');
    }


  });

  $('#TablaExam').on('click','.aExac',function(){
    alert("Entrando a Editar el Examen");
    setPac($(this).data('idexa'),$(this).data('descripcion'),$(this).data('precio'),$(this).data('tip'));
    $('#page-wrapper').load('eExamenes.html');


  });

});

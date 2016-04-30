<?php
  sleep(3);
  $salidaJSON=array(
    'respuesta'=>'DONE',
    'mensaje'=>'Se Proceso la Peticioion',
    'contenido'=>'Prueba se Cargo el Examen'
  );
  echo json_encode($salidaJSON);
 ?>

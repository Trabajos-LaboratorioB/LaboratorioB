<?php
//
// $variables = ("Renier,Maria,jose");
//
// $datos = explode(",",$variables);


require_once ('conexion.php');

$conexion = dbConnect();
$consulta = "select examen_id, descripcion_exa from examenes";
$registro = mysqli_query($conexion, $consulta);

$i = 0;
$registros = "";

  while ($row = mysqli_fetch_array($registro))
  {
      $registros.= $row['examen_id'].' | '.$row['descripcion_exa'].',';
      $i++;
  }

  $datos = explode(',',$registros);


  echo json_encode($datos);


 ?>

<?php
//
// $variables = ("Renier,Maria,jose");
//
// $datos = explode(",",$variables);


require_once ('conexion.php');

$conexion = dbConnect();
$consulta = "select cedula_pac from pacientes";
$registro = mysqli_query($conexion, $consulta);

$i = 0;
$registros = "";

  while ($row = mysqli_fetch_array($registro))
  {
      $registros.= $row['cedula_pac'].',';
      $i++;
  }

  $datos = explode(',',$registros);


  echo json_encode($datos);


 ?>

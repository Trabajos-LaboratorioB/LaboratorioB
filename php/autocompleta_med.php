<?php
//
// $variables = ("Renier,Maria,jose");
//
// $datos = explode(",",$variables);


require_once ('conexion.php');

$conexion = dbConnect();
$consulta = "select nombre_med from medicos";
$registro = mysqli_query($conexion, $consulta);

$i = 0;
$registros = "";

  while ($row = mysqli_fetch_array($registro))
  {
      $registros.= $row['nombre_med'].',';
      $i++;
  }

  $datos = explode(',',$registros);


  echo json_encode($datos);


 ?>

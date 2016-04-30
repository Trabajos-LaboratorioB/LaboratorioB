<?php
require_once ('conexion.php');

$conexion = dbConnect();
$consulta = "select * from pacientes";
$registro = mysqli_query($conexion, $consulta);

$i = 0;
$tabla = "";

  while ($row = mysqli_fetch_array($registro))
  {
      $tabla.= '{
        "nombre_pac": "'.$row['nombre_pac'].'",
        "cedula_pac": "'.$row['cedula_pac'].'",
        "direccion_pac": "'.$row['direccion_pac'].'",
        "fechanac_pac": "'.$row['fechanac_pac'].'",
        "telcel_pac": "'.$row['telcel_pac'].'"
      },';
      $i++;
  }
  $tabla = substr($tabla, 0 , strlen($tabla) - 1);

  echo '{"data" : ['.$tabla.']}';

 ?>

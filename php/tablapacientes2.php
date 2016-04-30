
<?php
require_once ('conexion.php');

$conexion = dbConnect();
$consulta = "select paciente_id, nombre_pac, cedula_pac, direccion_pac, fechanac_pac, telcel_pac from pacientes";
$registro = mysqli_query($conexion, $consulta);

$i = 0;
$tabla = "";

  while ($row = mysqli_fetch_array($registro))
  {
    // $pac = "'.$row['paciente_id'].'"
    // $editar = '<a href=\"#\"  onclick =\"\" class=\"btn btn-sm fa fa-cube\"></a>';
    // $editar = '<a href=\"index.html?pac='.$row['paciente_id'].'\" onclick=\"editar('.$row['paciente_id'].')\" class=\"btn btn-primary btn-outline  btn-circle btn-sm\"><span class=\"fa fa-cogs \"></span></a>';
    $editar = '<a href=\"#\" name=\"Accion\" onclick=\"editar('.$row['paciente_id'].')\" class=\"btn btn-primary btn-outline  btn-circle btn-sm\"><span class=\"fa fa-cogs \"></span></a>';
    $borrar = '<a class=\"btn btn-danger btn-outline btn-circle btn-sm\"><span class=\"fa fa-times \"></span></a>';

      $tabla.= '{
        "nombre_pac": "'.$row['nombre_pac'].'",
        "cedula_pac": "'.$row['cedula_pac'].'",
        "direccion_pac": "'.$row['direccion_pac'].'",
        "fechanac_pac": "'.$row['fechanac_pac'].'",
        "telcel_pac": "'.$row['telcel_pac'].'",
        "acciones": "'.$editar.' '.$borrar.'"
      },';
      $i++;
  }
  $tabla = substr($tabla, 0 , strlen($tabla) - 1);

  echo '{"data" : ['.$tabla.']}';

 ?>

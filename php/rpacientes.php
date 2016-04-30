<?php
require_once 'conexion.php';
$conn=dbConnect();

$exa = mysqli_query($conn, 'SELECT paciente_id FROM pacientes ORDER BY paciente_id DESC LIMIT 1');
$var1="";

while($row = mysqli_fetch_array($exa)){
  $var1=$row['paciente_id'];
}
  if ($var1!=0) {
    $var1++;
  }

$paciente_id=$var1;
$fk_empresa_id='1';
$fk_genero_id=$_REQUEST['sexo'];
$fechanac_pac=$_REQUEST['fechana'];
$nombre_pac=$_REQUEST['nombre'];
$cedula_pac=$_REQUEST['cedula'];
$direccion_pac=$_REQUEST['direccion'];
$telcel_pac=$_REQUEST['telefono'];
$estado_pac='A';
//
// $paciente_id=$var1;
// $fk_empresa_id='1';
// $fk_genero_id='1';
// $fechanac_pac='1991-02-28';
// $nombre_pac='Jackson Martinez';
// $cedula_pac='V-20367668';
// $direccion_pac='San Cristobal';
// $telcel_pac='4126418585 ';
// $estado_pac='A';

$res= array();
$con=dbConnect();

//Iniciamos el Metodo de Insert para registrar los datos en la BD



$query=mysqli_query($con,'INSERT INTO pacientes (paciente_id, fk_empresa_id, fk_genero_id, fechanac_pac, nombre_pac, cedula_pac, direccion_pac, telcel_pac, estado_pac) '
        . ' VALUES("'.$paciente_id.'","'.$fk_empresa_id.'","'.$fk_genero_id.'","'.$fechanac_pac.'","'.$nombre_pac.'","'.$cedula_pac.'","'.$direccion_pac.'","'.$telcel_pac.'","'.$estado_pac.'")');

if($query) {
  $res['resp']='true';//si no hay error
}
else {
    $res['resp']='false';//si hay error
}
//lo de abajo es para darle respuesta al llamado del JS
header('Content-type: application/json; charset=utf-8');
echo json_encode($res);


 ?>

<?php
require_once 'conexion.php';
$conn=dbConnect();

$exa = mysqli_query($conn, 'SELECT examen_id FROM examenes ORDER BY examen_id DESC LIMIT 1');
$var1="";

while($row = mysqli_fetch_array($exa)){
  $var1=$row['examen_id'];
}
  if ($var1!=0) {
    $var1++;
  }

$examen_id=$var1;
$fk_empresa_id='1';
$descripcion_exa=$_REQUEST['descripcion_exa'];
$precio_exa=$_REQUEST['precio_exa'];
$tipo_exa=$_REQUEST['tipo_exa'];
$observaciones_exa=$_REQUEST['observaciones_exa'];
$estado_exa='A';

// $examen_id=$var1;
// $fk_empresa_id='1';
// $descripcion_exa='Prueba';
// $precio_exa='20000';
// $tipo_exa='Drogas';
// $observaciones_exa='Prueba';
// $estado_exa='A';

$res= array();
$con=dbConnect();

//Iniciamos el Metodo de Insert para registrar los datos en la BD



$query=mysqli_query($con,'INSERT INTO examenes (examen_id, fk_empresa_id, descripcion_exa, precio_exa, tipo_exa, observaciones_exa, estado_exa) '
        . ' VALUES("'.$examen_id.'","'.$fk_empresa_id.'","'.$descripcion_exa.'","'.$precio_exa.'","'.$tipo_exa.'","'.$observaciones_exa.'","'.$estado_exa.'")');

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

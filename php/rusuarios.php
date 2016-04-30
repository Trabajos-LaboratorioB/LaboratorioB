<?php
require_once 'conexion.php';
$conn=dbConnect();

$exa = mysqli_query($conn, 'SELECT usuario_id FROM usuarios ORDER BY usuario_id DESC LIMIT 1');
$var1="";

while($row = mysqli_fetch_array($exa)){
  $var1=$row['usuario_id'];
}
  if ($var1!=0) {
    $var1++;
  }

$usuario_id=$var1;
$fk_empresa_id='1';
$fk_cargo_id='1';
$usuario=$_REQUEST['usuario'];
$clave=$_REQUEST['pass'];
$apellido_usu=$_REQUEST['apellido'];
$nombre_usu=$_REQUEST['nombre'];
$cedula_usu=$_REQUEST['cedula'];
$fechanac_usu=$_REQUEST['fechana'];
$fechaing_usu=$_REQUEST['fregistro'];
$direccion_usu=$_REQUEST['direccion'];
$telefono_usu=$_REQUEST['telefono'];
$celular_usu=$_REQUEST['celular'];
$email_usu=$_REQUEST['email'];
$admin='A';
$estado_usu='A';
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

$query=mysqli_query($con,'INSERT INTO usuarios (usuario_id, fk_empresa_id, fk_cargo_id, usuario, clave, apellido_usu, nombre_usu, cedula_usu, fechanac_usu, fechaing_usu, direccion_usu, telefono_usu, celular_usu, email_usu, admin, estado_usu) '
        . ' VALUES("'.$usuario_id.'","'.$fk_empresa_id.'","'.$fk_cargo_id.'","'.$usuario.'","'.$clave.'","'.$apellido_usu.'","'.$nombre_usu.'","'.$cedula_usu.'","'.$fechanac_usu.'","'.$fechaing_usu.'","'.$direccion_usu.'","'.$telefono_usu.'","'.$celular_usu.'","'.$email_usu.'","'.$admin.'","'.$estado_usu.'")');

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

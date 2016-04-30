<?php
require_once 'conexion.php';

$usuario=$_REQUEST['usuario'];
$clave=$_REQUEST['clave'];

// $usuario="jalemaro";
// $clave="123";


$res= array();

$conexion=dbConnect();
//aquói el insert
$query=mysqli_query($conexion,'SELECT * FROM usuarios WHERE usuario="'.$usuario.'" AND clave="'.$clave.'"');

if($query) {
  if (mysqli_num_rows($query) > 0) {

      $res['res'] = 'true';
      while ($buffer = mysqli_fetch_array($query)) {
          array_push($res, $buffer);
      }
  } else {
      $res['res'] = 'false';
  }
}
else {
    $res['res']='no va';//si hay error
}
//lo de abajo es para darle respuesta al llamado del JS
header('Content-type: application/json; charset=utf-8');
echo json_encode($res);

 ?>

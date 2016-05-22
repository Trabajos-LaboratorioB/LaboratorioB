<?php
require_once 'conexion.php';

$nombre_med=$_POST['nombre_med'];

//$cedula='V-20367668';

$res= array();

$con=dbConnect();
$query=mysqli_query($con,'SELECT * FROM medicos WHERE nombre_med = "'.$nombre_med.'" ');

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
    $res['res']='false';
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($res);


 ?>

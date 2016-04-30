<?php
require_once 'conexion.php';

$res= array();

$con=dbConnect();
$query=mysqli_query($con,'SELECT * FROM examenes');

if($query) {
  if (mysqli_num_rows($query) > 0) {


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

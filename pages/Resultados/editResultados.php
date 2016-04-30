<?php
include ("../../php/conexion.php");
$conexion = dbConnect();

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$json = array();
$json ['msj'] = "Actualizado!!";
$json ['success'] = true;

$sql = "UPDATE ordendetalle SET ".$column_name."='".$text."', proceso_ordet = 'C' WHERE ordendet_id='".$id."' ";
mysqli_query($conexion, $sql);
// if(mysqli_query($conexion, $sql))
// {
//
//     $json['success'] = true;
//     echo json_encode($json);
// }
?>

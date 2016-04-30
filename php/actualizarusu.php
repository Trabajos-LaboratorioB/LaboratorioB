<?php
require_once ('conexion.php');


$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$cargo = $_POST['cargo'];
$nombre_usu = $_POST['nombre_usu'];
$apellido_usu = $_POST['apellido_usu'];
$cedula_usu = $_POST['cedula_usu'];
$fechanac_usu = $_POST['fechanac_usu'];
$fechaing_usu = $_POST['fechaing_usu'];
$direccion_usu = $_POST['direccion_usu'];
$telefono_usu = $_POST['telefono_usu'];
$celular_usu = $_POST['celular_usu'];
$email_usu = $_POST['email_usu'];
$admin = $_POST['admin'];
$estado_usu = $_POST['estado_usu'];

$usuario_id = $_GET['usuario_id'];

$conexion = dbConnect();

$sql= "UPDATE usuarios set usuario='$usuario', clave='$clave', fk_cargo_id='$cargo', apellido_usu='$apellido_usu', nombre_usu='$nombre_usu', cedula_usu='$cedula_usu', fechanac_usu='$fechanac_usu', fechaing_usu='$fechaing_usu', direccion_usu='$direccion_usu', telefono_usu='$telefono_usu', celular_usu='$celular_usu', email_usu='$email_usu', admin='$admin', estado_usu='$estado_usu' WHERE usuario_id='$usuario_id' ";
$query = mysqli_query($conexion, $sql);

if($query){
  ?>
    <!-- Muestro una Barra simpre de Progreso animada cuando la Actualizacion de los Datos es Exitosa -->
  <div id="loader" class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  <sttrong><em>ACTUALIZANDO REGISTRO</em></strong>
    <span class="sr-only"><strong>ACTUALIZANDO REGISTRO</strong></span>

</div>


  <!-- <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Exito!!</strong>Se actualizaron los datos del examen <a href="#" id="recargarexa" class="alert-link">Recargar Pagina!!</a>.
  </div> -->
  <?php
} else {
  ?>
  <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Error!!</strong>No se actualizaron los datos!<a href="#" id="recargarexa" class="alert-link">Recargar Pagina!!</a>.
  
  </div>
  <?php
}
   ?>

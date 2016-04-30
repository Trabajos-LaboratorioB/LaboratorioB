<?php
require_once ('conexion.php');


$nombre_pac = $_POST['nombre_pac'];
$cedula_pac = $_POST['cedula_pac'];
$direccion_pac = $_POST['direccion_pac'];
$fechanac_pac = $_POST['fechanac_pac'];
$telcel_pac = $_POST['telcel_pac'];
$paciente_id = $_GET['paciente_id'];

$conexion = dbConnect();

$sql= "UPDATE pacientes set nombre_pac='$nombre_pac', cedula_pac='$cedula_pac', direccion_pac='$direccion_pac' , fechanac_pac='$fechanac_pac', telcel_pac='$telcel_pac' WHERE paciente_id='$paciente_id' ";
$query = mysqli_query($conexion, $sql);

if($query){
  ?>
    <!-- Muestro una Barra simpre de Progreso animada cuando la Actualizacion de los Datos es Exitosa -->
  <div id="loader" class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  <strong><em>ACTUALIZANDO REGISTRO</em></strong>
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

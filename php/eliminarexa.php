<?php
require_once ('conexion.php');

$examen_id = $_GET['examen_id'];

$conexion = dbConnect();

$sql= "DELETE FROM examenes WHERE examen_id='$examen_id' ";
$query = mysqli_query($conexion, $sql);

if($query){
  ?>
    <!-- Muestro una Barra simpre de Progreso animada cuando la Actualizacion de los Datos es Exitosa -->
  <div id="loader" class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  <sttrong><em>REGISTRO ELIMINADO ACTUALIZANDO TABLA</em></strong>
    <span class="sr-only"><strong>REGISTRO ELIMINADO ACTUALIZANDO TABLA</strong></span>
</div>
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

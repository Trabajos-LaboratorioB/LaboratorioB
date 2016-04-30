<?php
session_start();
$_SESSION['detalle'] = array();

// Pequeña consulta para traer la fecha actual del sistema
include ("../php/conexion.php");
$conexion = dbConnect();
$sqldate ="SELECT CURRENT_DATE() as fecha";
$resultDate = mysqli_query($conexion, $sqldate);
$dato = mysqli_fetch_array($resultDate);
$fecha = $dato['fecha'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cargar Perfiles</title>

    <!-- <link href="../datepicker/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script> -->


    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="../alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../alertify/lib/alertify.min.js"></script>

  </head>
  <body>

        <div class="col-lg-12">
            <h1 class="page-header"> Nueva Perfil Medico
              <!-- <button id="addpac" class="btn btn-info" type="button">Nuevo Perfil <i class="fa fa-plus"></i> -->
            </h1>

        </div>
        <!-- /.col-lg-12 -->



    <div class="row">
        <div class="col-lg-6">

          <label>Descripcion del Perfil:</label>
            <div class="form-group">
                <input type="hidden" name="perfil_id" id="perfil_id">
              <input required  placeholder="Nombre del Perfil" size="50px" type="text" class="form-control  span3" id="descripcion_per" name="descripcion_per" >
              <!-- <span class="input-group-btn">
                <button id="limpiarpac" class="btn btn-default" type="button"><i class="fa fa-trash-o"></i>
              </span> -->
            </div>
          </div>

            <div class="col-lg-6">


            <label>Precio Total del Perfil:</label>
              <div class="form-group">

                  <input  class="form-control" type="text" name="precio_per" id="precio_per" disabled>

                </div>
              </div>

  </div>

      <div class="row">
          <div class="col-md-2">
            <label>Buscar Examenes: </label>
          </div>
          <div class="col-md-6">

            <input class="form-control span3" id="nom_exa" name="nom_exa" data-provide="typeahead" placeholder="Nombre del Examen" size="50px" type="text">
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-outline btn-success btn-sm btn-agregar-examen">Agregar Examen <li class="fa fa-plus-square-o "></li></button>

          </div>
      </div>
          <br>
          <div class="panel panel-primary" >
            <div class="panel-heading text-center">
              Examenes Registrados al Perfil
            </div>
            <div class="panel-body detalle-examenes">
              <br>
            No hay Examenes agregados
<input type="hidden" name="total_ord" id="total_ord" value="">
            </div>
          </div>


<div class="row" align="center">
  <button type="button" class="btn btn-outline btn-success guardar-orden">Registrar Orden</button>
</div>



    <script src="../js/jquery.js"></script>
    <script src="../less/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="../js/perfiles.js"></script> -->
      <script type="text/javascript" src="../js/perfiles_ajax.js"></script>

  </body>
</html>

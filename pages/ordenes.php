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
    <title>Cargar Ordenes</title>

    <!-- <link href="../datepicker/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script> -->


    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="../alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../alertify/lib/alertify.min.js"></script>

  </head>
  <body>

        <div class="col-lg-12">
            <h1 class="page-header"> Nueva Orden Medica
              <button id="addpac" class="btn btn-info" type="button">Nuevo Paciente <i class="fa fa-plus"></i>
            </h1>

        </div>
        <!-- /.col-lg-12 -->



    <div class="row">
        <div class="col-lg-6">

          <label>Buscar Paciente:</label>
            <div class="form-group input-group">
                <input type="hidden" name="paciente_id" id="paciente_id">
              <input required  placeholder="N° de Cedula" size="50px" type="text" class="form-control  span3" data-provide="typeahead" id="bpacientes" name="bpacientes" >
              <span class="input-group-btn">
                <button id="limpiarpac" class="btn btn-default" type="button"><i class="fa fa-trash-o"></i>
              </span>
            </div>
          </div>

            <div class="col-lg-3">


            <label>Fecha de la Orden:</label>
              <div class="form-group">

                  <input value="<?php echo $fecha?>" class="form-control" type="date" name="fecha_ord" id="fecha_ord">

                </div>
              </div>

                <!-- <input type="text" class="datepicker form-control" id="fecha_ord" name="fecha_ord" >
                <script type="text/javascript">
                    $(function() {
                      $('.datepicker').datepicker({
                          format: 'yyyy-mm-dd'
                        });
                    });
                </script> -->
                  <div class="col-lg-3">
                    <label>Prioridad</label>
                  <select class="form-control" name="urgente_ord" id="urgente_ord">
                    <option value="Normal">Normal</option>
                    <option value="Urgente">Urgente</option>
                  </select>
                </div>

  </div>

<div class="row">

      <div class="col-lg-6">

            <div class="panel panel-info">
                <div class="panel-heading">
                    Datos del Paciente

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                Nombre:
                <label id="nombre_pac" class="control-label" for="nombre_pac"></label>
                <br>
                Telefono:
                <label id="telefono_pac" class="control-label" for="telefono_pac"> </label>
                <br>
                Direccion:
                <label id="direccion_pac" class="control-label" for="direccion_pac"> </label>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

          </div>
        <!-- /.col-lg-6 -->


<div class="col-lg-6">


            <div class="panel panel-info">
                <div class="panel-heading">
                    Observaciones de la orden
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <textarea class="form-control" name="observaciones_ord" id="observaciones_ord" rows="3" cols="50"></textarea>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

          </div>
        <!-- /.col-lg-6 -->
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

            <button type="button" class="btn btn-outline btn-primary btn-sm btn-agregar-perfil" >Agregar Perfil <li class="fa fa-plus-square-o "></li></button>
          </div>
      </div>
          <br>
          <div class="panel panel-primary" >
            <div class="panel-heading text-center">
              Examenes Registrados a la Orden Medica
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
    <script type="text/javascript" src="../js/ordenes.js"></script>
      <script type="text/javascript" src="../js/ordenes_ajax.js"></script>

  </body>
</html>

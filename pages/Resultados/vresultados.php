
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <title>Cargar Resultados</title>

    <!-- <link href="../datepicker/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script> -->


    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="../alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../alertify/lib/alertify.min.js"></script>

  </head>
  <body>

        <div class="col-lg-12">
            <h1 class="page-header"> Cargar Resultados de la Orden <label id="orden_id" for="orden_id"></label>
              <!-- <button id="addpac" class="btn btn-info" type="button">Nuevo Paciente <i class="fa fa-plus"></i> -->
            </h1>

        </div>
        <!-- /.col-lg-12 -->



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
                Cedula:
                <label id="cedula_pac" class="control-label" for="cedula_pac"></label>
                <br>
                Telefono:
                <label id="telcel_pac" class="control-label" for="telcel_pac"> </label>
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
                    Datos de la Orden
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                Fecha de la Orden:
                <label id="fecha_ord" class="control-label" for="fecha_ord"></label>
                <br>
                Prioridad:
                <label id="urgente_ord" class="control-label" for="urgente_ord"></label>
                <br>
                Observaciones de la Orden:
                <label id="observaciones_ord" class="control-label" for="observaciones_ord"> </label>
                <br>
                Monto de la Orden:
                <label id="total_ord" class="control-label" for="total_ord"> </label>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

          </div>
        <!-- /.col-lg-6 -->
    </div>

          <br>
          <div class="panel panel-primary" >
            <div class="panel-heading text-center">
              Examenes Registrados a la Orden Medica
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                   <div id="live_data"></div>
              </div>
            </div>
          </div>

          <div class="imprimir" align ="center">
            <button type="button" class="vResultados btn btn-outline btn-success">Imprimir</button>
          </div>

<!-- <div class="row" align="center">
  <button type="button" class="btn btn-outline btn-success guardar-orden">Registrar Orden</button>
</div> -->



    <script src="../js/jquery.js"></script>
    <script src="../less/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/vresultados.js"></script>

  </body>
</html>

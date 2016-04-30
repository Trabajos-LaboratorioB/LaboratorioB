<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labiomed</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


   <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
   <link href="../bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
<!-- <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->


   <script type="text/javascript" languaje="javascript" src="../bower_components/datatables/media/js/jquery.js"></script>
  <script type="text/javascript" languaje="javascript" src="../js/tablas.js"></script>
  <!-- <script type="text/javascript" languaje="javascript" src="../js/bootbox.min.js"></script> -->
  <!-- <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script> -->
  <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


</head>
<body>
<?php
include ("../php/conexion.php");
$conexion = dbConnect();
$consulta = "SELECT B.orden_id,
C.cedula_pac,
C.nombre_pac,
C.telcel_pac,
C.direccion_pac,
B.observaciones_ord,
B.fecha_ord,
B.urgente_ord,
COUNT(ordendet_id) as detalles_exa,
IF(A.proceso_ordet = 'P' , 'Pendiente' , 'Listo') as estado_ord,
A.proceso_ordet,
B.total_ord
from ordendetalle A , ordenes B , pacientes C
WHERE A.fk_orden_id = B.orden_id
AND B.fk_paciente_id = C.paciente_id
GROUP BY A.fk_orden_id, A.proceso_ordet;";
// $consulta = "SELECT * from ordenes";
$registro = mysqli_query($conexion, $consulta);


?>
<!-- <div class="container"> -->


  <div class="table-responsive col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Registrar Resultados
          <!-- <button id="addord" class="btn btn-info" type="button">Nueva Orden <i class="fa fa-plus"></i> -->
        </h1>
        <div id="alerta"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Datos de las Ordenes Registradas
          </div>


          <div class="panel-body table-responsive">
            <div class="dataTable_warpper table-responsive col-lg-12">
              <table id="tablaresultados" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>ID de Orden</th>
                    <th>Paciente</th>
                    <th>Fecha de orden</th>
                    <th>Cant. Examenes</th>
                    <th>Estado de Resultados</th>
                  </tr>
                </thead>
                <!-- Defino un Id a la tabla para capturar los datos id="BodyExamenes" -->
                    <tbody id="BodyResultados">
                      <?php while($row = mysqli_fetch_array($registro)){ ?>

                      <tr>
                        <td align ="center"><?php echo $row['orden_id']; ?></td>
                        <td align ="center"><?php echo $row['nombre_pac']; ?></td>
                        <td align ="center"><?php echo $row['fecha_ord']; ?></td>
                        <td align ="center"><?php echo $row['detalles_exa']; ?></td>
                        <!-- pequeña validacion para diferencia los estados con botones si esta
                         pendiente deberia darle acceso hace la pantalla de caja para que facture el examen -->
                        <?php

                         if($row['estado_ord'] == "Pendiente"){ ?>
                        <td><button type="button" class="cResultados btn btn-outline btn-danger btn-xs" data-ordenid="<?php echo $row['orden_id'];?>" data-cedulapac="<?php echo $row['cedula_pac'];?>" data-nombrepac="<?php echo $row['nombre_pac'];?>" data-telcel="<?php echo $row['telcel_pac'];?>" data-direccionpac="<?php echo $row['direccion_pac'];?>" data-observacionesord="<?php echo $row['observaciones_ord'];?>" data-fechaord="<?php echo $row['fecha_ord'];?>" data-urgenteord="<?php echo $row['urgente_ord'];?>" data-totalord="<?php echo $row['total_ord'];?>" >Cargar Resultados</button></td>
                        <?php }else{ ?>
                          <td><button type="button" class="vResultados btn btn-outline btn-success btn-xs"  data-ordenid="<?php echo $row['orden_id'];?>" data-cedulapac="<?php echo $row['cedula_pac'];?>" data-nombrepac="<?php echo $row['nombre_pac'];?>" data-telcel="<?php echo $row['telcel_pac'];?>" data-direccionpac="<?php echo $row['direccion_pac'];?>" data-observacionesord="<?php echo $row['observaciones_ord'];?>" data-fechaord="<?php echo $row['fecha_ord'];?>" data-urgenteord="<?php echo $row['urgente_ord'];?>" data-totalord="<?php echo $row['total_ord'];?>">Cargados</button></td>
                          <?php } ?>

                      </tr>

                      <?php } ?>
                    </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<!-- </div> -->


      <!-- DataTables JavaScript -->
      <!-- <script src="../js/examenes.js"></script> -->
      <script src="../js/resultados.js"></script>
      <script src="../js/vresultados.js"></script>
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

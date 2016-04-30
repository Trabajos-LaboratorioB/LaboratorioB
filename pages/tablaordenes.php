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
$consulta = "SELECT o.orden_id, p.nombre_pac ,o.fecha_ord, o.total_ord, o.urgente_ord, o.estado_ord from ordenes o, pacientes p WHERE o.fk_paciente_id = p.paciente_id;";
// $consulta = "SELECT * from ordenes";
$registro = mysqli_query($conexion, $consulta);
?>
<!-- <div class="container"> -->


  <div class="table-responsive col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Ordenes Registradas
          <button id="addord" class="btn btn-info" type="button">Nueva Orden <i class="fa fa-plus"></i>
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
              <table id="tablaordenes" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>ID de Orden</th>
                    <th>Paciente</th>
                    <th>Fecha de orden</th>
                    <th>Monto</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <!-- Defino un Id a la tabla para capturar los datos id="BodyExamenes" -->
                    <tbody id="BodyOrdenes">
                      <?php while($row = mysqli_fetch_array($registro)){ ?>

                      <tr>
                        <td><?php echo $row['orden_id']; ?></td>
                        <td><?php echo $row['nombre_pac']; ?></td>
                        <td><?php echo $row['fecha_ord']; ?></td>
                        <td><?php echo $row['total_ord']; ?></td>
                        <td><?php echo $row['urgente_ord']; ?></td>
                        <!-- pequeña validacion para diferencia los estados con botones si esta
                         pendiente deberia darle acceso hace la pantalla de caja para que facture el examen -->
                        <?php if($row['estado_ord'] == 'Pendiente'){ ?>
                        <td><button type="button" class="btn btn-outline btn-danger btn-xs">Pendiente</button></td>
                        <?php }else{ ?>
                          <td><button type="button" class="btn btn-outline btn-success btn-xs">Pagada</button></td>
                          <?php } ?>
                        <!-- <td>


                          <a class="aExamen btn btn-primary btn-outline btn-circle btn-sm" data-examenid="<?php echo $row['examen_id'];?>" data-descripcionexa="<?php echo $row['descripcion_exa']; ?>" data-precioexa="<?php echo $row['precio_exa']; ?>" data-tipoexa="<?php echo $row['tipo_exa']; ?>" title="Editar Examen"><span class="fa fa-cog " aria-hidden=" true"></span></a>

                          <input type="hidden" id="examen_id<?php echo $row['examen_id']; ?>" name="name" value="<?php echo $row['examen_id']; ?>">
                          <a class="eExamen btn btn-danger btn-outline btn-circle btn-sm" data-examenid="<?php echo $row['examen_id'];?>" title="Eliminar Examen"><span class="fa fa-times " aria-hidden=" true"></span></a>

                        </td> -->
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
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

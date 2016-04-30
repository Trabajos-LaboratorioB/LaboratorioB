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
  <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


</head>
<body>
<?php
include ("../php/conexion.php");
$conexion = dbConnect();
$consulta = "select * from examenes";
$registro = mysqli_query($conexion, $consulta);
?>
<!-- <div class="container"> -->


  <div class="table-responsive col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tabla Examenes
          <button id="addexa" class="btn btn-info" type="button">Nuevo Examen <i class="fa fa-plus"></i>
        </h1>
        <div id="alerta"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Datos de los Examenes Registrados
          </div>


          <div class="panel-body table-responsive">
            <div class="dataTable_warpper table-responsive col-lg-12">
              <table id="tablaexamenes" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>ID Examen</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <!-- Defino un Id a la tabla para capturar los datos id="BodyExamenes" -->
                    <tbody id="BodyExamenes">
                      <?php while($row = mysqli_fetch_array($registro)){ ?>

                      <tr>
                        <td><?php echo $row['examen_id']; ?></td>
                        <td><?php echo $row['descripcion_exa']; ?></td>
                        <td><?php echo $row['precio_exa']; ?></td>
                        <td><?php echo $row['tipo_exa']; ?></td>
                        <td>

                          <!-- le asigno un id a cada boton para que cumplan con una funcion especifica en examenes.js -->
                          <a class="aExamen btn btn-primary btn-outline btn-circle btn-sm" data-examenid="<?php echo $row['examen_id'];?>" data-descripcionexa="<?php echo $row['descripcion_exa']; ?>" data-precioexa="<?php echo $row['precio_exa']; ?>" data-tipoexa="<?php echo $row['tipo_exa']; ?>" title="Editar Examen"><span class="fa fa-cog " aria-hidden=" true"></span></a>

                          <input type="hidden" id="examen_id<?php echo $row['examen_id']; ?>" name="name" value="<?php echo $row['examen_id']; ?>">
                          <a class="eExamen btn btn-danger btn-outline btn-circle btn-sm" data-examenid="<?php echo $row['examen_id'];?>" title="Eliminar Examen"><span class="fa fa-times " aria-hidden=" true"></span></a>

                        </td>
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
      <script src="../js/examenes.js"></script>
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

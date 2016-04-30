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
  <script type="text/javascript" languaje="javascript" src="../js/bootbox.min.js"></script>
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
        <h1 class="page-header">Tabla Examenes</h1>
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
                    <tbody>
                      <?php while($row = mysqli_fetch_array($registro)){ ?>

                      <tr>
                        <td><?php echo $row['examen_id']; ?></td>
                        <td><?php echo $row['descripcion_exa']; ?></td>
                        <td><?php echo $row['precio_exa']; ?></td>
                        <td><?php echo $row['tipo_exa']; ?></td>
                        <td>
                          <a class="btn btn-primary btn-outline btn-circle btn-sm"  data-toggle="modal" data-target="#editarexa<?php echo $row['examen_id']; ?>" title="Editar Examen"><span class="fa fa-cog " aria-hidden=" true"></span></a>
                          <input type="hidden" id="examen_id<?php echo $row['examen_id']; ?>" name="name" value="<?php echo $row['examen_id']; ?>">
                          <a type="button" class="btn btn-danger btn-outline btn-circle btn-sm" onclick="eliminarexa('<?php echo $row['examen_id']; ?>')" title="Eliminar Examen"><span class="fa fa-times " aria-hidden=" true"></span></a>
                          <!-- <a id="deletepress" class="btn btn-danger btn-outline btn-circle btn-sm" onclick="eliminarexa('<?php echo $row['examen_id']; ?>')" title="Eliminar Examen"><span class="fa fa-times " aria-hidden=" true"></span></a> -->
                        </td>
                      </tr>

                      <div class="modal fade" id="editarexa<?php echo $row['examen_id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- encabezado -->
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title"><strong>Actualizar Examen</strong></h4>
                            </div>
                            <!-- cuerpo -->
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="examen_id">Id Examen</label>
                                  <input type="text" class="form-control" id="examen_id<?php echo $row['examen_id']; ?>" value="<?php echo $row['examen_id']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="descripcion_exa">Descripcion</label>
                                  <input type="text" class="form-control" id="descripcion_exa<?php echo $row['examen_id']; ?>" value="<?php echo $row['descripcion_exa']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="precio_exa">Precio</label>
                                  <input type="text" class="form-control" id="precio_exa<?php echo $row['examen_id']; ?>" value="<?php echo $row['precio_exa']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="tipo_exa">Tipo</label>
                                  <input type="text" class="form-control" id="tipo_exa<?php echo $row['examen_id']; ?>" value="<?php echo $row['tipo_exa']; ?>">
                                </div>
                              </form>
                            </div>

                            <!-- footer -->
                            <div class="modal-footer">
                              <button type="button"  class="btn btn-default" data-dismiss="modal">Salir</button>
                            <button type="button" id="editpress" data-dismiss="modal"  onclick="actualizarexa('<?php echo $row['examen_id']; ?>')" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                          </div>
                        </div>
                      </div>

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
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

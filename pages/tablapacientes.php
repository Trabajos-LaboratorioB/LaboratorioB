<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labiomed</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


   <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
   <link href="../bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
   <link href="../dist/css/datepicker.css" rel="stylesheet">

   <script type="text/javascript" languaje="javascript" src="../bower_components/datatables/media/js/jquery.js"></script>
  <script type="text/javascript" languaje="javascript" src="../js/tablas.js"></script>
  <script type="text/javascript" languaje="javascript" src="../dist/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(function(){
      $('.datepicker').datepicker();
    });
</script>

</head>
<body>
<?php
include ("../php/conexion.php");
$conexion = dbConnect();
$consulta = "select * from pacientes";
$registro = mysqli_query($conexion, $consulta);
?>

  <div class="table-responsive col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tabla Pacientes</h1>
        <div id="alerta"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Datos de los Pacientes Registrados
          </div>


          <div class="panel-body">
            <div class="dataTable_warpper table-responsive col-lg-12">
              <table id="tablapacientes" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>Nombre Paciente</th>
                    <th>Cedula</th>
                    <th>Direccion</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($registro)){

                          $cadena_cedula = $row['cedula_pac'];
                          $row_cedula = explode("-",$cadena_cedula);

                        ?>
                      <tr>
                        <td><?php echo $row['nombre_pac']; ?></td>
                        <td><?php echo $row['cedula_pac']; ?></td>
                        <td><?php echo $row['direccion_pac']; ?></td>
                        <td><?php echo $row['fechanac_pac']; ?></td>
                        <td><?php echo $row['telcel_pac']; ?></td>
                        <td>
                          <a class="btn btn-primary btn-outline btn-circle btn-sm"  data-toggle="modal" data-target="#editarpac<?php echo $row['paciente_id']; ?>" title="Editar Paciente"><span class="fa fa-cog " aria-hidden=" true"></span></a>
                            <input type="hidden" id="paciente_id<?php echo $row['paciente_id']; ?>" name="name" value="<?php echo $row['paciente_id']; ?>">
                          <a class="btn btn-danger btn-outline btn-circle btn-sm" title="Eliminar Paciente" onclick="eliminarpac(<?php echo $row['paciente_id']; ?>)"><span class="fa fa-times " aria-hidden=" true"></span></a>
                        </td>
                      </tr>

                      <div class="modal fade" id="editarpac<?php echo $row['paciente_id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- encabezado -->
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title"><strong>Actualizar Paciente</strong></h4>
                            </div>
                            <!-- cuerpo -->
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="nombre_pac">Nombre Paciente</label>
                                  <input type="text" class="form-control" id="nombre_pac<?php echo $row['paciente_id']; ?>" value="<?php echo $row['nombre_pac']; ?>" required>
                                </div>

                                <label for="cedula_pac">Cedula</label>
                                <form class="form-inline">
                                  <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control" id="ced<?php echo $row['paciente_id']; ?>" required>
                                          <option value="V">V</option>
                                          <option value="E">E</option>
                                          <option value="J">J</option>
                                          <option value="G">G</option>
                                        </select>
                                          <div class="input-group-addon">-</div>
                                          <input type="text" class="form-control" id="cedula<?php echo $row['paciente_id']; ?>" value="<?php echo $row_cedula[1]; ?>">
                                    </div>
                                  </div>
                                </form>
                                <div class="form-group">
                                  <label for="descripcion_pac">Direccion</label>
                                  <input type="text" class="form-control" id="direccion_pac<?php echo $row['paciente_id']; ?>" value="<?php echo $row['direccion_pac']; ?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="fechanac_pac">Fecha de Nacimiento</label>
                                  <input type="text" class="form-control" id="fechanac_pac<?php echo $row['paciente_id']; ?>" value="<?php echo $row['fechanac_pac']; ?>" required>
                                </div>


                                    <!-- <div class="input-append date" data-date-format="dd-mm-yyyy">
                                        <input readonly="" type="text" class="datepicker" id="fechanac_pac<?php echo $row['paciente_id']; ?>" value="<?php echo $row['fechanac_pac']; ?>" required>
                                        <span class="add-on"><i class="fa fa-calendar "></i></span>
                                    </div> -->

                                    <!-- <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                      <input class="span2" size="16" type="text" value="12-02-2012">
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div> -->


                                <div class="form-group">
                                  <label for="telcel_pac">Telefono</label>
                                  <input type="text" class="form-control" id="telcel_pac<?php echo $row['paciente_id']; ?>" value="<?php echo $row['telcel_pac']; ?>" required>
                                </div>
                              </form>
                            </div>

                            <!-- footer -->
                            <div class="modal-footer">
                              <button type="button"  class="btn btn-default" data-dismiss="modal">Salir</button>
                            <button type="button" id="editpress" data-dismiss="modal"  onclick="actualizarpac('<?php echo $row['paciente_id']; ?>')" class="btn btn-primary">Guardar Cambios</button>
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



      <!-- DataTables JavaScript -->
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

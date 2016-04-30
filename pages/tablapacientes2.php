<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labiomed</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


   <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
   <link href="../bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">


   <script type="text/javascript" languaje="javascript" src="../bower_components/datatables/media/js/jquery.js"></script>
  <script type="text/javascript" languaje="javascript" src="../js/tablas.js"></script>



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
        <h1 class="page-header">Tabla Pacientes
            <button id="addpac" class="btn btn-info" type="button">Nuevo Paciente <i class="fa fa-plus"></i>
        </h1>
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
                    <tbody id="BodyPacientes">
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

                          <!-- <a class="btn btn-primary btn-outline btn-circle btn-sm"  data-toggle="modal" data-target="#editarpac<?php echo $row['paciente_id']; ?>" title="Editar Paciente"><span class="fa fa-cog " aria-hidden=" true"></span></a> -->
                          <a class="aPaciente btn btn-primary btn-outline btn-circle btn-sm" data-pacienteid="<?php echo $row['paciente_id'];?>" data-nombrepac="<?php echo $row['nombre_pac']; ?>" data-cedulapacnac="<?php echo $row_cedula[0]; ?>" data-cedulapac="<?php echo $row_cedula[1]; ?>" data-direccionpac="<?php echo $row['direccion_pac']; ?>" data-fechanac="<?php echo $row['fechanac_pac'];?>" data-telcelpac="<?php echo $row['telcel_pac']; ?>"  title="Editar Paciente"><span class="fa fa-cog " aria-hidden=" true"></span></a>

                            <input type="hidden" id="paciente_id<?php echo $row['paciente_id']; ?>" name="name" value="<?php echo $row['paciente_id']; ?>">
                          <!-- <a class="ePaciente btn btn-danger btn-outline btn-circle btn-sm" title="Eliminar Paciente" onclick="eliminarpac(<?php echo $row['paciente_id']; ?>)"><span class="fa fa-times " aria-hidden=" true"></span></a> -->
                          <a class="ePaciente btn btn-danger btn-outline btn-circle btn-sm" data-pacienteid="<?php echo $row['paciente_id'];?>" data-nombrepac="<?php echo $row['nombre_pac']; ?>" title="Eliminar Paciente"><span class="fa fa-times " aria-hidden=" true"></span></a>
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
      <!-- DataTables JavaScript -->
      <script src="../js/pacientes.js"></script>
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

</body>
</html>

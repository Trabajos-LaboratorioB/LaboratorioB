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
$consulta = "SELECT u.usuario_id,
			u.usuario,
			u.clave,
			u.nombre_usu,
			u.apellido_usu,
			u.cedula_usu,
			u.fechanac_usu,
			u.fechaing_usu,
			u.direccion_usu,
			u.telefono_usu,
			u.celular_usu,
			c.descripcion_car,
      u.fk_cargo_id,
			u.estado_usu,
			u.email_usu,
			u.admin
FROM usuarios u, cargos c
WHERE u.fk_cargo_id = c.cargo_id; ";
$registro = mysqli_query($conexion, $consulta);
?>
<!-- <div class="container"> -->


  <div class="table-responsive col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tabla Usuarios
          <button id="addusu" class="btn btn-info" type="button">Nuevo Usuario <i class="fa fa-plus"></i>
        </h1>
        <div id="alerta"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Datos de los Usuarios Registrados
          </div>


          <div class="panel-body table-responsive">
            <div class="dataTable_warpper table-responsive col-lg-12">
              <table id="tablausuarios" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>clave</th>
                    <!-- <th>Cargo</th> -->
                    <th>Nombre</th>
                    <!-- <th>Apellido</th> -->
                    <!-- <th>Cedula</th> -->
                    <!-- <th>Fecha de Nacimiento</th> -->
                    <!-- <th>Fecha de Ingreso</th> -->
                    <!-- <th>Direccion</th> -->
                    <!-- <th>Telefono Fijo</th> -->
                    <!-- <th>Telefono Celular</th> -->
                    <th>Email</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                  </tr>
                </thead>
                <!-- Defino un Id a la tabla para capturar los datos id="BodyExamenes" -->
                    <tbody id="BodyUsuarios">
                      <?php while($row = mysqli_fetch_array($registro)){?>

                      <tr>
                        <td><?php echo $row['usuario_id']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo md5($row['clave']); ?></td>
                        <!-- <td><?php echo $row['fk_cargo_id']; ?></td> -->
                        <td><?php echo $row['nombre_usu']; ?></td>
                        <!-- <td><?php echo $row['apellido_usu']; ?></td> -->
                        <!-- <td><?php echo $row['cedula_usu']; ?></td> -->
                        <!-- <td><?php echo $row['fechanac_usu']; ?></td> -->
                        <!-- <td><?php echo $row['fechaing_usu']; ?></td> -->
                        <!-- <td><?php echo $row['direccion_usu']; ?></td> -->
                        <!-- <td><?php echo $row['telefono_usu'];?></td> -->
                        <!-- <td><?php echo $row['celular_usu'];?></td> -->
                        <td><?php echo $row['email_usu']; ?></td>
                        <td><?php echo $row['admin']; ?></td>
                        <td><?php echo $row['estado_usu']; ?></td>
                        <td>
                          <!-- le asigno un id a cada boton para que cumplan con una funcion especifica en examenes.js -->
                          <a class="aUsuario btn btn-primary btn-outline btn-circle btn-sm" data-usuarioid="<?php echo $row['usuario_id'];?>" data-usuario="<?php echo $row['usuario']; ?>" data-clave="<?php echo $row['clave']; ?>" data-cargo="<?php echo $row['fk_cargo_id']; ?>" data-nombreusu="<?php echo $row['nombre_usu']; ?>" data-apellidousu="<?php echo $row['apellido_usu']; ?>" data-cedulausu="<?php echo $row['cedula_usu']; ?>" data-fechanacusu="<?php echo $row['fechanac_usu']; ?>" data-fechaingusu="<?php echo $row['fechaing_usu']; ?>" data-direccionusu="<?php echo $row['direccion_usu']; ?>" data-telefonousu="<?php echo $row['telefono_usu']; ?>" data-celularusu="<?php echo $row['celular_usu']; ?>" data-emailusu="<?php echo $row['email_usu']; ?>" data-admin="<?php echo $row['admin']; ?>" data-estadousu="<?php echo $row['estado_usu']; ?>" title="Editar Usuario"><span class="fa fa-cog " aria-hidden=" true"></span></a>

                          <input type="hidden" id="usuario_id<?php echo $row['usuario_id']; ?>" name="usuario_id" value="<?php echo $row['usuario_id']; ?>">
                          <a class="eUsuario btn btn-danger btn-outline btn-circle btn-sm" data-usuarioid="<?php echo $row['usuario_id'];?>" title="Eliminar Usuario"><span class="fa fa-times " aria-hidden=" true"></span></a>

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
      <script src="../js/usuarios.js"></script>
      <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



</body>
</html>

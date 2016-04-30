<?php
include ("../php/conexion.php");
$conexion = dbConnect();

$sqlexa = "SELECT COUNT(examen_id) as cant_exa from examenes;";
$registrosexa = mysqli_query($conexion, $sqlexa);
$rowexa = mysqli_fetch_array($registrosexa);
$cant_exa = $rowexa['cant_exa'];

$sqlpac = "SELECT COUNT(paciente_id) as cant_pac FROM pacientes;";
$registrospac = mysqli_query($conexion, $sqlpac);
$rowpac = mysqli_fetch_array($registrospac);
$cant_pac = $rowpac['cant_pac'];

$sqlusu = "SELECT COUNT(usuario_id) as cant_usu FROM usuarios;";
$registrosusu = mysqli_query($conexion, $sqlusu);
$rowusu = mysqli_fetch_array($registrosusu);
$cant_usu = $rowusu['cant_usu'];

$sqlord = "SELECT COUNT(orden_id) as cant_ord FROM ordenes;";
$registrosord = mysqli_query($conexion, $sqlord);
$roword = mysqli_fetch_array($registrosord);
$cant_ord = $roword['cant_ord'];

// consulta para los examenes del dia
$consulta = "SELECT o.orden_id, p.nombre_pac,o.observaciones_ord,o.estado_ord from ordenes o, pacientes p WHERE p.paciente_id= o.fk_paciente_id and fecha_ord = CURRENT_DATE() order by orden_id DESC limit 5;";
$registro = mysqli_query($conexion, $consulta);

// consulta para contar examenes del dia
$sqlordact = "SELECT COUNT(orden_id) as ordenes_act FROM ordenes WHERE fecha_ord = CURRENT_DATE()";
$registroact = mysqli_query($conexion, $sqlordact);
$datos = mysqli_fetch_array($registroact);
$ordenes_act = $datos['ordenes_act'];

 ?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">

    <title>Panel de Control</title>
  </head>
  <body>


          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Panel de Control</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>

          <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-flask fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?php echo $cant_exa ?></div>
                                  <div>Examenes!!</div>
                              </div>
                          </div>
                      </div>
                      <a class="tablaexa" href="#">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalles</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-green">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-group fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?php echo $cant_pac ?></div>
                                  <div>Pacientes!!</div>
                              </div>
                          </div>
                      </div>
                      <a class="tablapac" href="#">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalles</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-yellow">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-user fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?php echo $cant_usu ?></div>
                                  <div>Usuarios!!</div>
                              </div>
                          </div>
                      </div>
                      <a class="tablausu" href="#">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalles</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-red">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-medkit fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?php echo $cant_ord ?></div>
                                  <div>Ordenes Medicas!!</div>
                              </div>
                          </div>
                      </div>
                      <a class="tablaord" href="#">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalles</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>

<!-- Tabla que muestra los examenes del dia -->
          <div class="row">
              <div class="col-lg-6">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          Examenes de Dia
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="table-responsive">
                            <!-- pequeña validacion para consulta de examenes del dia si hay o no hay en base de datos -->
                            <?php if($ordenes_act > 0){ ?>
                              <table class="table table-striped table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Nombre del paciente</th>
                                          <th>Observaciones</th>
                                          <th>Estado</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php while($row = mysqli_fetch_array($registro)){?>

                                      <tr>
                                          <td><?php echo $row['orden_id']; ?></td>
                                          <td><?php echo $row['nombre_pac']; ?></td>
                                          <td><?php echo $row['observaciones_ord']; ?></td>
                                          <!-- pequeña validacion para diferencia los estados con botones si esta
                                           pendiente deberia darle acceso hace la pantalla de caja para que facture el examen -->
                                          <?php if($row['estado_ord'] == 'Pendiente'){ ?>
                                          <td><button type="button" class="caja btn btn-outline btn-danger btn-xs">Pendiente</button></td>
                                          <?php }else{ ?>
                                            <td><button type="button" class="btn btn-outline btn-success btn-xs">Pagada</button></td>
                                            <?php } ?>
                                      </tr>


                                          <?php }  ?>
                                  </tbody>
                              </table>
                              <?php }else{ ?>
                                No hay Examenes del dia
                              <?php }  ?>
                          </div>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          Perfiles de Examenes
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Nombre de Perfil</th>
                                          <th>Precio</th>
                                          <th>Editar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Perfil 1</td>
                                          <td>3500.00</td>
                                          <td><button type="button" class="btn btn-outline btn-primary btn-xs">Editar</button></td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>Seguros Andes</td>
                                          <td>5250.00</td>
                                          <td><button type="button" class="btn btn-outline btn-primary btn-xs">Editar</button></td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>Perfil Sanguineo</td>
                                          <td>4800.00</td>
                                          <td><button type="button" class="btn btn-outline btn-primary btn-xs">Editar</button></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-6 -->
          </div>



        <!-- acomodar esto en un archivo .JS -->
          <script>
          $(document).ready(function() {

            $('.tablaexa').on('click',function() {
              $('#page-wrapper').load('tablaexamenes2.php');
            });

            $('.tablapac').on('click',function() {
              $('#page-wrapper').load('tablapacientes2.php');
            });
              //aqui va el acceso hace la tabla de los usuarios
            $('.tablausu').on('click',function() {
              $('#page-wrapper').load('tablausuarios.php');
            });

            $('.tablaord').on('click',function() {
              $('#page-wrapper').load('tablaordenes.php');
            });
            // este deberia ser el acceso hacia la caja para las ordenes pendientes
            // $('.caja').click(function() {
            //   $('#page-wrapper').load('ordenes.php');
            // });
          });
          </script>
  </body>
</html>

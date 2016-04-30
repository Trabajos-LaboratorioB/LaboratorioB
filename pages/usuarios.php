<?php

include ("../php/conexion.php");
$conexion = dbConnect();
$consultacargo = "select * from cargos";
$registro = mysqli_query($conexion, $consultacargo);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="../datepicker/css/datepicker.css" rel="stylesheet">
  <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script>

  <script type="text/javascript" src="../js/usuarios.js"></script>

  <title>Editar Usuarios</title>
</head>
<body>
<br>
<div id="alerta"></div>
  <div class="panel panel-primary">
    <div class=" panel-heading">
      Editar Usuarios
    </div>

    <br>
<div class="panel-body">
    <form id="editarUsu" role="form">
      <div class=" col-md-12">
        <div class="form-group">
          <label class="control-label" for="usuario_id">ID de Usuario:</label>
          <!-- <input type="hidden" id="Pac_ID" name="Pac_ID"> -->
          <!-- Id del Paciente: -->
          <input required disabled class="form-control" type="text" name="usuario_id" id="usuario_id">
          <!-- <label id="paciente_id"></label> -->
          </div>

          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="usuario">Usuario:</label>
            <input required class="form-control" type="text" name="usuario" id="usuario">
            <!-- <label id="nombre_pac"></label> -->
          </div>

          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="clave">Clave:</label>
            <input required class="form-control" type="password" name="clave" id="clave">
            <!-- <label id="nombre_pac"></label> -->
          </div>

          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="cargo">Cargo:</label>

            <select name="cargo" id="cargo" class="form-control">
    					<!-- <option value="0" selected>Seleccione un cargo</option> -->
    					<?php while($row = mysqli_fetch_array($registro)){?>
    						<option value="<?php echo $row['cargo_id']?>" ><?php echo $row['descripcion_car']?></option>
    					<?php } ?>
    				</select>
          
          </div>

          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="nombre_usu">Nombre:</label>
            <input required class="form-control" type="text" name="nombre_usu" id="nombre_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="apellido_usu">Appelido:</label>
            <input required class="form-control" type="text" name="apellido_usu" id="apellido_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="cedula_usu">Cedula:</label>
            <input required class="form-control" type="text" name="cedula_usu" id="cedula_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>

          <div class="form-group">
          <label class="control-label" for="fechanac_usu">Fecha de Nacimiento:</label>

                  <input required type='text' class="datepicker1 form-control" name="fechanac_usu" id="fechanac_usu" />
              <!-- </div> -->

                  <script type="text/javascript">
                      $(function () {
                        $('.datepicker1').datepicker({
                            format: 'yyyy-mm-dd'
                          });
                      });
                  </script>

          </div>

          <div class="form-group">
          <label class="control-label" for="fechaing_usu">Fecha de Ingreso:</label>

                  <input required type='text' class="datepicker2 form-control" name="fechaing_usu" id="fechaing_usu" />
              <!-- </div> -->

                  <script type="text/javascript">
                      $(function () {
                        $('.datepicker2').datepicker({
                            format: 'yyyy-mm-dd'
                          });
                      });
                  </script>

          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="direccion_usu">Direccion:</label>
            <input required class="form-control" type="text" name="direccion_usu" id="direccion_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="telefono_usu">Telefono Fijo:</label>
            <input required class="form-control" type="text" name="telefono_usu" id="telefono_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="celular_usu">Telefono Celular:</label>
            <input required class="form-control" type="text" name="celular_usu" id="celular_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>
          <div class="form-group">
            <!-- Nombre: -->
            <label class="control-label" for="email_usu">Email:</label>
            <input required class="form-control" type="text" name="email_usu" id="email_usu">
            <!-- <label id="nombre_pac"></label> -->
          </div>


          <div class="form-group">
            <label class="control-label" for="admin">Nivel de Acceso:</label>
          <select class="form-control" name="admin" id="admin">
            <option value="Administrador">Administrador</option>
            <option value="Invitado">Invitado</option>
          </select>
        </div>


          <div class="form-group">
            <label class="control-label" for="estado_usu">Estado:</label>
          <select class="form-control" name="estado_usu" id="estado_usu">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>

          <div align="center" class="form-group">
            <button type="button" class="ActUsu btn btn-success">Actualizar</button>
            <!-- <button type="reset" class="btn btn-primary">Limpiar</button> -->
          </div>
        </div>
      </div>
    </form>

</div>

  </div>

</body>
</html>

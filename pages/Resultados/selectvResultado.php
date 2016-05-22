<?php
include ("../../php/conexion.php");
$conexion = dbConnect();

$orden_id = $_GET['orden_id'];
 // $connect = mysqli_connect("localhost", "root", "root", "test_db");
 $output = '';

 $sql = "SELECT a.orden_id, b.ordendet_id, c.examen_id, c.descripcion_exa, b.resultadoexa_ordet
FROM ordenes a, ordendetalle b, examenes c
WHERE a.orden_id = b.fk_orden_id
AND b.fk_examen_id=c.examen_id
AND a.orden_id = '$orden_id'";

 $result = mysqli_query($conexion, $sql);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="10%">Id</th>
                     <th width="10%">Id Examen</th>
                     <th width="40%">Nombre del Examen</th>
                     <th width="40%">Resultado</th>
                </tr>';
 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td>'.$row["ordendet_id"].'</td>
                     <td>'.$row["examen_id"].'</td>
                     <td>'.$row["descripcion_exa"].'</td>
                     <td class="resultadoexa_ordet" data-id1="'.$row["ordendet_id"].'" contenteditable>'.$row["resultadoexa_ordet"].'</td>
                </tr>
           ';
      }
 }
 else
 {
      $output .= '<tr>
                          <td colspan="4">No hay Examenes Registrados!!! <?php echo $orden_id?></td>
                     </tr>';
 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>

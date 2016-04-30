<?php
@session_start();
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table">
	    <thead>
	        <tr>
	            <th>Contador</th>
	            <th>Id del Examen</th>
	            <th>Nombre del Examen</th>
	            <th>Precio</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
				$total=0;
	    	foreach($_SESSION['detalle'] as $k => $detalle){
					// $total += $detalle['precio_exa'];
	    	?>
        <!-- <script>
          var total = $("#precio_exaper").val();
          var total_perfil = ("#total_perfil").val(total);
        </script> -->
	        <tr>
	        	<td><?php echo $detalle['id'];?>
	        	<td><?php echo $detalle['id_exa'];?></td>
	          <td><?php echo $detalle['nombre_exa'];?></td>
	          <td><input  class="precio_exaper form-control" type="text" name="<?php echo $detalle['id'];?>" id="<?php echo $detalle['id'];?>"></td>
	          <!-- <td><?php echo $detalle['precio_exaper'];?></td> -->
	          <td><button type="button" class="btn btn-sm btn-danger eliminar-examen" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
	        </tr>
	        <?php }?>
					<!-- <tr>
						<td colspan="3" class="text-right"><strong>TOTAL: </strong></td>
						<td>
              <?php echo $total; ?>
							<input type="text" name="total_perfil" id="total_perfil">
						</td>
						<td></td>
					</tr> -->
	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body"> No hay Examenes agregados</div>
<input type="hidden" name="total_ord" id="total_ord" value="">
<?php }?>

<script type="text/javascript" src="../js/perfiles_ajax.js"></script>

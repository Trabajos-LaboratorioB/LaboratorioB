<?php

require_once ('../conexion.php');
$conexion = dbConnect();
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

switch($page){

	case 1:
		$json = array();
		$json['msj'] = 'Examen Agregado';
		$json['success'] = true;

		if (isset($_POST['nombre_exa']) && $_POST['nombre_exa']!='') {
			try {
				$examen = $_POST['nombre_exa'];
        $id_exa = $_POST['id_exa'];
        $precio_exa = $_POST['precio_exa'];

				if(count($_SESSION['detalle'])>0){
					$ultimo = end($_SESSION['detalle']);
					$count = $ultimo['id']+1;
				}else{
					$count = count($_SESSION['detalle'])+1;
				}
				$_SESSION['detalle'][$count] = array('id'=>$count,'id_exa'=>$id_exa, 'nombre_exa'=>$examen,'precio_exa'=>$precio_exa);

				$json['success'] = true;

				echo json_encode($json);

			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Debe Ingresar un Examen';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Examen Eliminado';
		$json['success'] = true;

		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;

				echo json_encode($json);

			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;

		case 3:
			$json = array();
			$json['msj'] = 'Orden Registrada con Exito!!';
			$json['success'] = true;

			$sqlultimaorden = "SELECT COUNT(orden_id)+1 as ultima_orden FROM ordenes";
			$queryultimaorden= mysqli_query($conexion, $sqlultimaorden);
			$datosultimaorden = mysqli_fetch_array($queryultimaorden);
			$total_ord="";

			$orden_id = $datosultimaorden['ultima_orden'];
			$empresa_id = 1;
			$paciente_id = $_POST['paciente_id'];
			$fecha_ord = $_POST['fecha_ord'];
			$urgente_ord = $_POST['urgente_ord'];
			$observaciones_ord = $_POST['observaciones_ord'];
			$estado_ord = "Pendiente";
			$proceso_ordet = "P";
			$total_ord = $_POST['total_ord'];


			if (count($_SESSION['detalle'])>0 && $_POST['total_ord']!='' && $_POST['paciente_id']!='') {
				try {

					$sqlorden="INSERT INTO ordenes (orden_id,empresa_id,fk_paciente_id,fecha_ord,urgente_ord,observaciones_ord,estado_ord,total_ord) values ($orden_id, $empresa_id,$paciente_id, '$fecha_ord','$urgente_ord','$observaciones_ord','$estado_ord','$total_ord');";
					$queryorden= mysqli_query($conexion, $sqlorden);

					foreach($_SESSION['detalle'] as $detalle):
							$examen_id = $detalle['id_exa'];
							$precio_exa = $detalle['precio_exa'];


							$sqlordendetalle = "INSERT INTO ordendetalle (empresa_id,fk_orden_id,fk_examen_id,precio_exa,fecha_ordet,proceso_ordet) values ($empresa_id,$orden_id,$examen_id,'$precio_exa', '$fecha_ord' , '$proceso_ordet' );";
							$queryordendetalle= mysqli_query($conexion, $sqlordendetalle);

					endforeach;

					$_SESSION['detalle'] = array();
					$total_ord = "";
					$json['success'] = true;


					echo json_encode($json);

				} catch (PDOException $e) {
					$json['msj'] = "ERROR DE SQLS";
					$json['success'] = false;
					echo json_encode($json);
				}
			}else{
				$json['msj'] = 'Faltan Datos ...';
				$json['success'] = false;
				echo json_encode($json);
			}
			break;

}
?>

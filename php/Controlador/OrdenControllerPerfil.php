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

				if(count($_SESSION['detalle'])>0){
					$ultimo = end($_SESSION['detalle']);
					$count = $ultimo['id']+1;
				}else{
					$count = count($_SESSION['detalle'])+1;
				}
				$_SESSION['detalle'][$count] = array('id'=>$count,'id_exa'=>$id_exa, 'nombre_exa'=>$examen);

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

			$sqlultimoperfil = "SELECT COUNT(perfil_id)+1 as ultimo_perfil FROM perfiles_exa;";
			$queryultimoperfil= mysqli_query($conexion, $sqlultimoperfil);
			$datosultimoperfil = mysqli_fetch_array($queryultimoperfil);


			$perfil_id = $datosultimoperfil['ultimo_perfil'];
			$descripcion_per = $_POST['descripcion_per'];
			$precio_per = $_POST['precio_per'];



			if (count($_SESSION['detalle'])>0 && $_POST['descripcion_per']!='') {
				try {

					$sqlperfil="INSERT INTO perfiles_exa (perfil_id,descripcion_per,precio_per) values ($perfil_id, '$descripcion_per','$precio_per');";
					$queryperfil= mysqli_query($conexion, $sqlperfil);

					foreach($_SESSION['detalle'] as $detalle):
							$fk_examen_id = $detalle['id_exa'];
							$precio_exaper = $_POST['precio_exaper1'];


							$sqlperfildetalle = "INSERT INTO perfil_detalles (fk_perfil_id,fk_examen_id,precio_exaper) values ($perfil_id,$fk_examen_id,'$precio_exaper');";
							$queryperildetalle= mysqli_query($conexion, $sqlperfildetalle);

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

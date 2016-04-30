<?php

function dbConnect() {

    $manejador = "mysql";
    $servidor = "localhost";
		$usuario = "root";
		$clave = "root";
    $db ="laboratoriobiomed";
		$link = mysqli_connect($servidor, $usuario, $clave);
		if (!$link) {

				die("Error al Conectar..");
		}
		else{	mysqli_select_db( $link,$db);
				mysqli_query($link,"SET NAMES 'utf8'");
				return $link;
		}
}


 ?>

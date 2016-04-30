<?php
$manejador = "mysql";
$servidor = "localhost";
$usuario = "root";
$clave = "root";
$db ="laboratoriobiomed";
$cadena = "$manejador:host=$servidor;dbname=$db";
$cnx = new PDO($cadena,$usuario,$clave);
 ?>

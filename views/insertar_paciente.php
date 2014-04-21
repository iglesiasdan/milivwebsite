<?php

 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 

require 'conexion.php';
$con=conexion();

$q=$_POST['n'];
$r=$_POST['c'];
$p=$_POST['r'];
$rt=$_POST['ct'];
date_default_timezone_set('UTC');
$fecha=(string) date("d-m-y");
$afecc=$_POST['a'];


$sql="INSERT INTO paciente (cedula, nombre, fecha_ingreso, referido, n_terapias, afeccion)
VALUES ($r, '$q', '$fecha', '$p', $rt, '$afecc')";

$res=mysql_query($sql,$con);

if ($res!= 1) {
	$res=-1;
	echo $res;
}else{
	echo $res;
}
?>
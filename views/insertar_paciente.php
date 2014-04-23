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
$a=$_POST['nac'];
$ed=$_POST['age'];
$casa=$_POST['casa'];
$movil=$_POST['movil'];
$dir=$_POST['dir'];



$sql="INSERT INTO paciente (cedula, nombre, fecha_ingreso, referido, n_terapias, afeccion, edad, f_nacimiento, t_casa, t_movil, direccion)
VALUES ($r, '$q', '$fecha', '$p', $rt, '$afecc','$a', '$ed', '$casa', '$movil', '$dir')";

$res=mysql_query($sql,$con);

if ($res!= 1) {
	$res=-1;
	echo $res;
}else{
	echo $res;
}
?>
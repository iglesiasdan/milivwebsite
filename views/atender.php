<?php

 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 

require 'conexion.php';
$con=conexion();

$q=$_POST['data'];
list( $ced,$terapias,$m_pago,$monto,$fact,$afec,$n_banco,$cantidad,$n_cheque,$n_fact,$observ,$terapist) = explode(":", $q);
date_default_timezone_set('UTC');
$fecha=(string) date("d-m-y");

$sql2="UPDATE paciente SET n_terapias = $terapias
		WHERE cedula=$ced AND afeccion='$afec';";

$sql="INSERT INTO atencion (monto, metodo_pago, banco, no_cheque, observaciones, terapista, registroDservicio, n_registro, fecha)
VALUES ($monto, '$m_pago', '$n_banco', $n_cheque, '$observ', '$terapist', '$fact', $n_fact, '$fecha');";

$sql1="INSERT INTO relacion (cedula, afeccion, n_registro) 
	   VALUES ($ced, '$afec', $n_fact);";
$res2=mysql_query($sql2,$con);
$res=mysql_query($sql,$con);
$res1=mysql_query($sql1,$con);

if ($res!= 1 & $res1!= 1) {
	$answer=-1;
	echo $answer;
}else{
	echo $res;
}
?>
<?php 
	

 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 

require 'conexion.php';


$q=$_POST['q'];
list($ced, $affec) = explode(":", $q);



$con=conexion();

$sql="select * from paciente where cedula =".$ced." AND afeccion = '$affec';";

$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){


 echo json_encode(array('error' => "No hay sugerencias"));

}else{

 while($fila=mysql_fetch_array($res)){

  	$set[] = $fila;
  
 }

	echo json_encode($set);
}

?>

<?php

 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 

require 'conexion.php';


$q=$_POST['q'];


$con=conexion();

$sql="select * from paciente where nombre LIKE '".$q."%' LIMIT 0 , 5";

$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<b>No hay sugerencias</b>';

}else{

 $lista = "<ul>";
 while($fila=mysql_fetch_array($res)){

 $lista .= '<li><a class="sugerencias" href="'.$fila['cedula'].':'.$fila['afeccion'].'">'.$fila['nombre'].': '.$fila['cedula'].'  '.$fila['afeccion'].'</a></li>';
 
 }

 $lista.="</ul>";

 echo $lista;
}

?>
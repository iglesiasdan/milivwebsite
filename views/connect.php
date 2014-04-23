<?php
$vari = mysql_connect('localhost', 'root', '') or die (mysql_error());
mysql_select_db('miliv', $vari); 
$sql=mysql_query("SELECT * FROM pacientes_fisioterapia",$vari);

while($row = mysql_fetch_array($sql)){
  
  	echo $row['nombre'];
}
return $row['nombre'];
echo "holis";

?>
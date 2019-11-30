<?php

$name = $_GET['name'];
$data = date('Y-m-d H:i:s');


$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);


$getnames = "SELECT name FROM collection WHERE name='$name'";
$result = mysql_query($getnames) or die (mysql_error());
if(mysql_num_rows($result) == 0) {
	$sql = "INSERT INTO collection(id, nome, disp, data) 
	VALUES (NULL, '$name', '1', '$data')"; 
    mysql_query($sql) or die(mysql_error());
    echo "ok";

	
}
elseif(mysql_num_rows($result) >= 1) {
 mysql_query("UPDATE collection SET disp=disp+1");
 echo "updated data";
}
else{echo 'err';}

?>

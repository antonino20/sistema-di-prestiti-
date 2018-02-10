<?php

$nome = $_GET['nome'];
$data = date('Y-m-d H:i:s');


$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);


$recupero = "SELECT nome FROM raccolta WHERE nome='$nome'";
$result = mysql_query($recupero) or die (mysql_error());
if(mysql_num_rows($result) == 0) {
	$sql = "INSERT INTO raccolta(id, nome, disponibilita, data) 
	VALUES (NULL, '$nome', '1', '$data')"; 
    mysql_query($sql) or die(mysql_error());
    echo "dati inseriti correttamente";

	
}
elseif(mysql_num_rows($result) >= 1) {
 mysql_query("UPDATE raccolta SET disponibilita=disponibilita+1");
 echo "dati aggiornati";
}
else{echo 'err';}

?>
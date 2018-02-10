<?php
/* PARAMETRI DI CONESSIONE AL MIO DB MYSQL */
$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);

/* il token e il parametro ricevuto dall url inviato tramite posta */

$token = $_GET['token'];


$sql = "SELECT token FROM utenti WHERE token='$token'";

$verifica = mysql_query($sql);


if(mysql_num_rows($verifica) == 1) {
	echo "ok";
	$query = "UPDATE utenti set attivo='1' WHERE token='$token'";
	mysql_query($query) or die (mysql_error());
	echo "Account attivato";
}
else {echo "nn ci sono risultati nel db";}


?>
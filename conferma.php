<?php
$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);


$token = $_GET['token'];


$sql = "SELECT token FROM users WHERE token='$token'";

$verify = mysql_query($sql);


if(mysql_num_rows($verify) == 1) {
	$query = "UPDATE utenti set attivo='1' WHERE token='$token'";
	mysql_query($query) or die (mysql_error());
	echo "Account actived";
}
else {echo "err";}


?>

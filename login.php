<head>
<link href="stilo.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=device-width">

<?php

$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);


$email = $_POST['email'];
$pw = $_POST['password'];


$sql = "SELECT email, password FROM utenti WHERE email='$email' AND password='$pw'";
$controllo = mysql_query($sql) or die (mysql_error());
print_r($controllo)."<br>";
echo "ok";

if(mysql_num_rows($controllo) == 1) { 
echo "Benvenuto";
?>
<div id="form">
	<form method="get" action="database.php">
    <table>
    
    	<tr>
        	<td>artista preferito</td>
        	<td><input type="text" name="nome"></td>
        </tr>

        <td><input type="submit" value="invio"></td>
     </table>
    </form>

</div><?php






}
else {header('location:../');}


?>
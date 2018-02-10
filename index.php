<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
 <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 

        
	
    <link href="stilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="wifi.ico" />
</head>
<body> 
	<div>
		<h4>Accedi alla tua area riservata oppure <a href="#registrazione">registrati</a></h4>
	<form method="post" action="login.php">
    	Email<input type="text" name="email">
		Password<input type="password" name="password">
		<input type="submit" value="login">
	</form>
	</div>
    
    <div>
    <h4>fai una consulta</h4>
    	<form method="get" action="consultadb.php">
        	nome<input type="text" name="nome">
            nazione<input type="text" name="nazione">
            <input type="submit" name="invio">
        </form>
    </div>
    
    
	<div>
    <h4>modulo di iscrizione</h4>
	<form id="registrazione" method="post" action="server.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>email</td>
				<td><input type="text" name="email"></td>
			</tr>
            <tr>
            	<td>password</td>
                <td><input type="password" name="password"></td>
        	</tr>
            <tr>
            	<td>nazione</td>
                <td><input type="text" name="nazione"></td>
             </tr>
            <tr>
        		<td><input type="file" name="userfile"></td>
        	</tr>
			<tr>
				<td><input type="submit" value="invio"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
<?php
$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);


$ip = $_SERVER['REMOTE_ADDR'];
$data = date('Y-m-d H:i:s');
$file = fopen("dati.txt", "a+");
fwrite($file, "IP:".$ip."\n");
fwrite($file, $data."\n");
fclose($file);


$sql = "SELECT * FROM raccolta";

$result = mysql_query($sql) ;


echo "<h4>database</h4>";

while($reg = mysql_fetch_array($result)) {
echo "<div id='risultati'>";
echo "nome :".$reg['nome']."<br>";
echo "disponibili : ".$reg['disponibilita']."<br>";
echo "nazione : ".$reg['nazione']."<br>";

echo "data inserimento :".$reg['data']."<br>";

echo "</div>";

}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
 <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 

        
	
    <link href="conf.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="wifi.ico" />
</head>
<body> 
	<div>
		<h4>access your reserved area or <a href="#registrazione">sign in</a></h4>
	<form method="post" action="login.php">
    	Email<input type="text" name="email">
		Password<input type="password" name="password">
		<input type="submit">
	</form>
	</div>
    
    <div>
    <h4>search</h4>
    	<form method="get" action="querydb.php">
        	name<input type="text" name="name">
            nation<input type="text" name="nation">
            <input type="submit">
        </form>
    </div>
    
    
	<div>
    <h4>registration form<h4>
	<form id="rf" method="post" action="server.php" enctype="multipart/form-data">
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
            	<td>nation</td>
                <td><input type="text" name="nation"></td>
             </tr>
            <tr>
        		<td><input type="file" name="userfile"></td>
        	</tr>
			<tr>
				<td><input type="submit"></td>
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


$sql = "SELECT * FROM collection";

$result = mysql_query($sql) ;


echo "<h4>database</h4>";

while($reg = mysql_fetch_array($result)) {
echo "<div id='result'>";
echo "name :".$reg['name']."<br>";
echo "disp : ".$reg['disp']."<br>";
echo "nation : ".$reg['nation']."<br>";

echo "date entered :".$reg['data']."<br>";

echo "</div>";

}
?>

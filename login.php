<head>
<link href="conf.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=device-width">

<?php
$user = "";
	
$conex = mysql_connect("localhost", "$user");
mysql_select_db("my_wardrivers", $conex);


$email = $_POST['email'];
$pw = $_POST['password'];

$table; 


$sql = "SELECT email, password FROM $table WHERE email='$email' AND password='$pw'";
$check = mysql_query($sql) or die (mysql_error());
print_r($check)."<br>";
echo "ok";

if(mysql_num_rows($check) == 1) { 
echo "welcome";
?>
<div id="form">
	<form method="get" action="database.php">
    <table>
    
    	<tr>
        	<td>favorite artist</td>
        	<td><input type="text" name="name"></td>
        </tr>

        <td><input type="submit"></td>
     </table>
    </form>

</div><?php






}
else {header('location:../');}


?>

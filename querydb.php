<?php

$name = $_GET['name'];
$nation = $_GET['nation'];

$conex = mysql_connect('localhost', 'wardrivers');
mysql_select_db('my_wardrivers', $conex);

$sql = "SELECT * FROM raccolta WHERE name='$name' OR nation='$nation' ";
$result = mysql_query($sql);

if(mysql_num_rows($result) == 0) {echo "err";}
elseif(mysql_num_rows($result) >= 1) {

while($reg = mysql_fetch_array($result)) {
echo "<div id='results'>";
echo "name :".$reg['name']."<br>";
echo "disp :".$reg['disp']."<br>";
echo "nation :".$reg['nation']."<br>";


}
?>

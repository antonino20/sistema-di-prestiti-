<?php

$nome = $_GET['nome'];
$nazione = $_GET['nazione'];

$conex = mysql_connect('localhost', 'wardrivers');
mysql_select_db('my_wardrivers', $conex);

$sql = "SELECT * FROM raccolta WHERE nome='$nome' OR nazione='$nazione' ";
$result = mysql_query($sql);

if(mysql_num_rows($result) == 0) {echo "non ce ancora niente";}
elseif(mysql_num_rows($result) >= 1) {

while($reg = mysql_fetch_array($result)) {
echo "<div id='risultati'>";
echo "nome :".$reg['nome']."<br>";
echo "disponibilita :".$reg['disponibilita']."<br>";
echo "nazione :".$reg['nazione']."<br>";


}
?>
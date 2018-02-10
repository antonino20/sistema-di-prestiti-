<?php
/* PARAMETRI DI CONESSIONE AL MIO DB MYSQL */
$conex = mysql_connect("localhost", "wardrivers");
mysql_select_db("my_wardrivers", $conex);

/* PARAMETRI RECUPERATI DAL FORM */
$email = $_POST['email'];
$password = $_POST['password'];




$data = date('Y-m-d H:i:s');


/** Token **/

if(!@function_exists("create_token")) {
	function create_token($long = 10, $crypt = False) {
		if(!@empty($long)) {
		  $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		  $token = @array();
		  $data_token = Null;
		  for($i=0;$i<$long;$i++) {
			$data = @rand(0, @strlen($index) - 1);
			$token[] = @substr($index, $data, 1);
			
		  } 
		  $token = @array_unique($token, $long);
		  $token = @array_values($token);
		  
			for($i=0;$i<@count($token);$i++) $data_token .= $token[$i];
			if($crypt) {
				$pass_hash = @crypt("sha256", $data_token);
					return (@strlen($pass_hash) < @strlen($data_token) ? @hash("sha512", $pass_hash) : $pass_hash);
			}else {
				return $data_token;
															 
			}
		 
	  
		}else{
		  return false;
		}
	}
}


/* controllo se il token gia esiste nel database, se e positivo rigenero il token */

do {
	$token = @create_token();
	$control_token = "SELECT token FROM utenti WHERE token='$token'";
	$query = @mysql_query($control_token);
	$row = @mysql_fetch_array($query);
}while($row["token"] == $token);


/* PARAMETRI EMAIL*/
$destinatario = $email;
$ogetto = "CONFERMA LA TUA REGISTRAZIONE";
$mesaggio = "clicka sul link per confermare la tua registrazione http://wwww.wardrivers.altervista.org/conferma.php?token=$token";

/* inserisco nel database i dati dell'utente */
$sql = "INSERT INTO utenti (id, email, password, iscrizione, token, attivo)
	VALUES (NULL, '$email', '$password', '$data', '$token', '0')" ;
    
mysql_query($sql) or die (mysql_error());

mail($destinatario, $ogetto, $mesaggio);

echo "clicki sul link che gli abbiamo mandato per email per completare la registrazione";






?>


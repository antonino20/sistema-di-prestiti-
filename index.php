<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<style type="text/css">
		div{margin: 10px;}
        form#registrazione{display:none;}
        form#registrazione:target{display:block;}
        
	</style>
    <link href="stilo.css" rel="stylesheet" type="text/css">
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
		<form id="registrazione" method="post" action="server.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Nickname</td>
					<td><input type="text" name="nickname"></td>
				</tr>
        		<tr>
        			<td><input type="file"></td>
        		</tr>

				<tr>
					<td><input type="submit" value="invio"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>


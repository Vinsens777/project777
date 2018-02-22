<html>
<head>
<title>Autenticazione</title>
<head>
<body>
<?php
	session_start();
	$millis=(microtime(true)+microtime(true));
	$key=md5(base64_encode($millis));

	if(!isset($_SESSION["KEY"])){
		$_SESSION["KEY"]=$key;
		$key=null;
	}

	echo '<form action="" method="post">
			   Email <input type="text" value="" name="email">
			   <div id="input">
					 <input type="submit" value="OK" name="invia"><br><br>
			   </div>
		 </form>';
	
	
	if(isset($_REQUEST["email"])){
		if(mail($_REQUEST["email"],"oggetto",$_SESSION["KEY"])){
			echo "Email inviata.";
		}
		else{
			echo "Impossibile inviare l'email.";
		}
	}
	
	
	if(isset($_REQUEST["invia"])){
	echo '<form action="" method="post">
			Password <input type="password" value="" name="password">
			<div id="input">
				<input type="submit" value="OK" name="invia" ><br><br>
			</div>
		  </form>';

			$psw="";
			 
			if(isset($_REQUEST["password"])){
				$psw=$_REQUEST['password'];
			}
			
			if($psw == $_SESSION["KEY"]) {
				include("connect.php");
				echo "Connessione stabilita.";
				unset($_SESSION["KEY"]);
				$_SESSION = array();
				session_destroy();
				header("location: homepage.php");
			}
			else{
				echo "Nessuna connessione.<br>Inserisci la password per connetterti.",die;
			}
	}
?>
</body>
</html>
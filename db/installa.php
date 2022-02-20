<?php

include("connessione.php");

$q = "CREATE DATABASE IF NOT EXISTS $db";

mysqli_query($con, $q) or die(mysqli_error($con));
echo $db." creato con successo<br>";

mysqli_select_db($con,$db);

$q= "CREATE TABLE meteo (
			id INT PRIMARY KEY AUTO_INCREMENT,
			giorno DATA,
			ora TIME,
			temperatura FLOAT,
			vento_dir FLOAT,
			nuvolosita INT
		)";

mysqli_query($con, $q) or die(mysqli_error($con)."Errore nella creazione della tabella meteo");
echo "creazione della tabella meteo effettuata con sucesso<br>";

?>










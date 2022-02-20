<?php

include("connessione.php");

$q= "DROP DATABASE IF EXISTS $db";

if(mysqli_query($con, $q))
	echo "database eliminato<br>";
else
	echo "errore nell'eliminazione del DB";


?>










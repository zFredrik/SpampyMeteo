<html>
<style>
h1 {
  font-family: "Bahnschrift";
  color: #2f4f4f;
}

hr {
  border: 0;
  height: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

body{
  background-image: url('./assets/sfondo.jpg');
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
<center>
<h1>Salvataggio Dati</h1>
<hr>
<p>I dati sono stati salvati correttamente!</p>
<p>Torna indietro per continuare a visualizzare i dati meteo.</p>
</center>
<?php

include("connessione.php");
mysqli_select_db($con,$db) or die(mysql_error()." Impossibile connettersi al DB ".$db);

$lat = 37.60210268172164;
$lon = 15.03260295588581;

$meteo = file_get_contents("http://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&exclude=minutely&appid=34d0a75df8f4bc48e6de43a74b0be919&units=metric&lang=it");
$fmd = json_decode($meteo, true);

$giorno = date("Y-m-d",$fmd['current']['dt']);
$ora = date("H:i:s",$fmd['current']['dt']);
$temperatura = $fmd['current']['temp'];
$vento_dir = $fmd['current']['wind_deg'];
$nuvolosita = $fmd['current']['clouds'];

$q = "INSERT INTO meteo (giorno, ora, temperatura,	vento_dir, nuvolosita) VALUES  ('$giorno','$ora','$temperatura','$vento_dir','$nuvolosita')";

mysqli_query($con, $q) or die(mysqli_error($con)."Errore nell'inserimento");


?>

</html>









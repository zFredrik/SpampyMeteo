<html>
<link href="style.css" rel="stylesheet" type="text/css">
<?php

$lat = 37.60210268172164;
$lon = 15.03260295588581;

$meteo = file_get_contents("http://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&exclude=minutely&appid=34d0a75df8f4bc48e6de43a74b0be919&units=metric&lang=it");
$meteo_information = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=34d0a75df8f4bc48e6de43a74b0be919&units=metric&lang=it");

$fmd = json_decode($meteo, true);
$fmd_information = json_decode($meteo_information, true);

$minima = min($fmd['hourly']['1']['temp'], $fmd['hourly']['2']['temp'], $fmd['hourly']['3']['temp'], $fmd['hourly']['4']['temp'], $fmd['hourly']['5']['temp'], $fmd['hourly']['6']['temp'], $fmd['hourly']['7']['temp'],
$fmd['hourly']['8']['temp'], $fmd['hourly']['9']['temp'], $fmd['hourly']['10']['temp'], $fmd['hourly']['11']['temp'], $fmd['hourly']['12']['temp']);

$massima = max($fmd['hourly']['1']['temp'], $fmd['hourly']['2']['temp'], $fmd['hourly']['3']['temp'], $fmd['hourly']['4']['temp'], $fmd['hourly']['5']['temp'], $fmd['hourly']['6']['temp'], $fmd['hourly']['7']['temp'],
$fmd['hourly']['8']['temp'], $fmd['hourly']['9']['temp'], $fmd['hourly']['10']['temp'], $fmd['hourly']['11']['temp'], $fmd['hourly']['12']['temp']);

$icon = $fmd['current']['weather']['0']['icon'];
$condition = ("http://openweathermap.org/img/wn/".$icon."@2x.png");

?>
<body>
<center>
<h1>Spampy's Meteo</h1>
<br>
<br>
</center>

<table border="1" frame="box" align="center" id="customers1">   
<tr>
<th colspan=3><center><h2><b>Informazioni Generali</b></h2></center></th>
</tr>
  <tr>
    <th><center>Posizione<center></th>
    <th><center>Data<center></th>
    <th><center>Ora<center></th>
  </tr>
  <tr>
    <td><b><center><?php echo "".$fmd_information['name']?></center></b></td>
    <td><center><b><?php echo date("d/m/Y",$fmd['current']['dt']);?></b></center></td>
    <td><center><b><?php echo date("H:i:s",$fmd['current']['dt']);?></b></center></td>
  </tr>
</table>
<br>
<br>
<hr>
<br>
<br>
<table border="1" frame="box" align="center" id="customers">   
<tr>
<th colspan=3><center><h2><b>Meteo</b></h2></center></th>
</tr>
  <tr>
    <th><center>Categoria<center></th>
    <th colspan=2><center>Informazioni<center></th>
  </tr>
  <tr>
    <td><center>Temperatura attuale &#10148</center></td>
    <td colspan=2><center><?php echo "".$fmd['current']['temp']." &#0042C"?></center></td>
  </tr>
  <tr>
    <td><center>Temperatura percepita &#10148</center></td>
    <td colspan=2><center><?php echo "".$fmd['current']['feels_like']." &#0042C"?></center></td>
  </tr>
  <tr>
    <td><center>Temperatura minima 12h &#10148</center></td>
    <td colspan=2><center><?php echo "$minima &#0042C"?></center></td>
  </tr>
  <tr>
    <td><center>Temperatura massima 12h &#10148</center></td>
    <td colspan=2><center><?php echo "$massima &#0042C"?></center></td>
  </tr>
  <tr>
    <td><center>Percentuale nuvolosita' &#10148</center></td>
    <td colspan=2><center><?php echo "".$fmd['current']['clouds']." %"?></center></td>
  </tr>
  <tr>
    <td><center>Percentuale umidita' &#10148</center></td>
    <td colspan=2><center><?php echo "".$fmd['current']['humidity']." %"?></center></td>
  </tr>
  <tr>
    <td><center>Pressione &#10148</center></td>
    <td colspan=2><center><?php echo "".$fmd['current']['pressure']." hPa"?></center></td>
  </tr>
  <tr>
    <td><center>Condizioni attuali &#10148</center></td>
    <td><center><?php echo "".$fmd['current']['weather']['0']['description']?></center></td>
    <td><center><?php echo "<img src = $condition>"?></center></td>
  </tr>
</table>
<br>
<br>
<hr>
<br>
<br>
<table border="1" frame="box" align="center" id="customers1">   
<tr>
<th colspan=3><center><h2><b>Vento</b></h2></center></th>
</tr>
  <tr>
    <th><center>Categoria<center></th>
    <th><center>Informazioni<center></th>
  </tr>
  <tr>
    <td><center>Velocita' vento &#10148</center></td>
    <td><center><?php echo "".$fmd['current']['wind_speed']." Km/h"?></center></td>
  </tr>
  <tr>
    <td><center>Direzione in gradi &#10148</center></td>
    <td><center><?php echo "".$fmd['current']['wind_deg']?></center></td>
  </tr>
  <tr>
    <td colspan=2><center><?php

$gradi=$fmd['current']['wind_deg'];

switch (true) {

  case ($gradi >= 337.5 && $gradi < 22.5):
      echo "Nord";
      echo "<br>";
      echo "Tramontana";
      echo "<br><br>";
      echo "<img src = './assets/rosaN.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 22.5 && $gradi < 67.5):
      echo "Nord Est";
      echo "<br>";
      echo "Grecale";
      echo "<br><br>";
      echo "<img src = './assets/rosaNE.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 67.5 && $gradi < 112.5):
      echo "Est";
      echo "<br>";
      echo "Levante";
      echo "<br><br>";
      echo "<img src = './assets/rosaE.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 112.5 && $gradi < 157.5):
      echo "Sud Est";
      echo "<br>";
      echo "Scirocco";
      echo "<br><br>";
      echo "<img src = './assets/rosaSE.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 157.5 && $gradi < 202.5):
      echo "Sud";
      echo "<br>";
      echo "Ostro";
      echo "<br><br>";
      echo "<img src = './assets/rosaS.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 202.5 && $gradi < 247.5):
      echo "Sud Ovest";
      echo "<br>";
      echo "Libeccio";
      echo "<br><br>";
      echo "<img src = './assets/rosaSW.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 247.5 && $gradi < 292.5):
      echo "Ovest";
      echo "<br>";
      echo "Ponente";
      echo "<br><br>";
      echo "<img src = './assets/rosaW.png' style= height='500' width='500' border='2'>";
      break;

  case ($gradi >= 292.5 && $gradi < 337.5):
      echo "Nord Ovest";
      echo "<br>";
      echo "Maestrale";
      echo "<br><br>";
      echo "<img src = './assets/rosaNW.png' style= height='500' width='500' border='2'>";
      break;

  default:
    echo "Nessun dato registrato";
}

?></center></td>
</tr>

</table>
<br>
<br>
<hr>
<br>
<br>
<center>
<form action="db/inserimenti.php">
<h1>Per salvare i dati inerenti al meteo attuale clicca il pulsante qui sotto!</h1>
<button class="button button2">Salva</button>
</form>

<br>
<br>
<hr>
</center>
</body>

<style>
  .button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

.button2:hover {
  background-color: #04AA6D;
  color: white;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  border-radius: 6px;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #d1d1d1;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

#customers1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  border-radius: 6px;
  width: 60%;
}

#customers1 td, #customers1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers1 tr:nth-child(even){background-color: #f2f2f2;}
#customers1 tr:nth-child(odd){background-color: #d1d1d1;}

#customers1 tr:hover {background-color: #ddd;}

#customers1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

h1 {
  font-family: "Bahnschrift";
  color: #2f4f4f;
}

h2 {
  font-size: 20px;
}

h3 {
  font-size: 20px;
}
hr {
  border: 0;
  height: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
</style>
</html>
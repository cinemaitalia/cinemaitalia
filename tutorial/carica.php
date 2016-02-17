<?php
session_start();
$_SESSION['var'] = null;
$cont = 0;
$today = date("Y-m-d");
$tmsp = strtotime("now");
$host = "localhost";
$password = "";
$user = "root";
$tmsp = date(strtotime("+1 day"));
$otherday = date('Y-m-d',$tmsp);
$connessione = mysql_connect($host,$user,$password) or
	die("Connessione non riuscita");
mysql_select_db("cinema") or
	die("Selezione del database non riuscita");
$query = "select * from film where Data = '$today'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Prezzo</td></tr>";
while($riga = mysql_fetch_row($ris)){
if ($cont %2 == 0){
	echo "<tr class = trcolor><td>".$riga[0]."</td><td>";
	echo $riga[1]."</td><td>".$riga[2]."</td><td>";
	echo $riga[3]."</td><td>".$riga[4]."</td><td>".$riga[5]."</td><td><a href='visualizzafilm.php?id=".$riga[0]."'><button type='button'>Visualizza</button></a></td></tr>";
	$cont ++;
	}
else {
	echo "<tr class = trcolor2><td>".$riga[0]."</td><td>";
	echo $riga[1]."</td><td>".$riga[2]."</td><td>";
	echo $riga[3]."</td><td>".$riga[4]."</td><td>".$riga[5]."</td><td><a href='visualizzafilm.php?id=".$riga[0]."'><button type='button'>Visualizza</button></a></td></tr>";
	$cont ++;}
}
echo "<tr><td>.</td></tr>";
echo "</table>";
?>
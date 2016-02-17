<?php
session_start();
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
$query = "select * from film where ID = '$_GET[id]'";
$ris = mysql_query($query) or
	die("Query fallita");
$riga = mysql_fetch_row($ris);
echo "<div align='center'>";
echo "<p> <h1>".$riga[1]."</h1></p>";
echo "<p>";
echo "<label>Data: ".$riga[2]."</label><br>";
echo "<label>Ora: ".$riga[3]."</label><br>";
echo "<label>Sala: ".$riga[4]."</label><br>";
echo "<label>Prezzo: ".$riga[5]."&#8364;</label><br>";
echo "<label>Regia: ".$riga[6]."</label><br>";
echo "<label>Cast: ".$riga[7]."</label><br>";
echo "<label>Durata: ".$riga[8]."</label><br>";
echo "<label>Genere: ".$riga[9]."</label><br>";
echo "</p>";
echo "</div>";
$_SESSION['idfilm'] = $riga[0];
$_SESSION['idsala'] = $riga[4];
?>
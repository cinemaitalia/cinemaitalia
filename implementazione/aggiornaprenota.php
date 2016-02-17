<!doctype HTML>
<html>
<head>
<body>
<?php
session_start();
$idfilm=$_SESSION['idfilm'];
ob_start();
echo "Attendi qualche secondo";
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
$query = "select * from utenti where Nickname = '$_SESSION[var]'";
$ris = mysql_query($query) or
	die("Query fallita");
$row = mysql_fetch_row($ris);
$idutente = $row[0];
$qu = "update posto set libero = '0', IDutente = '$idutente' where ID = '$_GET[id]' and IDfilm = '$idfilm'";
$res = mysql_query($qu) or
	die("Query fallita");
$_SESSION['posto'] = $_GET['id'];
header("refresh:2;url=confermaprenota.php");
?>
</body>
</html>
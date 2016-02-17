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
$qu = "update posto set libero = '0', guest = 'ospite' where ID = '$_GET[id]' and IDfilm = '$idfilm'";
$res = mysql_query($qu) or
	die("Query fallita");
$_SESSION['posto'] = $_GET['id'];
header("refresh:2;url=confermavendi.php");
?>
</body>
</html>
<?php session_start();
if(!isset($_SESSION['var']) || empty($_SESSION['var'])){
header("location:homepage.php");
}
?>
<!doctype HTML>
<html>
<head>
<style type="text/css">
table {
  width: 22%;
  max-width: 70%;
  text-align: center;
  color: #fff;
  font-weight: lighter;
	}
td {
border-radius:8px 8px 8px 8px;
font-weight: lighter;
font-size: 18px;
}
td.libero {
background: #0f0;
}
td.occupato {
background: #f00;
}
input[type=submit] {background:transparent;}
</style>
</head>
<body>
<form method="get">
<?php
session_start();
$idfilm=$_SESSION['idfilm'];
$idsala=$_SESSION['idsala'];
ob_start();
echo "<H1>Sala:".$idsala."<H1>";
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
$query = "select * from posto where IDfilm = '$idfilm'";
$ris = mysql_query($query) or
	die("Query fallita");
$qu = "select * from sala where ID='$idsala'";
$res = mysql_query($qu) or
	die("Query fallita");
echo "<table>";
$riga = mysql_fetch_row($res);
for ($file = 1; $file <= $riga[1]; $file++){
echo "<tr>";
for($colonne = 1; $colonne <= $riga[2]; $colonne++){
$row = mysql_fetch_row($ris);
if ($row[4] == 1) {
	echo "<td class=libero><a href='aggiornavendi.php?id=".$row[0]."'>".$row[0]."</a></td>";
	}
else if ($row[4] == 0) {
	echo "<td class=occupato>".$row[0]."</td>";
	}
}
echo"</tr>";
}
echo "</table>";
?>
<button type="button" name="indietro" onclick="back()"> Indietro </button>
<script type="text/javascript">
	function back(){
			window.location.assign("homepageadmin.php");
	}
</script>
</form>
</body>
</html>
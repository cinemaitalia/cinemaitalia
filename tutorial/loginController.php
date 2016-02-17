<?php
session_start();
ob_start();
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
$query = "select * from utenti where Nickname = '$_GET[nickname]' and Password = '$_GET[password]'";
$ris = mysql_query($query) or
	die("Query fallita");
 if (mysql_num_rows($ris) == "0") {
  echo "dati errati";
	header("refresh:2;url=login.php");}
else{	$row = mysql_fetch_row($ris);
	if($row[8]==1){
	$nick = $_GET['nickname'];
	$_SESSION['var'] = $nick; 
	header("location: homepageuser.php");}
	else {
	$nick = $_GET['nickname'];
	$_SESSION['var'] = $nick; 
	header("location: homepageadmin.php");}
	}
?>
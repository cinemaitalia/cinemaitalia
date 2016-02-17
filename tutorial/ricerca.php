<!doctype>
<html>
<head>
<style type="text/css">
table {
  width: 70%;
  max-width: 70%;
  background-color: #444;
  border-collapse: collapse;
  text-align: center;
  color: #fff;
  font-weight: lighter;
	}
td {
  width:10px;
	}
tr {
  font-size: 18px;
  height: 40;
	}
.border_radius {
  border-radius: 10px 10px 10px 10px;
	}
tr.trcolor{
  color: #999;
font-weight: lighter;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
border-radius: 15px;
background: #45484d;
background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#111));
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#fff',GradientType=0 );
-moz-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) outset;
text-shadow: 0 1px 1px #000;
	}
tr.trcolor2{
  color: #fff;
font-weight: lighter;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
border-radius: 15px;
background: #fff;
background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#777), color-stop(100%,#777));
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#fff',GradientType=0 );
-moz-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) outset;
text-shadow: 0 1px 1px #000;
	}
tr.trcolor:hover {
  background: #7fffd4;
  border-width: 1px;
	}
tr.trcolor2:hover {
  background: #7fffd4;
  border-width: 1px;
	}
button {
color: #999;
padding: 5px 10px;
margin: 20px;
border: 1px solid #000;
font-weight: lighter;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
border-radius: 15px;
background: #45484d;
background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#111));
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#fff',GradientType=0 );
-moz-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) outset;
text-shadow: 0 1px 1px #000;
			}
button:active{
  background:#888;
  border-style:inset;
	}
button:focus{
  outline:none;
	}
button:hover{
background:#888;
}
input[type=submit] {
color: #999;
padding: 5px 10px;
margin: 20px;
border: 1px solid #000;
font-weight: lighter;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
border-radius: 15px;
background: #45484d;
background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#111));
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#fff',GradientType=0 );
-moz-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) outset;
box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) outset;
text-shadow: 0 1px 1px #000;
			}
input[type=submit]:active{
  background:#888;
  border-style:inset;
	}
input[type=submit]:focus{
  outline:none;
	}
input[type=submit]:hover{
background:#888;
}
body.nuovoStile{
	font-style:italic;
	font-size:35px;
	text-align:center;
	}
</style>
</head>
<body bgcolor=#aaa>
<?php
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
?>
<div align="center">
<form method="get"
<label>Titolo:</label>
<input type="text" name="titolo">
<br>
<label>Data:</label>
<input type="text" name="data">
<br>
<label>Ora:</label>
<input type="text" name="ora">
<br>
<input type="submit" value="CERCA!" name="cerca">
</form>
<button onclick="annulla()">Annulla</button>
</div>
<?php
function ricerca() {
$cont = 0;
if ($_GET['titolo']!=null && $_GET['data']==null && $_GET['ora']==null){
$query = "select * from film where Titolo = '$_GET[titolo]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']==null && $_GET['data']!=null && $_GET['ora']==null){
$query = "select * from film where Data = '$_GET[data]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']==null && $_GET['data']==null && $_GET['ora']!=null){
$query = "select * from film where Ora = '$_GET[ora]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']!=null && $_GET['data']!=null && $_GET['ora']==null){
$query = "select * from film where Data = '$_GET[data]' and Titolo = '$_GET[titolo]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']!=null && $_GET['data']==null && $_GET['ora']!=null){
$query = "select * from film where Titolo = '$_GET[titolo]' and Ora = '$_GET[ora]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']==null && $_GET['data']!=null && $_GET['ora']!=null){
$query = "select * from film where Data = '$_GET[data]' and ora = '$_GET[ora]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
if ($_GET['titolo']!=null && $_GET['data']!=null && $_GET['ora']!=null){
$query = "select * from film where Data = '$_GET[data]' and Titolo = '$_GET[titolo]' and Ora = '$_GET[ora]'";
$ris = mysql_query($query) or
	die("Query fallita");
echo "<table class=border_radius>";
echo "<tr><td>ID</td><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Descrizione</td></tr>";
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
echo"</table>";
}
}

if(isset($_GET['cerca']))
ricerca();
?>
<script>
function annulla(){
document.location.assign("homepage.php");
}
</script>

</body>
</html>
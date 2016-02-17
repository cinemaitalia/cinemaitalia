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
</style>
</head>
<body>
<?php
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
$query="SELECT * from film where ID='$_SESSION[idfilm]'";
$res = mysql_query($query) or
	die("Query fallita");

$riga=mysql_fetch_row($res);
echo "<table class=border_radius id='tabella'>";
echo "<tr><td>Titolo</td><td>Data</td><td>Ora</td>";
echo "<td>Sala</td><td>Prezzo</td><td>Posto</td></tr>";

echo "<tr><td>".$riga[1]."</td><td>".$riga[2]."</td><td>".$riga[3]."</td>";
echo "<td>".$riga[4]."</td><td>".$riga[5]."</td><td>".$_SESSION['posto']."</td></tr></table>";
echo "<br><br>";

function annulla(){
	$query="update posto set libero = '1', IDutente =NULL where ID='$_SESSION[posto]' and IDfilm='$_SESSION[idfilm]'";
$res = mysql_query($query) or
	die("Query fallita");
	$id=$_SESSION['idfilm'];
	header("refresh:2;url=visualizzafilmuser.php?id=$id");}

if(isset($_GET['annulla']))
annulla();
?>
<?php
$connessione = mysql_connect($host,$user,$password) or
	die("Connessione non riuscita");
mysql_select_db("cinema") or
	die("Selezione del database non riuscita");
$query = "select * from utenti where Nickname = '$_SESSION[var]'";
$ris = mysql_query($query) or
	die("Query fallita");
$row = mysql_fetch_row($ris);
$idutente = $row[0];
$qu = "select * from metodopagamento where IDutente = '$idutente'";
$res = mysql_query($qu) or
	die("Query fallita");
echo"<select id='sel' onchange='compari(this.value)'><option>Seleziona Metodo di pagamento</option>";
while ($row=mysql_fetch_row($res)){
	echo "<option>".$row[1]."</option>";
}
echo"<option onchange='aggiungi(this.value)'>---Aggiungi Metodo---</option>";
echo"</select>";
$nick = $_SESSION['var'];
$query = "select * from utenti where Nickname = '$nick'";
$ris = mysql_query($query) or
	die("Query fallita");
if (mysql_num_rows($ris) == "0") {
  echo "utente insesistente"; }
else{ 
$row = mysql_fetch_row($ris);
$id = $row[0];
$_SESSION['varr'] = $id;}
?>
<form method="get">
<input type="submit" name="annulla" value="Annulla"/>
</form>
<div id="but">
</div>
<script>
function stampa(){
var tab = document.getElementById("tabella").innerHTML;
var a = window.open("","","width=640,height=480");
a.document.open("text/html");
a.document.write("<html><head><style type='text/css'>@page {size: 150mm 100mm; margin: 10mm;}</style></head><body>");
a.document.write("<table border='solid'>"+tab+"</table>");
a.document.write("</body></html>");
a.document.close();
a.print();
}

function compari(val){
if (val!="Seleziona Metodo di pagamento" && val != "---Aggiungi Metodo---") {
	var but = '<button name="stampa" onclick="stampa()">Stampa</button>';
	document.getElementById("but").innerHTML = but;
	}
else if(val == "---Aggiungi Metodo---"){	
	var but = '<button name="aggiungi" onclick="aggiungi()">Aggiungi</button>';
	document.getElementById("but").innerHTML = but;
	}
else document.getElementById("but").innerHTML = "";
}
</script>
</script>
<script>
function aggiungi(){
document.location.assign("metodopagamento.php");
}
</script>
</body>
</html>
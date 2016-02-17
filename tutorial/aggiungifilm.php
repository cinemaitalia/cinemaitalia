<?php session_start();
if(!isset($_SESSION['var']) || empty($_SESSION['var'])){
header("location:homepage.php");
}
?><!doctype HTML>
<html>
<head>
<style>
body{
				background: #000;
				color: #DDD;
			}
.border,.rain{
				height: 170px;
				width: 320px;
			}
.border {
	padding:1px;}
.rain{
				 padding: 10px 12px 12px 10px;
				 -webkit-box-shadow: 8px 8px 8px rgba(0,0,0,1) inset, -9px -9px 8px rgba(0,0,0,1) inset;
				 box-shadow: 8px 8px 8px rgba(0,0,0,1) inset, -9px -9px 8px rgba(0,0,0,1) inset;
				 margin: 100px auto;
			}
.border,.rain,.border.start,.rain.start{
				background-repeat: repeat-x, repeat-x, repeat-x, repeat-x;
				background-position: 0 0, 0 0, 0 0, 0 0;
				/* Blue-ish Green Fallback for Mozilla */
				background-image: -moz-linear-gradient(left, #09BA5E 0%, #00C7CE 15%, #3472CF 26%, #00C7CE 48%, #0CCF91 91%, #09BA5E 100%);
				/* Add "Highlight" Texture to the Animation */
				background-image: -webkit-gradient(linear, left top, right top, color-stop(1%,rgba(0,0,0,.3)), color-stop(23%,rgba(0,0,0,.1)), color-stop(40%,rgba(255,231,87,.1)), color-stop(61%,rgba(255,231,87,.2)), color-stop(70%,rgba(255,231,87,.1)), color-stop(80%,rgba(0,0,0,.1)), color-stop(100%,rgba(0,0,0,.25)));
				/* Starting Color */
				background-color: #39f;
				/* Just do something for IE-suck */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00BA1B', endColorstr='#00BA1B',GradientType=1 );
			}
.border.unfocus{
				background: #333 !important;	
				 -moz-box-shadow: 0px 0px 15px rgba(255,255,255,.2);
				 -webkit-box-shadow: 0px 0px 15px rgba(255,255,255,.2);
				 box-shadow: 0px 0px 15px rgba(255,255,255,.2);
				 -webkit-animation-name: none;
			}
			.rain.unfocus{
				background: #000 !important;	
				-webkit-animation-name: none;
			}
form{
				background: #212121;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
			    border-radius: 5px;
				height: 100%;
				width: 100%;
				background: -moz-radial-gradient(50% 46% 90deg,circle closest-corner, #242424, #090909);
				background: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 150, from(#242424), to(#090909));
			}
			form label{
				display: block;
				padding: 10px 10px 5px 15px;
				font-size: 11px;
				color: #777;
			}
			form input{
				display: block;
				margin: 5px 10px 10px 15px;
				width: 85%;
				background: #111;
				-moz-box-shadow: 0px 0px 4px #000 inset;
				-webkit-box-shadow: 0px 0px 4px #000 inset;
				box-shadow: 0px 0px 4px #000 inset;
				outline: 1px solid #333;
				border: 1px solid #000;
				padding: 5px;
				color: #444;
				font-size: 16px;
			}
			form input:focus{
				outline: 1px solid #555;
				color: #FFF;
			}
			input[type="submit"]{
				color: #999;
				padding: 5px 10px;
				float: right;
				margin: 20px 0;
				border: 1px solid #000;
				font-weight: lighter;
				-moz-border-radius: 15px;
			    -webkit-border-radius: 15px;
				border-radius: 15px;
				background: #45484d;
				background: -moz-linear-gradient(top, #222 0%, #111 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#111));
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#22222', endColorstr='#11111',GradientType=0 );
				-moz-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) inset;
				-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) inset;
				box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) inset;
				text-shadow: 0 1px 1px #000;
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
</style>
</head>
<body>
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
<form method="get">
<div align="center"><H1> Aggiungi Film</H1></div>

<p align="center">
Titolo: <input type="text" size="35" id="titolo" align="right" name="titolo"/><br>
Data: <input type="text" size="35" id="ora" align="texttop" name="data"/><br>
Ora: <input type="text" size="35" id="ora" align="texttop" name="ora"/><br>
Sala: 
<select name="sala">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select><br>
Prezzo: <input type="text" size="35" id="prezzo" align="texttop" name="prezzo"/><br>
Regia:
<input type="text" name="regia" size="35" id="regia" align="texttop"/><br>
Cast:
<input type="text" name="cast" size="35" id="casta" align="texttop"/><br>
Durata:
<input type="text" name="durata" size="35" id="durata" align="texttop"/><br>
Genere:
<input type="text" name="genere" size="35" id="genere" align="texttop"/><br>
</p>
<p align="center">
<input type="submit" name="aggiungi" value="Aggiungi" class="submit" onclick="aggiungi()"> &nbsp;&nbsp;
<button type="button" name="indietro" class="submit" onclick="back()"> Indietro </button>
</p>
</form>
<?php
function aggiungi() {
 $query = "INSERT INTO film (Titolo,Data,Ora,IDSala,Prezzo,Regia,Cast,Durata,Genere)
		VALUES ('$_GET[titolo]','$_GET[data]','$_GET[ora]','$_GET[sala]','$_GET[prezzo]','$_GET[regia]','$_GET[cast]','$_GET[durata]','$_GET[genere]')";
$ris = mysql_query($query);
if (!$ris) echo "errore";
else echo "film aggiunto";
$r = mysql_insert_id();
$qu = "select * from sala where ID='$_GET[sala]'";
$res = mysql_query($qu) or
	die("Query fallita");
$riga = mysql_fetch_row($res);
for ($file = 1; $file <= $riga[1]; $file++){
switch ($file) {
case 1: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "A".$colonne;
		$q = "INSERT INTO posto (ID,IDsala,IDfilm,libero)
			VALUES ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 2: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "B".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 3: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "C".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 4: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "D".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 5: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "E".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 6: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "F".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 7: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "G".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 8: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "H".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 9: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "I".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
case 10: 
	for($colonne = 1; $colonne <= $riga[2]; $colonne++){
		$val = "L".$colonne;
		$q = "insert into posto (ID,IDsala,IDfilm,libero)
			values ('$val','$_GET[sala]','$r','1')";
			$ris = mysql_query($q);
			if (!$ris) echo "errore";
		}
	break;
}
}
}
if(isset($_GET['aggiungi']))
aggiungi();
?>
<script type="text/javascript">
	function back(){
			window.location.assign("homepageadmin.php");
	}
</script>
</body>
</html>
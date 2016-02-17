<?php session_start();
if(!isset($_SESSION['var']) || empty($_SESSION['var'])){
header("location:homepage.php");
}
?>
<!doctype HTML>
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
button:hover{
background:#888;
}
button:focus{
  outline:none;
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
?>
<form method="get">
<div align="center"><H1>Dati Utente</H1></div>

<p align="center">

<label id="nck"></label>
<label id="nick" align="right"> </label><br>
<label id="psw"></label>
<label id="pass" align="right"></label><br>
<label id= "name"></label>
<label id="nome" align="right"></label><br>
<label id="surname"></label>
<label id="cognome" align="right"></label><br>
<label id="address"></label>
<label id="indi" align="right"></label><br>
<label id="mail"></label>
<label id="email" align="right"></label><br>
<label id="cf"></label>
<label id="codfis" align="right"></label><br>
<label id="nascita"></label>
<label id="data" align="right"></label><br>
</p>
<p align="center">
<button type="button" name="indietro" onclick="back()"> Indietro </button>
<button type="button" name="indietro" onclick="modifica()"> Modifica </button>
</p>
</form>
<?php
$nick = $_SESSION['var'];
$query = "select * from utenti where Nickname = '$nick'";
$ris = mysql_query($query) or
	die("Query fallita");
if (mysql_num_rows($ris) == "0") {
  echo "utente insesistente"; }
else{ 
$row = mysql_fetch_row($ris);
echo "<script type='text/javascript'>
document.getElementById('nck').innerHTML = 'NickName:';
document.getElementById('nick').innerHTML = '$row[1]';
document.getElementById('psw').innerHTML = 'Password:';
document.getElementById('pass').innerHTML = '$row[2]';
document.getElementById('name').innerHTML = 'Nome:';
document.getElementById('nome').innerHTML = '$row[3]';
document.getElementById('surname').innerHTML = 'Cognome:';
document.getElementById('cognome').innerHTML = '$row[4]';
document.getElementById('address').innerHTML = 'Indirizzo:';
document.getElementById('indi').innerHTML = '$row[5]';
document.getElementById('mail').innerHTML = 'Email:';
document.getElementById('email').innerHTML = '$row[6]';
document.getElementById('cf').innerHTML = 'Codice Fiscale:';
document.getElementById('codfis').innerHTML = '$row[7]';
document.getElementById('nascita').innerHTML = 'Data di nascita:';
document.getElementById('data').innerHTML = '$row[9]';
</script>";
}
?>
<script type="text/javascript">
	function back(){
			window.location.assign("homepageuser.php");
	}
</script>
<script type="text/javascript">
	function modifica(){
			window.location.assign("modificaprofilo.php");
	}
</script>
</body>
</html>
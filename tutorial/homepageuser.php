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
body.nuovoStile{
	font-style:italic;
	font-size:35px;
	text-align:center;
	}

div.dx {
    max-width: 500px;
    widt: 30%;
    float:right;
background:#999;
}
p.menu{background:#ccc;}
</style>
</head>
<body bgcolor="#666666" class="nuovoStile" onload="funajax()">
<form method="get">
<div align="center">
<H1> CinemaItalia</H1>
</div>
<?php
session_start();
$nick=$_SESSION['var'];
if($nick){
echo "<p>Benvenuto ",$nick,"</p>";}
else {echo "Non hai effettuato il login";
header("refresh:1;url=homepage.php");
}
?>
<p align="right">
<button type="button" onclick="ricerca()">Ricerca</button>&nbsp;&nbsp;
<button type="button" onclick="profilo()">Profilo</button>&nbsp;&nbsp;
<button type="button" onClick="logout()"> Logout </button>
</p>
<hr>
<table id="film">
</table>
<script type="text/javascript">
  function ricerca() {
	document.location.assign("ricercauser.php");
	}
</script>
<script type="text/javascript">
  function logout() {
	document.location.assign("homepage.php");
	}
</script>
<script type="text/javascript">
  function profilo() {
	document.location.assign("profilo.php");
	}
</script>
<script>
var xhr;
function funajax(){
xhr = new XMLHttpRequest();
xhr.onreadystatechange = carica;
xhr.open("GET","caricauser.php",true);
xhr.send("");
}
function carica(){
if (xhr.readyState == 4 && xhr.status == 200){
var div = document.getElementById("film");
var response = xhr.responseText;
div.innerHTML = response;
}
}
</script>
<hr>
</body>
</html>
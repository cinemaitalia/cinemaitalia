<?php session_start();
if(!isset($_SESSION['var']) || empty($_SESSION['var'])){
header("location:homepage.php");
}
?>
<!doctype HTML>
<html>
<head>
<style>
body.nuovoStile{
	font-style:italic;
	font-size:25px;
	text-align:center;
	}
button.change{
	background-color: #FF8800; 
  border: 2px solid #FCA800; 
  color: #fff;               
  font-weight: bold;         
  padding: 0;                
  height: 25px;             
  width: 80px;
  border-radius: 10px 10px 10px 10px;}  
  
  .submit{
	background-color: #FF8800; 
  border: 2px solid #FCA800; 
  color: #fff;               
  font-weight: bold;         
  padding: 0;                
  height: 25px;             
  width: 80px; 
  border-radius: 10px 10px 10px 10px;}
  
</style>
</head>

<body bgcolor="#666666" class="nuovoStile">
<?php
$id = $_SESSION['varr'];
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
<p >
<div>
	<label> Tipo di carta: </label> &nbsp;&nbsp;
	<select id="tipo" name="tipo">
  <option value="Visa">Visa</option>
  <option value="PostePay">PostePay</option>
  <option value="Unicredit">Unicredit</option>
  <option value="PayPal">PayPal</option>
</select></div>

<div>
	<label> Nome intestatario: </label>
	 &nbsp;&nbsp;
	<input type="text" size="35" id="nome" name="nome"><br>
</div>

<div>
	<label> Cognome intestatario: </label> 
	&nbsp;&nbsp;
	<input type="text" size="35" id="cognome" name="cognome"><br>
</div>

<div>
	<label> Data di Scadenza: </label>
	&nbsp;&nbsp; 
	<input type="text" size="35" id="data" name="data"><br>
</div>

<div>
	<label> Numero Carta: </label> 
	&nbsp;&nbsp;
	<input type="text" size="35" id="num" name="num">
	&nbsp;&nbsp;
   <label> CVV </label> 
   <input type="text" size="15" id="cvv" name="cvv">
</div>

</p>

<p align="center">
<input type="submit" name="aggiungi" value="Aggiungi" style="font-style:italic" class="submit"> 
 &nbsp;&nbsp;
<button type="button" id="annulla" onclick="back()"style="font-style:italic" class="change"> Annulla </button>
</p>
</form>
<?php
function aggiungi() {
$id = $_SESSION['varr'];
$query = "INSERT INTO metodopagamento (tipocarta,nome,cognome,datascadenza,numero,cvv,IDutente)
		VALUES ('$_GET[tipo]','$_GET[nome]','$_GET[cognome]','$_GET[data]','$_GET[num]','$_GET[cvv]','$id')";
	$ris = mysql_query($query);
	if (!$ris) echo "errore";
	else echo "carta aggiunta";
}
if(isset($_GET['aggiungi']))
aggiungi();
?>
<script>
	function back(){
			window.location.assign("profilo.php");
	}
</script>
</form>
</body>
</html>
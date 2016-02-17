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
  border-radius: 10px 10px 10px 10px;
  outline:none;}
  button:active{
	  border-style:inset;}
   .submit{
	background-color: #FF8800; 
  border: 2px solid #FCA800; 
  color: #fff;               
  font-weight: bold;         
  padding: 0;                
  height: 25px;             
  width: 80px; 
  border-radius: 10px 10px 10px 10px;
  outline:none;}
  .submit:active{
	  border-style:inset;}
  div#container {

width: 90%;


border: 1px solid #000;

text-align: center;

}

div.split2 div {

float: left;

width: 50%;


}

div.wide {

clear: left;

}
a {
  color:#FF8800;
}
a:hover, a:active {
    text-decoration: underline;
    color: #FFF;
    background-color: transparent;
    text-size=3px;
}
</style>
</head>
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
<body bgcolor="#666666" class="nuovoStile">
<div align="center" id="divprincipale"><H1> Inserisci i Dati</H1></div>
<form method="get">
<div id="container">
<div class="split2">
	<div id="div2">
    <p align="right">
	<label id="nick"> NickName: </label> <br>
    <label id="pass"> Password: </label><br>
    <label id="pass1"> Ripeti Password: </label><br>
    <label id="nome"> Nome: </label><br>
    <label id="cognome"> Cognome: </label>  <br>
    <label id="indi"> Indirizzo: </label><br>
    <label id="email"> Email: </label> <br>
    <label id="cf"> Codice Fiscale: </label> <br>
    <label id="ddn"> Data di Nascita: </label><br>
    <label> Metodo di Pagamento: </label> <br>
    </p></div>
   <div id="div3"> <p align="left">	
	<input type="text" size="35" name="nickname" id="nickname">
	<label id="nickalert"></label><br>
    	<input type="password" size="35" name="password" id="password">
	<label id="passalert"></label><br>
    	<input type="password" size="35" name="password1" id="password1">
	<label id="pass1alert"></label><br>	
	<input type="text" size="35" name="nome" id="name">
	<label id="namealert"></label><br>
	<input type="text" size="35" name="cognome" id="surname">
	<label id="surnamealert"></label><br>
	<input type="text" size="35" name="indirizzo" id="address">
	<label id="addressalert"></label><br>
	<input type="text" size="35" name="email" id="mail">
	<label id="mailalert"></label><br>
	<input type="text" size="35" name="codfis" id="codf">
	<a href="http://www.codicefiscale.com/" target="_blank"><font size="3">calcola il tuo codice fiscale!</font></a><br>
	<?php
	$today = date("Y-m-d");
	echo "<input type='date' name='mydate' min='1900-01-01' max=$today id='data'>"
	?>
	<label id="datealert"></label><br>
    <button type="button" id="aggiungi" onclick="aggiungi()" style="font-style:italic" class="change"> Aggiungi</button> <br></p></div>
    </div>
</div>


<div class="wide" id="div4">
	<p align="center">
<input type="submit" name="registrati" value="Registrati"style="font-style:italic" class="submit" onclick="registrati()">&nbsp;&nbsp;
<button type="button" id="annulla" onclick="back()" style="font-style:italic" class="change" > Annulla </button>
</p>
</div>
<script>
	function aggiungi(){
		window.location.assign("MedotoPagamento.php");	
	}
</script>
<script>
	function back(){
		window.location.assign("HomePage.php");	
	}
</script>
<?php
function registrati() {
	if ($_GET['nickname']=="") echo "<script type='text/javascript'>
	document.getElementById('nick').style.color = 'red';
	document.getElementById('nickalert').innerHTML = 'Inserisci il nickname';
	document.getElementById('nickalert').style.color = 'red';
	document.getElementById('nickname').style.borderColor = 'red';
	document.getElementById('nickalert').style.fontSize = '13px';
</script><br>";
	if ($_GET['password']=="") echo "<script type='text/javascript'>
	document.getElementById('passalert').innerHTML = 'Inserisci la password';
	document.getElementById('passalert').style.color = 'red';
	document.getElementById('pass').style.color = 'red';
	document.getElementById('password').style.borderColor = 'red';
	document.getElementById('passalert').style.fontSize = '13px';
</script><br>";
	if ($_GET['nome']=="") echo "<script type='text/javascript'>
	document.getElementById('namealert').innerHTML = 'Inserisci il nome';
	document.getElementById('namealert').style.color = 'red';
	document.getElementById('nome').style.color = 'red';
	document.getElementById('name').style.borderColor = 'red';
	document.getElementById('namealert').style.fontSize = '13px';
</script><br>";
	if ($_GET['cognome']=="") echo "<script type='text/javascript'>
	document.getElementById('surnamealert').innerHTML = 'Inserisci il cognome';
	document.getElementById('surnamealert').style.color = 'red';
	document.getElementById('cognome').style.color = 'red';
	document.getElementById('surname').style.borderColor = 'red';
	document.getElementById('surnamealert').style.fontSize = '13px';
</script><br>";
	if ($_GET['indirizzo']=="") echo "<script type='text/javascript'>
	document.getElementById('indi').style.color = 'red';
	document.getElementById('address').style.borderColor = 'red';
	document.getElementById('addressalert').innerHTML = 'Inserisci l\'indirizzo';
	document.getElementById('addressalert').style.color = 'red';
	document.getElementById('addressalert').style.fontSize = '13px';
</script><br>";
	if ($_GET['email']=="") echo "<script type='text/javascript'>
	document.getElementById('email').style.color = 'red';
	document.getElementById('mail').style.borderColor = 'red';
	document.getElementById('mailalert').innerHTML = 'Inserisci l\'email';
	document.getElementById('mailalert').style.color = 'red';
	document.getElementById('mailalert').style.fontSize = '13px';
</script><br>";
	if ($_GET['codfis']=="") echo "<script type='text/javascript'>
	document.getElementById('cf').style.color = 'red';
	document.getElementById('codf').style.borderColor = 'red';
</script><br>";
	if ($_GET['mydate']=="") echo "<script type='text/javascript'>
	document.getElementById('ddn').style.color = 'red';
	document.getElementById('data').style.borderColor = 'red';
	document.getElementById('datealert').innerHTML = 'Inserisci la data';
	document.getElementById('datealert').style.color = 'red';
	document.getElementById('datealert').style.fontSize = '13px';
</script><br>";
	else {
	$qu = "select * from utenti where Nickname = '$_GET[nickname]'";
	$res = mysql_query($qu) or
	die("Query fallita");
	if(mysql_num_rows($res) > "0") { echo "<script type='text/javascript'>
	document.getElementById('nick').style.color = 'red';
	document.getElementById('nickname').style.borderColor = 'red'
	document.getElementById('nickalert').innerHTML = 'NickName gi&agrave presente';
	document.getElementById('nickalert').style.color = 'red';
	document.getElementById('nickalert').style.fontSize = '13px';
	</script>";
	}
	else{
	if ($_GET['password']!="" && $_GET['password']==$_GET['password1'])
	if (($_GET['mydate']!="") && ($_GET['codfis']!="") && ($_GET['email']!="") && ($_GET['indirizzo']!="")
	&& ($_GET['nome']!="") && ($_GET['cognome']!="") && ($_GET['nickname']!="")) {
	$query = "INSERT INTO utenti (Nickname,Password,Nome,Cognome,Indirizzo,Email,Codfis,Tipo,Datanascita)
		VALUES ('$_GET[nickname]','$_GET[password]','$_GET[nome]','$_GET[cognome]','$_GET[indirizzo]','$_GET[email]','$_GET[codfis]','1','$_GET[mydate]')";
	$ris = mysql_query($query);
	if (!$ris) echo "errore";
	else {
	echo "<script type='text/javascript'>
	document.getElementById('divprincipale').style.visibility = 'hidden';
	document.getElementById('div2').style.visibility = 'hidden';
	document.getElementById('div3').style.visibility = 'hidden';
	document.getElementById('div4').style.visibility = 'hidden';
	</script>";
	echo "Sei stato registrato con successo, clicca LOGIN per andare
	alla pagina di login oppure HOME per ritornare alla home <br>";
	echo "<button type='button' name='vailog' onclick='location.href=\"login.php\"' class='submit'>Login</button>   
	<button type='button' name='vaihome' onclick='location.href=\"homepage.php\"' class='submit'>Home</button>";
	}
	}
	}
	if ($_GET['password']!=$_GET['password1']) echo "<script type='text/javascript'>
	document.getElementById('pass1').style.color = 'red';
	document.getElementById('password1').style.borderColor = 'red';
	document.getElementById('pass').style.color = 'red';
	document.getElementById('password').style.borderColor = 'red';
	document.getElementById('pass1alert').innerHTML = 'Le password non corrispondono';
	document.getElementById('pass1alert').style.color = 'red';
	document.getElementById('pass1alert').style.fontSize = '13px';
</script>";
	}
}
if(isset($_GET['registrati']))
registrati();
?>
</body>
</html>
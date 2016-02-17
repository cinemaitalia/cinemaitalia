<!doctype>
<html>
<head>
<style type="text/css">
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
<body bgcolor="#666666" class="nuovoStile">
<div align="center"><H1> Inserisci i Dati</H1></div>
<div class="rain unfocus start">
<div class="border unfocus start">
<form method="get" action="loginController.php">
<div id="container">
<div class="split2">
<label>NickName:</label>
<input type="text" name="nickname">
<br>
<label>Password:</label>
<input type="password" name="password">
<input type="submit" value="Accedi" name="accedi" class="submit">
<button type="button" name="annulla" onclick="back()" style="background:#45484d;border-radius:15px;
font-weight: lighter;color: #999;padding: 5px 10px;
float: right;margin: 20px 0;border: 1px solid #000;-webkit-border-radius: 15px;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#111));
-webkit-box-shadow: 0px 1px 1px #000, 0px 1px 0px rgba(255,255,255,.3) inset;
box-shadow: 0px 1px 1px #000,0px 1px 0px rgba(255,255,255,.3) inset;
text-shadow: 0 1px 1px #000;-moz-border-radius: 15px;">Annulla</button>
</form>
</div>
</div>
<script type="text/javascript">
	function back(){
			window.location.assign("homePage.php");
	}
</script>
</body>
</html>
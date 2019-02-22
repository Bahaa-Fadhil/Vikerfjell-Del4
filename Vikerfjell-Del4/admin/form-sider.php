<?php 
/* 

Tittel: Innhold på sider
    Beskrivelse: innhold til sider backend med mulighet for å legge til innhold og endre
        Sist oppdatert: 27.03.2017
            Utviklet av: Joacim
                Kontrollert av:

*/
session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}

require_once "inc/connect.php"; $con = new vikerfjellDB();
include("funksjoner.php");

$epr="";
if(isset($_GET['epr']))
	$epr=$_GET['epr'];

  if (isset($_POST['registrer']) && $_POST['registrer']=="Registrer innhold") {
  //  Registrer ny film
    $tittel = mysqli_real_escape_string($con, $_POST['tittel']);
    $ingress = mysqli_real_escape_string($con, $_POST['ingress']);
    $tekst = mysqli_real_escape_string($con, $_POST['text']);
    $rekke = mysqli_real_escape_string($con, $_POST['rekke']);
	$side = mysqli_real_escape_string($con, $_POST['side']);
	$idmeny = mysqli_real_escape_string($con, $_POST['idmeny']);
      
    $sql = "INSERT INTO `vikerfjell`.`innhold` (`tittel`, `ingress`, `text`, `rekke`, `side`, `idmeny`)";
    $sql.= " values ('".$tittel."','".$ingress."','".$tekst."','".$rekke."','".$side."','".$idmeny."')";
    echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
	echo("<!-- SQL fullført: ".$sql." -->\n");
  }
if (isset($_POST['registrer']) && $_POST['registrer']=="Registrer ny side") {
  //  Registrer ny film
    $tekst = mysqli_real_escape_string($con, $_POST['tekst']);
    $side = mysqli_real_escape_string($con, $_POST['side']);
    $rekke = mysqli_real_escape_string($con, $_POST['rekke']);
    $toolTip = mysqli_real_escape_string($con, $_POST['toolTip']);
	$alt = mysqli_real_escape_string($con, $_POST['alt']);
      
    $sql = "insert into meny (tekst,side,rekke,toolTip,alt)";
    $sql.= " values ('".$tekst."','".$side."',".$rekke.",'".$toolTip."','".$alt."')";
    echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
	
	if($con){
		 header("location:form-sider-getTekst.php");
	  }else {
	  mysql_error();}
  }


?>
<!doctype html>
<html>
<head>
<!-- 

Tittel: 
    Beskrivelse:
        Sist oppdatert:
            Utviklet av: Joacim
                Kontrollert av: 

-->    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

<script type="text/javascript" src="functions/functions.js"></script>
<script>
	<script>
     function myFromFunction(){
         var xr = new XMLHttpRequest();
         var url = "saveNewText.php";
         var text = document.getElementById("myDiv").innerHTML;
		var side = document.getElementById("myDiv").innerHTML;
		var id = document.getElementById("myDiv").innerHTML;
         var vars = "newText="+text;
         
         xr.open("POST", url, true);
         xr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xr.send(vars);
     }
     
  </script>
</head>
<body>

<!-- her lager jeg en ny nav "joacim bergh" -->

<header>
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell-hvitt.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
            <li><a href="home.php">HJEM</a></li>
			<li class="main-menu-item"><a href="hytter.html">BRUKERVALG</a>
				<ul class="sub-menu">
					<li><a role="link" href="register_form.php" title="Denne linken tar deg til hytter til salgs">REGISTRER BRUKER</a></li>
					<li><a role="link" href="changePasswordFormAdmin.php" title="Denne linken tar deg til hytter til leie">BYTT PASSORD</a></li>
                    <li><a role="link" href="search.php" title="Denne linken tar deg til hytter til leie">FINN BRUKER</a></li>
                    <li><a role="link" href="brukere.php" title="Denne linken tar deg til hytter til leie">BRUKERLISTE</a></li>
				</ul>
            <li><a href="#">INNSTILLINGER</a></li>
			<li><a href="loggut.php"><img class="logo" src="../admin/bilder/account-logout-32.png"></a></li>
		</ul>
      <a href="javascript:void(0);" id="menu-icon" onclick="myHamburgerFunction()"></a>
</header>
<aside id="mytopnav">
	<div id="mySidenav" class="sidenav" >
	  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
	  <a href="form-sider.php">Sider</a>
      <a href="sidemenu-filopplastning.php">Filopplastning</a>
	  <a href="form-meny.php">Meny</a>
      
        
	</div>
	
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</aside>

<!-- innhold starter her -->
<div class="grid1 topp">
    <div class="row side">
    	<div class="col-wd-12">
        	<div class="col">
				<h1>Sider</h1>
			</div>
		</div>
	</div>
</div>

<div class="grid1 topp">
    <div class="row side">
    	<div class="col-wd-6">
        	<div class="col">
				<h2>Eksisterende sider</h2>
				<ul class="Liste">
					<?php
						visMenyElementerListe();
					?>
				</ul>
			</div>
		</div>
		<div class="col-wd-6">
			<div class="col">
			<h2>legg til ny side</h2>
			 <form action="form-sider.php" method="POST">
				<table>
				  <tr><th>tekst</th><th>side</th>
					<th>rekke</th><th>toolTip</th><th>alt</th><th></th></tr>
				  <tr><td class="w30"><input type="text" name="tekst" autofocus class="nmr" placeholder="tekst"></td>
					<td class="w10"><input type="text" name="side" class="nmr"></td>
					<td class="w10"><input type="text" name="rekke" class="nmr"></td>
					<td class="w10"><input type="text" name="toolTip" class="nmr"></td>
					<td class="w10"><input type="text" name="alt" class="nmr"></td>
					<td class="w10"><input type="submit" name="registrer" value="Registrer ny side"></td></tr>
				</table>
			 </form>
			 <br>
			 <a class="button" href="../mal.php">Oppdater sider</a>
			</div>
		</div>
	</div>
</div> 
    
</body>
</html>

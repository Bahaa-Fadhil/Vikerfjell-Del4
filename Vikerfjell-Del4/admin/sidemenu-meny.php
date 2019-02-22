<?php

session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}

?>

<!doctype html>
<html>
<head>
<!-- 

Tittel: Søk form
    Beskrivelse: Søk form for backend med mulighet for å søke på brukernavn og e-post
        Sist oppdatert: 17.03.2017
            Utviklet av: Joacim
                Kontrollert av: 

-->        
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script type="text/javascript" src="functions/functions.js"></script>
    
</head>
<body>

<!-- her lager jeg en ny nav "joacim bergh" -->
<header>
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell.png" height="62px" width="83px"></a>
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
 <!-- Grid -->

<div class="grid1" id="back-grid">
    <div class="row">
    	<div class="col-wd-12">
        	<div class="col" id="side">
				<h5 id="back-end"> Tittel </h5>
           		<ul class="admin-sider">
           		  <li class="sider-item-meny"><a href="hytter.html">HOME - menyelement 1</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="Send" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a href="hytter.html">HYTTER</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="Send" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a role="link" href="HytterSalg.html" title="Denne linken tar deg til hytter til salgs">TIL SALGS</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a role="link" href="HytterSalg.html" title="Denne linken tar deg til hytter til salgs">TIL LEIE</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a href="tjenester.html">TJENESTER</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a href="aktiviteter.html">AKTIVITETER</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a href="aktuelt.html">AKTUELT</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
				  		<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				  <li class="sider-item-meny"><a href="kontakt.html">KONTAKT OSS</a>
				  	<ul class="sub-menu-admin">
				  		<li class="sider-list"><input type="text" name="tittel" placeholder="tittel" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="side" placeholder="side" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="rekke" placeholder="rekke" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="toolTip" placeholder="toolTip" class="textfield" required></li>
				  		<li class="sider-list"><input type="text" name="alt" placeholder="alt" class="textfield" required></li>
						<li class="sider-list"><input type="submit" name="send" value="login" class="submitButton"></li>
					</ul>
				  </li>
				</ul>
            </div>
            
        </div>
        <!-- <div class="col-wd-2">
        	<div class="col" id="side-right">
				<h5 id="back-end"> forfatter </h5>
           		<ul class="admin-sider">
           		  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				  <li class="sider-item"><a href="brukere.php">Joacim Bergh</a>
				  </li>
				</ul>
				
			</div>
		</div>
   		<div class="col-wd-2">
        	<div class="col" id="side-right">
				<h5 id="back-end"> dato : publishert </h5>
           		<ul class="admin-sider">
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a><!-- <a href="#" id="demo"></a>
           		  <script>var d = new Date();
document.getElementById("demo").innerHTML = d.toUTCString();</script>-->
				 <!--  </li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
					<li class="sider-item"><a href="#" id="demo">October 13, 2014</a></li>
				</ul>
			</div>
		</div>-->
    </div>
</div>
    
</body>
</html>
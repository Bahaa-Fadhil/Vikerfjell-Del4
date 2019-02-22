<?php
/* 

Tittel: Søkeresultater
    Beskrivelse: 
        Sist oppdatert:
            Utviklet av: Bahaa
                Kontrollert av: Steffen

*/
session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}

include 'inc/connect.php';
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

<div class="grid1">
  <div class="row2">
    <div class="col-wd-12 toppHome">
      <div class="col1">
          <img class="logo" src="../admin/bilder/profile.png" width="200px" height="200px">
<?php

$answer = $_POST['radio'];

//Brukernavn
if ($answer == "brukernavn") {

      //Sjekker om søkefelt er ikke tomt "Bahaa"
    if(isset($_POST["name"])) {
        $name = $con->real_escape_string($_POST["name"]);

        // utføre spørring og hente data fra database "Bahaa"
        $data = $con->query("SELECT * FROM bruker WHERE brukerNavn='$name'");

        if ($data->num_rows > 0) {
            while($row = $data->fetch_array()) {
                echo '<h1>Brukernavn: </h1><h2>' . $row["brukerNavn"] . '</h2><br>';
                echo '<h1>E-post: </h1><h2>' . $row["ePost"] . '</h2><br>';         
                echo '<h1>Antall Feil innlogging:</h1><h2> ' . $row["feilLogginnTeller"] . '</h2><br>';
                echo '<h1>Siste Feil innlogging:</h1><h2> ' . $row["feilLogginnSiste"] . '</h2><br>';
                }
        }
            else {
                echo 'Error: kan ikke utføre spørring';
            }
    }
        else {
            echo 'Error: på henting av navn';
        }
}

//E-post
elseif ($answer == "epost") { 

   if (isset($_POST["name"])) {
    $email = $con->real_escape_string($_POST["name"]);

        // utføre spørring og hente data fra database "Bahaa"
        $data = $con->query("SELECT * FROM bruker WHERE ePost='$email'");

            if ($data->num_rows > 0) {
                while($row = fetch_array($data)) {
                    echo "<p>";
                    echo "<b>Brukernavn: </b> " . $row["brukerNavn"] . "<br />";
                    echo "<b>E-post: </b> " . $row["ePost"];
                    echo "</p>";          
                    echo "<b>Antall Feil innlogging:</b> " . $row["feilLogginnTeller"] . "<br />";
                    echo "<b>Siste Feil innlogging:</b> " . $row["feilLogginnSiste"] . "<br />";
                    echo "</p>";
                    }
            }
            else {
                echo 'Error: kan ikke utføre spørring';
            }
    }
    else {
        echo 'Error: på henting av epost';
    }
}

// Avslutte connction med database "Bahaa"
$con->close();

?>
          
      </div>
    </div>
  </div>
</div>
    
</body>
</html>
<?php

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
            Utviklet av: Steffen
                Kontrollert av: 

-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/login.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    
</head>
<body>
<!-- Grid/RegisterForm -->
<div class="grid1">
    <div class="row2">
    	<div class="col-wd-12">
        	<div class="col4">
                <div class="login-page">
                  <div class="form">
                    <a href="https://home.usn.no/web-r-gpro1/loggut.php">
                        <img id="Logo" src="bilder/logo-vikerfjell.png" width="200px" height="150px">
                    </a>
                    <form class="login-form" action="register_action_sjekk.php" method="post">
                        
                        <input type="text" name="brukernavn" id="brukernavn" autofocus placeholder="Skriv inn brukernavn" class="textfield" required oninvalid="this.setCustomValidity('Brukernavnet kan kun inneholde små/store bokstaver eller tall og må være på mellom 4-16 tegn')" oninput="setCustomValidity('')"pattern="[a-zA-Z0-9]{4,40}">
                        
                        <input type="password" name="password1" id="password1" placeholder="Skriv inn passord" class="textfield" required oninvalid="this.setCustomValidity('Passordet må innholde minst et tall, en stor og en liten bokstav, og må være på 6-20 tegn.')" oninput="setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,40}">
                        
                        <input type="password" name="password2" id="password2" placeholder="Gjenta passord" class="textfield" required oninvalid="this.setCustomValidity('Passordet må innholde minst et tall, en stor og en liten bokstav, og må være på 6-20 tegn.')" oninput="setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}">
                        
                        <input type="email" name="email" id="email" placeholder="Skriv inn e-post" class="textfield" required oninvalid="this.setCustomValidity('E-postadressen må være en gyldig e-postadresse i tillegg til å innholde @.)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        
                        <input type="submit" name="send" value="Register" class="submitButton">
                        
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
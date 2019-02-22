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

Tittel: Bytte passord form admin
    Beskrivelse: Bytte passord skjema for backend
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
<!-- Grid/ByttePassordForm -->
<div class="grid1">
    <div class="row2">
    	<div class="col-wd-12">
        	<div class="col4">
                <div class="register-page">
                  <div class="form">
                    <a href="loggut.php">
                        <img id="Logo" src="bilder/logo-vikerfjell.png" width="200px" height="150px">
                    </a>
                    <form class="login-form" action="ByttPass_sjekk.php" method="post">
                        
                        <input type="password" name="password1" id="password1" placeholder="Skriv inn gammelt passord" class="textfield" required oninvalid="this.setCustomValidity('Passordet må innholde minst et tall, en stor og en liten bokstav, og må være på 6-20 tegn.')" oninput="setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}">
                        
                        <input type="password" name="password2" id="password2" placeholder="Skriv inn nytt passord" class="textfield" required oninvalid="this.setCustomValidity('Passordet må innholde minst et tall, en stor og en liten bokstav, og må være på 6-20 tegn.')" oninput="setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}">
                
                         <input type="password" name="password3" id="password3" placeholder="Gjenta nytt passord" class="textfield" required oninvalid="this.setCustomValidity('Passordet må innholde minst et tall, en stor og en liten bokstav, og må være på 6-20 tegn.')" oninput="setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}">
                        
                        <input type="submit" name="send" value="Bytt passord" class="submitButton">
                        <button type="button" onclick="location.href='form.php';" class="submitButton">Tilbake</button>
                        
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
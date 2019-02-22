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

Tittel: Søk
    Beskrivelse: Form for søkefunksjon i backend
        Sist oppdatert: 17.03.2017
            Utviklet av: Bahaa
                Kontrollert av: Steffen

-->
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/adminSearch.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!--
<script>
    if(document.getElementById('brukernavn').checked) {
        input.oninvalid = function(event) {
        event.target.setCustomValidity('E-postadressen må være en gyldig e-postadresse i tillegg til å innholde @')
        }
        input.pattern = function(event) {
        event.target.pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
        }
}
    }else if(document.getElementById('epost').checked) {
        input.oninvalid = function(event) {
        event.target.setCustomValidity('Brukernavnet kan kun inneholde små/store bokstaver eller tall og må være på mellom 4-16 tegn');
        }
        input.pattern = function(event) {
        event.target.pattern="[a-zA-Z0-9]{4,16}"
        }
    }else alert("Vennligst trykk på Brukernavn eller E-post før du søker!"){
}
        oninvalid="this.setCustomValidity('E-postadressen må være en gyldig e-postadresse i tillegg til å innholde @.)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
</script>
-->

</head>
<body>
   <!-- <div class="grid">
    <div class="row2">
    	<div class="col-wd-12">
        	   <div class="col4"> -->
                  <div class="form">
                    <a href="loggut.php">
                        <img id="Logo" src="bilder/logo-vikerfjell-hvitt.png" width="200px" height="150px">
                    </a>
                    <form class="login-form" action="search_result.php" method="post">
                            <input type="text" name="name" autofocus placeholder="Søk..." class="textfield" required>
                            <input type="radio" name="radio" value="brukernavn" checked id=brukernavn>
                            <label for="brukernavn"><span></span>Brukernavn</label>
                            <input type="radio" name="radio" value="epost" id=epost>
                            <label for="epost"><span></span>E-post</label>
                            <input type="submit" name="send" value="Søk" class="submitButton">
                            <button type="button" onclick="location.href='form.php';" class="submitButton">Tilbake</button>
                    </form>
                  </div>
           <!-- </div>
        </div>
    </div>
</div> -->
    
 <!--   
	<form method="post" action="search_result.php">
	<fieldset>
	<legend>Søk</legend>
	<p><label for="name">Brukernavn:</label> 
    <input type="text" name="name" id="name" /></p>
	<p class="center">
    <input type="submit" value="Søk" class="submitButton" /></p>
    <button type="button" onclick="location.href='https://home.hbv.no/web-r-gpro1/admin/form.php';" class="submitButton">Tilbake</button>
	</fieldset>
	</form> -->
</body>
</html>
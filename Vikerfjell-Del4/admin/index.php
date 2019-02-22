<?php

include("inc/loginscript.php");

if(isset($_SESSION['login_user'])){
header("location: home.php");
}

?>
<!doctype html>
<html>
<head>
<!-- 

Tittel: Innlogging
    Beskrivelse: Innlogging for backend av Vikerfjell
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

<!-- Feil brukernavn eller passord
    
</head>
<body>

<!-- Grid/LoginForm -->
<div class="grid1">
    <div class="row2">
    	<div class="col-wd-12">
        	<div class="col4">
                  <div class="form">
                    <a href="https://home.usn.no/web-r-gpro1/sidene2/default.html">
                        <img id="Logo" src="bilder/logo-vikerfjell.png" width="200px" height="150px">
                    </a>
                    <form class="login-form" action="" method="post">
                        <input type="text" name="brukernavn" autofocus placeholder="Skriv inn brukernavn" class="textfield" required>
                        
                        <input type="password" name="password1" placeholder="Skriv inn passord" class="textfield" required>
                        
                        <input type="submit" name="send" value="login" class="submitButton">
                        
                        <a class="forgotpassword" href="../php/lostPasswordForm.php">Glemt passord?</a>
                        
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
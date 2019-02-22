<?php

// Denne filen skal ikke ha session!

?>

<!doctype html>
<html>
<head>
<!-- 

Tittel: Glemt passord
    Beskrivelse: Skjema for glemt passord som spør etter e-postadresse
        Sist oppdatert:
            Utviklet av: Steffen
                Kontrollert av: 

-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Vikerfjell</title>

  <link href="../styles/login.css" rel="stylesheet" type="text/css">
  <!-- Google Fonts Roboto, alle typer -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

</head>
<body>

  <!-- Grid/LoginForm -->
  <div class="grid1">
    <div class="row2">
      <div class="col-wd-12">
        <div class="col4">
          <div class="login-page">
            <div class="form">
              <a href="../sidene2/default.html">
                <img id="Logo" src="../Bilder/Logo/logo-vikerfjell.png" width="200px" height="150px">
              </a>
              <form class="login-form" action="../admin/forgotPassword.php" method="POST">

                <div class="glemtPWInfoTekst">
                  <h1>Glemt passordet ditt?</h1>
                  <p>Tast inn e-postadresse for å tilbakestille passord ditt. Hvis du ikke kan se noen e-post fra Vikerfjell i innboksen må du kanskje se i søppelpost.</p>
                </div>

                <input type="text" name="email" id="email" placeholder="Skriv inn e-post" class="textfield" required oninvalid="this.setCustomValidity('E-postadressen må være en gyldig e-postadresse i tillegg til å innholde @.')" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

                <input type="submit" name="ForgotPassword" value="send" class="submitButton">
                <button type="button" onclick="location.href='../admin';" class="submitButton">Tilbake</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
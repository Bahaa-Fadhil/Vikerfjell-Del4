<?php
/* 

Tittel: Glemt passord
    Beskrivelse: Tar imot e-post fra bruker, lager tidfeldig passord og sender det til brukeren.
        Sist oppdatert: 04.05.2017
            Utviklet av: Steffen
                Kontrollert av:

*/

require_once "inc/connect.php";
$con = new vikerfjellDB();
include("funksjoner.php");

if(isset($_POST["email"])) {
    //Tar vare på e-posten som blir oppgitt og spør mot databasen om informasjon med matchende e-post.
    $email = $con->real_escape_string($_POST["email"]);
    $sql = $con->query("SELECT * FROM bruker WHERE ePost='$email'");

    if ($sql->num_rows > 0) {
        $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        $str = str_shuffle($str);
        $str = substr($str, 0, 10);
        
        // Lager nytt passord til bruker. De tre første tegnene er faste for å garantere passordkravene. De ti siste er tilfeldige for å sikkerhetens skyld.
        $password = 'Vi0'.$str;

        $url = "https://home.usn.no/web-r-gpro1/admin";
        
        //Utforming av e-posten.
        $msg = "Your new password is: $password\nTo change your password, please visit this: $url\n\nMvh\n\nVikerfjell";
        $subject = "Reset Password";
        $headers = "From: Vikerfjell" . "\r\n";

        mail($email, $subject, $msg, $headers);
        
        $salt = 'IT2_2017';
        
        //$encrypted_password = passwordEncrypter($password);
        //$con->query("UPDATE bruker SET passord = $encrypted_password WHERE ePost='$email'");
        
        //Salter, krypterer og oppdaterer passordet til riktig bruker i databasen.
        $con->query("UPDATE bruker SET passord = sha1( Concat('$salt','$password')) WHERE ePost='$email'");

    } else {
        echo" 
            <script>
             window.alert('Det skjedde en feil med linken!') 
             window.location.href='index.php';            
            </script>
            ";
    }



} else {
    echo" 
            <script>
             window.alert('Det skjedde en feil med inntastingen!') 
             window.location.href='index.php';            
            </script>
            ";
}

$con->close();

?>

<!doctype html>
<html>
<head>
<!-- 

Tittel: Bekreftelsemelding
Beskrivelse: Viser en bekreftelsemelding etter brukeren har bedt om å få tilsendt nytt passord
    Sist oppdatert: 04.05.2017
        Utviklet av: Steffen
            Kontrollert av: 

-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="refresh" content="10;url=https://home.usn.no/web-r-gpro1/sidene2/default.html">

<title>Vikerfjell</title>

<link href="../styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script type="text/javascript" src="../functions/funksjoner.js"></script>
<script>setInterval(function(){ countdownForside(); },((1000 * 600)) / 1000);</script>

</head>
<body>
<div class="grid1">
  <div class="row2">
    <div class="col-wd-12">
      <div class="col4 absolutecenter">
        <a href="../sidene2/default.html">
          <img class="logo" src="../Bilder/Logo/logo-vikerfjell.png" width="200px" height="150px">
        </a>
        <h1>Du vil nå motta et nytt passord på din e-post</h1>
        <br>
        <h2>Sjekk søppelpost hvis du ikke har fått e-post innen kort tid.
        <br>
        Det anbefales at du følger instruksjonene i e-posten. 
        <br><br>
        <a class="underline"href="../kontakt.html">Spørsmål? Ta kontakt med oss her!</a></h2>
        <br><br>
        <p>Du vil bli sendt tilbake til forsiden om <span id="counter">10</span> sekunder...</p>      
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php 
/* 

Tittel: Registrer bruker
    Beskrivelse: Utfører registreringen av brukeren og lagrer i databasen
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
include 'funksjoner.php';

// assigment til session varaibel
//if(isset($_SESSION['brukernavn']))
//$_SESSION['time']     = time();

// legge informasjon i variabler og salte passord for registering i database. "Bahaa"
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password1']);
$password_repeat = mysqli_real_escape_string($con, $_POST['password2']);
$username = mysqli_real_escape_string($con, $_POST['brukernavn']);

// Sjekker om brukernavnet finnes fra før. "Steffen"
if(isset($username)) {
$users = mysqli_query($con, "SELECT * FROM bruker where brukerNavn='$username'");
$rows = mysqli_affected_rows($con);
    
    if($rows >= 1){
        echo" 
            <script>
             window.alert('Brukernavnet finnes allerede!') 
             window.location.href='register_form.php';            
            </script>
            ";
        }
    elseif ($password != $password_repeat) {
        // Sjekker hvis passord 1 er ikke like passord 2. "Bahaa"
        echo" 
            <script>
             window.alert('Passordene matchet ikke!') 
             window.location.href='register_form.php';            
            </script>
            ";
        }
    else {
        $encrypted_password = passwordEncrypter($password);
        $sql = "INSERT INTO bruker (brukernavn, passord, epost) VALUES ('$username', '$encrypted_password', '$email');";
        $res = mysqli_query($con, $sql );
        
        // Viser popup melding etter at brukeren er registert og registering er i orden. "Bahaa"
        echo" 
            <script>
             window.alert('Registering av ny bruker er velykket!') 
             window.location.href='index.php';            
            </script>
            ";
    }
}
else{
    echo" 
            <script>
             window.alert('Dette skjedde en feil! Error 1') 
             window.location.href='register_form.php';            
            </script>
            ";
}
    
// Avslutte kontakt med databse. "Bahaa"
$con->close();
?>
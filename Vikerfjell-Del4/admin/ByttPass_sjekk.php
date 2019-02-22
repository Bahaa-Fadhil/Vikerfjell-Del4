<?php
/* 

Tittel: Bytte passord
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

require_once "inc/connect.php";
$con = new vikerfjellDB();
include 'funksjoner.php';

if(isset($_POST['send'])) {
        // Varibeler for bytt passord formen."Bahaa"
        $login_user = $_SESSION['login_user'];
        $password = $con->real_escape_string($_POST['password1']);
        $password_new = $con->real_escape_string($_POST['password2']);
        $password_repeat = $con->real_escape_string($_POST['password3']);
        $encrypted_password = passwordEncrypter($password);
        $check_username = "";
        $check_password = "";

        // Spørring mot database. Hente riktig bruker og passord. "Bahaa"
        $sql =("SELECT brukerNavn, passord FROM bruker WHERE brukerNavn='$login_user' AND passord='$encrypted_password'");
        $res = $con->query($sql);
        
        while ($row = $res->fetch_assoc()) {
        $check_username=$row['brukerNavn'];
        $check_password=$row['passord'];
        }
        if($login_user == $check_username && $encrypted_password == $check_password){

            if($password_new == $password_repeat) {
            // Hvis ny passord er like gjenta nytt passord, så utfør spørring og bytte passord. "Bahaa"
            $password = $password_new;
            $encrypted_password = passwordEncrypter($password);
            $sqlUpdate =("UPDATE bruker SET passord='$encrypted_password' where brukerNavn='$login_user'");
            $resUpdate = $con->query($sqlUpdate);
            //$sqlUpdate = $con->query("UPDATE bruker SET passord='$encrypted_password' where brukerNavn='$login_user'");
                
                if($resUpdate !== false) {           
                // Viser popup melding etter at passord er byttet. "Bahaa"
                echo "<script>alert('Gratulerer! Du har endret passordet ditt!');
                window.location.href='loggut_login.php';
                </script>";
                }
               else {         
                    // Viser popup melding etter at passord er byttet. "Bahaa"
                    echo "<script>alert('Klarte ikke å oppdatere passord! Sjekk om du har kontakt med databasen!');
                    window.location.href='changePasswordFormAdmin.php';
                    </script>";
               }
            }
            else {
                echo "<script>alert('Passordene er ikke like!');
                window.location.href='changePasswordFormAdmin.php';
                </script>";
            }
        }
    else {
            echo "<script>alert('Klarte ikke å finne en bruker med ditt passord');
            window.location.href='changePasswordFormAdmin.php';
            </script>";
        }
    }
else {
        echo "<script>alert('Du må trykke på bytt passord knappen!');
        window.location.href='changePasswordFormAdmin.php';
        </script>";
}
    
// Avslutte kontakt med databse. "Bahaa"
$con->close();

?>
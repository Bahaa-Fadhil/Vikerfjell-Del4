<?php
/* 

Tittel: Loginscript
    Beskrivelse: 
        Sist oppdatert: 26.03.2017
            Utviklet av: Steffen og Bahaa
                Kontrollert av: Bahaa og Steffen

*/
session_start();
// inkludere database kontakt
require_once "inc/connect.php";
$con = new vikerfjellDB();
include "funksjoner.php";

if (isset($_POST['send'])) {
    // Henter brukernavn og passord
    $username = $con->real_escape_string($_POST['brukernavn']);
    $password = $con->real_escape_string($_POST['password1']);
    // Definerer salt og lager en variabel for hvordan det krypterte passordet ser ut
    $encrypted_password = passwordEncrypter($password);
    
    // SQL spørring som samler informasjon om registrerte brukere og finner riktig bruker
    $sql = $con->query("select * from bruker where brukerNavn='$username'");
    // Tar spørringen og lager en verdi som lagrer antall rader
    $rows = $sql->num_rows;
    // Tester på om antall rader er større enn 0
    if($rows > 0) {
        while ($row = $sql->fetch_assoc()) {
            $con_username = $row['brukerNavn'];
            $con_password = $row['passord'];
            $con_idbruker = $row['idbruker'];
            $con_Teller = $row['feilLogginnTeller'];
            $con_feilSiste = $row['feilLogginnSiste'];
            $con_feilIP = $row['feilIP'];
        }
        if ($username==$con_username && $encrypted_password==$con_password) {
            $_SESSION['login_user']=$username; 
            /* hvis det er riktig brukernavn og passord som ble tastet inn så reste feilLogginnTeller
            og sende bruker til back-end "Bahaa" */
            $res =("UPDATE bruker SET feilLogginnTeller = 0 WHERE idbruker = '$con_idbruker'");
            $res = $con->query($res);
            // Sende bruker til Back-end for admin "Bahaa"
            header("location: form.php");
        
            }else { 
                     // Hvis feil passord ble tastet så Teller antall feil innlogging "Bahaa"

                        $ip = $_SERVER['REMOTE_ADDR'];  // Hente IP-addresse til bruker
                        $dato = date("Y-m-d H:i:s");    // legge akuratt dato og format

                        // Viser popup melding etter at passord er feil. "Bahaa"
                        echo '<script language="javascript">';
                        echo 'alert("Feil brukernavn eller passord")';
                        echo '</script>';
            
                        // Spørring mot database. Hente riktig bruker info. "Bahaa"
                        $sql =("SELECT * FROM bruker WHERE brukerNavn=' $username'");
                        $res = $con->query($sql);

                        // feilLogginnTeller +1 for hver gang feil logginn."Bahaa"
                        $Tall= $con_Teller +1;
                        // Oppdatere brukerens info etter feil innlogging
                        $sql1 =( "UPDATE bruker SET feilLogginnTeller='$Tall' where brukerNavn='$username'");
                        $sql2 =( "UPDATE bruker SET feilLogginnSiste='$dato' where brukerNavn='$username'");
                        $sql3 =( "UPDATE bruker SET feilIP='$ip' where brukerNavn='$username'");

                        $res1 = $con->query($sql1);
                        $res2 = $con->query($sql2);
                        $res3 = $con->query($sql3);
            
                            // Hvis feilinnLogging mer enn 3 ganger så låse konto i ett min.
                            if ($Tall > 2) {                  

                                // Sende Bruker til nedtelling tid etter 5 min stopp."Bahaa"
                                header("location: tid.php", Sleep(5));
                                // Reste feilLogginnTeller til null.

                                $sql4 =( "UPDATE bruker SET feilLogginnTeller='0' where brukerNavn='$username'");
                                $res4 = $con->query($sql4);
                }
             }
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Klarte ikke å hente brukernavn/passord")';
        echo '</script>';
 }
    $con->close(); // Avslutte kontakt med database. "Bahaa"
}  // Slutt på form.  
?> 
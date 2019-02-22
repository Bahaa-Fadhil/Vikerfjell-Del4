<?php
/* 

Tittel: Logg ut
    Beskrivelse: Logger brukeren ut av sessjonen sin og sender brukeren til forsiden
        Sist oppdatert: 23.03.2017
            Utviklet av: Bahaa
                Kontrollert av: Steffen

*/
	session_start();
	
    session_unset(); 

	session_destroy();
	header("Location: ../admin/index.php");
?>
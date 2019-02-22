<?php 
/* 

Tittel: Connect
    Beskrivelse: Lister opp databaseinformasjon og kobler til databasen
        Sist oppdatert:
            Utviklet av: Bahaa
                Kontrollert av:
*/

/*
// Localhost
$host = 'localhost',
$user = "root",
$pw = "root",
$base = "vikerfjell"

// Gunnars server
$host = '158.36.139.21',
$user = "brViker",
$pw = "pw_Viker",
$base = "vikerfjell"
*/

class vikerfjellDB extends mysqli {
function __construct(
$host = '158.36.139.21',
$user = "brViker",
$pw = "pw_Viker",
$base = "vikerfjell") {
    parent::__construct($host,$user,$pw,$base);
    }
}

// Create connection
$con = new vikerfjellDB();

// Check connection
    if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
   }
?>
<?php
/* 

Tittel: Filopplastning
    Beskrivelse:
        Sist oppdatert:
            Utviklet av: Steffen
                Kontrollert av:

*/
session_start();
// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}
require_once "inc/connect.php"; 
$con = new vikerfjellDB();
include("funksjoner.php");


// Max filstørrelse og gyldige filtyper
$max_file_size = 1000*2000; // 2 MB
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// Størrelse på bildene
$sizes = array(250 => 250, 800 => 600);
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['fil1'])) {
  if( $_FILES['fil1']['size'] < $max_file_size ){
    // Henter ut filtype
    $ext = strtolower(pathinfo($_FILES['fil1']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $valid_exts)) {
      // Tar i bruk resize funksjonen
      foreach ($sizes as $w => $h) {
        $files[] = resize($w, $h);
      }
        //Spørring mot databasen som legger inn ferdig resizet bilde
        $path = 'upload/'.$w.'x'.$h.'_'.$_FILES['fil1']['name'];
        $sql = "INSERT INTO `vikerfjell`.`bilder` (`hvor`, `thumb`, `bredde`, `hoyde`)";
        $sql.= " values ('".$path."','".$path."','".$w."','".$h."')";
        $con->query($sql);
    } else {
      echo" 
        <script>
         window.alert('Filtypen støttes ikke.') 
         window.location.href='sidemenu-filopplastning.php';            
        </script>
        ";
    }
  } else{
    echo" 
    <script>
     window.alert('Bildet er for stort. Maks 2 MB.') 
     window.location.href='sidemenu-filopplastning.php';            
    </script>
    ";
  }
}
echo" 
<script>
 window.alert('Filopplastning fullført!') 
 window.location.href='sidemenu-filopplastning.php';            
</script>
";
?>
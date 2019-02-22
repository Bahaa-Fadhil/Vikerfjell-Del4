<?php
/* 
   Tittel: Innhold på sider
    Beskrivelse: knytter bilder til innhold
        Sist oppdatert: 04.05.2017
            Utviklet av: Joacim
                Kontrollert av:

*/ 
session_start();
// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}
require_once "inc/connect.php"; $con = new vikerfjellDB();
include("funksjoner.php");
// henter side for å legge til bilde til den siden man kommer ifra.
if(isset($_GET['side']))
$sidetekst=$_GET['side'];

if(isset($_GET['idB']))
$idB=$_GET['idB'];

if(isset($_GET['idI']))
$idI=$_GET['idI'];

// sletter bilde om innholdet har ett bilde fra før.
	$slett = "DELETE FROM `vikerfjell`.`bilderinnhold` WHERE `_idinnhold`='".$idI."';";
	$con->query($slett);
	  if($con){
		echo("id sql er".$slett."--");
	  }else {
	  mysql_error();}
// knytter bilde til innhold. 
    $sql = "INSERT INTO `vikerfjell`.`bilderinnhold` (`_idbilder`, `_idinnhold`) VALUES ('".$idB."', '".$idI."');";
    //echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
	  if($con){
// sender deg deretter til mal.php for å oppdatere html sidene. 
		header("location:../mal.php");
	  }else {
	  mysql_error();}
?>
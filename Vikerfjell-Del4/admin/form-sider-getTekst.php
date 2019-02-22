<?php
/* 
   Tittel: Innhold på sider
    Beskrivelse: genererer backend redigeringssider, går igjennom en loop på alle meny elementer og lager utssende for siden. 
        Sist oppdatert: 04.05.2017
            Utviklet av: Joacim
                Kontrollert av:

*/ 

// for-løkke for å hente ut id til meny og side. 
require_once "inc/connect.php"; $con = new vikerfjellDB();
include("funksjoner.php");
$sql = "SELECT * FROM meny;";	
$res = $con->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);
foreach($result as $menyelem){
	$id = $menyelem['idmeny'];
	$sideM = $menyelem['side'];

	// for-løkke for å hente ut id til innhold og side. 
	$sql1 = "SELECT * FROM vikerfjell.innhold where idmeny='".$id."';";	
	$res = $con->query($sql1);
	$result = $res->fetch_all(MYSQLI_ASSOC);
	foreach($result as $menyelem){
		$idI = $menyelem['idmeny'];
		$sideI = $menyelem['side'];
		//echo("sideI = ".$sideI." og idI =".$idI." ");
	}
	//henter ut malen for å lage utssende til sidene. og oppretter nye redigeringssider i backend 
	$mal = file_get_contents('form-sider-mal.php');
	$filename = "form-sider-$sideM.php";
	file_put_contents($filename, $mal);
	
	}
	header("location:home.php");
?>
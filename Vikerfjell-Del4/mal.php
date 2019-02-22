<?php
/* 
   Tittel: Innhold på sider
    Beskrivelse: genererer sider, går igjennom en loop på alle meny elementer og lager utssende for siden. 
        Sist oppdatert: 04.05.2017
            Utviklet av: Joacim
                Kontrollert av:

*/ 
require_once "inc/connect.php"; $con = new vikerfjellDB();
include("inc/funksjoner.php");
$sql = "SELECT * FROM meny;";	
$res = $con->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);
foreach($result as $menyelem){
	$id = $menyelem['idmeny'];
	$side = $menyelem['side'];

	//echo("side = ".$side." og id =".$id."");
	$sql1 = "SELECT * FROM vikerfjell.innhold where idmeny='".$id."';";	
	$res = $con->query($sql1);
	$result = $res->fetch_all(MYSQLI_ASSOC);
	foreach($result as $menyelem){
		$idI = $menyelem['idmeny'];
		$sideI = $menyelem['side'];
		//echo("sideI = ".$sideI." og idI =".$idI." ");
	}
// lagrer alle data, ferdig kjørt PHP i en variabel 
ob_start();
	// her har vi lagd en if-test for å gi spesifikt utseende på noen sider. 
	include("inc/header.php");
	
	if($side=='hjem.html'){
		include("inc/home.php");
		include("inc/footer.php");	
	}elseif($side=='Kontakt.html'){
		include("inc/kontakt.php");
		include("inc/footer.php");
	}elseif($side=='default.html'){
		include("inc/home.php");
		include("inc/footer.php");
	}elseif($side=='tjenester.html'){
		include("inc/tjenester.php");
		include("inc/footer.php");	
	}else{
		include("inc/standard.php");
		include("inc/footer.php");
	}
	$filename = "sidene2/$side";
	$htmlStr = ob_get_contents();
	ob_end_clean();
	file_put_contents($filename, $htmlStr);
	
	}
	header("location:admin/form-sider.php");
?>
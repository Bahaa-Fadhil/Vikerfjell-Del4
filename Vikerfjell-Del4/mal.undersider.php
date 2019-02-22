<?php
/* 
   Tittel: mal til undersider
    Beskrivelse: går igjennom en loop for alle innhold i DB og lager html undersider
        Sist oppdatert: 04.05.2017
            Utviklet av: Joacim
                Kontrollert av:

*/ 
require_once "inc/connect.php"; $con = new vikerfjellDB();
include("inc/funksjoner.php");
$sql = "SELECT * FROM innhold;";	
$res = $con->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);
foreach($result as $menyelem){
	$id = $menyelem['idinnhold'];
	$side = $menyelem['side'];

	//echo("side = ".$side." og id =".$id."");
	$sql1 = "SELECT * FROM vikerfjell.innhold where idinnhold='".$id."';";	
	$res = $con->query($sql1);
	$result = $res->fetch_all(MYSQLI_ASSOC);
	foreach($result as $menyelem){
		$idI = $menyelem['idmeny'];
		$sideI = $menyelem['side'];
		//echo("sideI = ".$sideI." og idI =".$idI." ");
	}
ob_start();
	
	include("sidene/inc/header.php");
	
	if($side=='hjem.html'){
		include("sidene/inc/home.php");
		include("sidene/inc/footer.php");	
	}elseif($side=='kontakt.html'){
		include("sidene/inc/kontakt.php");
		include("sidene/inc/footer.php");	
	}elseif($side=='tjenester.html'){
		include("sidene/inc/tjenester.php");
		include("sidene/inc/footer.php");	
	}else{
		include("sidene/inc/standard.php");
		include("sidene/inc/footer.php");
	}
	$filename = "sidene/$side";
	$htmlStr = ob_get_contents();
	ob_end_clean();
	file_put_contents($filename, $htmlStr);
	
	}
	header("location:admin/form-sider.php");
?>
<?php
/* 
   Tittel: Mal Redigeringssider
    Beskrivelse: utseende for redigeringssider 
        Sist oppdatert: 04.05.2017
            Utviklet av: Joacim
                Kontrollert av:

*/



// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
session_start();
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}


require_once "inc/connect.php"; $con = new vikerfjellDB();
require_once("funksjoner.php");
$epr="";
if(isset($_GET['epr']))
	$epr=$_GET['epr'];


if(isset($_GET['side']))
$sidetekst=$_GET['side'];
//echo($sidetekst);

$sql = "SELECT idmeny, side FROM meny where side='".$sidetekst."';";	
$res = $con->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);
foreach($result as $menyelem){
	$idmeny = $menyelem['idmeny'];}

$sql = "select max(rekke) as rekke,idmeny from innhold where idmeny='".$idmeny."';";
//echo($idmeny);
$res = $con->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);
foreach($result as $menyelem){
	$HoyesteRekke = $menyelem['rekke'];
	$HoyesteRekke++;}




/* -------------------------- legg til innhold. utviklet av joacim ----*/
  if ($epr =='save')
{
    $tittel = $_POST['tittel'];
    $ingress = $_POST['ingress'];
    $tekst = $_POST['text'];
    $rekke = $_POST['rekke'];
	$side = $_POST['side'];
      
    $sql = "INSERT INTO `vikerfjell`.`innhold` (`tittel`, `ingress`, `text`, `rekke`, `side`, `idmeny`)";
    $sql.= " values ('".$tittel."','".$ingress."','".$tekst."','".$rekke."','".$side."','".$idmeny."')";
    echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
	  if($con){
		 header("location:form-sider-$sidetekst.php?side=$sidetekst");
	  }else {
	  mysql_error();}
}
/* -------------------------- Slett innhold utviklet av joacim ----*/
if ($epr =='slett'){
	$id = $_GET['id'];
	$slett = "DELETE FROM `vikerfjell`.`innhold` WHERE `idinnhold`='".$id."';";
	$con->query($slett);
	echo("id sql er".$slett."--");
	  if($con){
		 header("location:form-sider-$sidetekst.php?side=$sidetekst");
	  }else {
	  mysql_error();}
}
/* -------------------------- update innhold. utviklet av joacim -------------*/
if ($epr =='saveup'){
	$id = $_GET['id'];
	$tittel = $_POST['tittel'];
    $ingress = $_POST['ingress'];
    $tekst = $_POST['text'];
    $rekke = $_POST['rekke'];
	$side = $_POST['side'];
	
	$sql = "UPDATE `vikerfjell`.`innhold` SET `tittel`='".$tittel."', `ingress`='".$ingress."', `text`='".$tekst."', `rekke`='".$rekke."', `side`='".$side."' WHERE `idinnhold`='".$id."';";
    echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
	  if($con){
		  header("location:form-sider-$sidetekst.php?side=$sidetekst");
	  }else {
	  mysql_error();}
}
?>
<!doctype html>
<html>
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!--  -->
<script type="text/javascript" src="functions/functions.js"></script>
<!--  -->
</head>
<body>
	
<!-- her lager jeg en ny nav "joacim bergh" -->

<header>
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
            <li><a href="home.php">HJEM</a></li>
			<li class="main-menu-item"><a href="hytter.html">BRUKERVALG</a>
				<ul class="sub-menu">
					<li><a role="link" href="register_form.php" title="Denne linken tar deg til hytter til salgs">REGISTRER BRUKER</a></li>
					<li><a role="link" href="changePasswordFormAdmin.php" title="Denne linken tar deg til hytter til leie">BYTT PASSORD</a></li>
                    <li><a role="link" href="search.php" title="Denne linken tar deg til hytter til leie">FINN BRUKER</a></li>
                    <li><a role="link" href="brukere.php" title="Denne linken tar deg til hytter til leie">BRUKERLISTE</a></li>
				</ul>
            <li><a href="#">INNSTILLINGER</a></li>
			<li><a href="loggut.php"><img class="logo" src="../admin/bilder/account-logout-32.png"></a></li>
		</ul>
      <a href="javascript:void(0);" id="menu-icon" onclick="myHamburgerFunction()"></a>
</header>
<aside id="mytopnav">
	<div id="mySidenav" class="sidenav" >
	  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
	  <a href="form-sider.php">Sider</a>
      <a href="sidemenu-filopplastning.php">Filopplastning</a>
	  <a href="form-meny.php">Meny</a>
      
        
	</div>
	
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</aside>
<!--
<div class="grid topp" id="VelgLayout">
    <div class="row2 side">
    	<div class="col-wd-12">
    		<div class='col4'>
				<button type='button' onclick="myLeggLayoutFunction()">Velg Layout</button>
			</div>
		</div>
	</div>
</div>
<div class="grid topp" id="LayoutArtikkel" style="display: none;">
    <div class="row2 side">
    	<div class="col-wd-6">
    		<div class='col4'>
			<img class="back-image" onClick="visArtikkelInnhold()"  src="bilder/back-end img/bilde1.jpg" height="200px" width="300px">
			</div>
		</div>
		<div class="col-wd-6">
    		<div class='col4'>
			<img class="back-image" onClick="visEnkelInnhold"  src="bilder/back-end img/bilde1.jpg" height="200px" width="300px">
			</div>
		</div>
	</div>
</div>

<div class="grid topp" id="leggtilInnholdArtikkel" style="display: none">

<!--- legg til nytt innhold --->

<div class="grid topp">
    <div class="row2 side">
    	<div class="col-wd-4">
			<button type='button' onclick="myLeggFunction()">Legg til artikkel</button>
			<div class='col4' id="leggtil" style="display: none;">
				<form action="form-sider-<?php echo($sidetekst)?>.php?side=<?php echo($sidetekst)?>&epr=save" method="POST">
        		<h5 style="text-align: right "> <a style="color: #fff" href='form-sider-<?php echo($sidetekst)?>.html.php?epr=slett&id=<?php echo $row['idinnhold']?>'>Slett</a></h5>
				<h5 id="back-end"> Skriv inn og trykk endre, deretter oppdater</h5>
				<div class='artikkel-tekst' id="header2" contenteditable=true>
					<h4 class='header-tekst' id='h2_'>Skriv inn ingress her</h4>
					<p class='header-tekst' id='h3_'>Skriv inn tekst her</p>
				</div>
				<input type='hidden' name='tittel' value="">
				<input type='hidden' name='ingress' id='hh_2'>
				<input type='hidden' name='text' id='hh_3'>
				<input type='hidden' value="<?php echo $HoyesteRekke?>" name="rekke" id='hh_4<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo($HoyesteRekke.$sidetekst)?>" name="side" id='hh_4<?php echo $row['idinnhold']?>'>
				<button type='button' onClick="myLeggtilFunction()">Endre</button>
				<input class="btnbtn" id="btn_artikkel" type="submit" name="registrer" value="Registrer innhold">
				</form>
				<button type='button' onclick="myAvbrytFunction()">Avbryt</button>
			</div>
		</div>
		<div class="col-wd-4">
			<button type='button' onclick="myLeggHeaderFunction()">Legg til header</button>
			<div class='col4' id="leggtilHeader" style="display: none;">
				<form action="form-sider-<?php echo($sidetekst)?>.php?side=<?php echo($sidetekst)?>&epr=save" method="POST">
        		<h5 style="text-align: right "> <a style="color: #fff" href='form-sider-<?php echo($sidetekst)?>.html.php?epr=slett&id=<?php echo $row['idinnhold']?>'>Slett</a></h5>
				<h5 id="back-end"> Skriv inn og trykk endre, deretter oppdater</h5>
				<div class='artikkel-tekst' id="header3" contenteditable=true>
					<h1 class='header-tekst' id='h1_header'>Skriv inn tittel her</h4>
					<h4 class='header-tekst' id='h2_header'>Skriv inn ingress her</h4>
				</div>
				<input type='hidden' name='tittel' id='hh_header1'>
				<input type='hidden' name='ingress' id='hh_header2'>
				<input type='hidden' name='text' value=''>
				<input type='hidden' value="1" name="rekke" id='hh_4<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo($sidetekst)?>" name="side" id='hh_4<?php echo $row['idinnhold']?>'>
				<button type='button' onClick="myLeggtilHeaderFunction()">Endre</button>
				<input class="btnbtn" id="btn_header" type="submit" name="registrer" value="Registrer innhold">
				</form>
				<button type='button' onclick="myAvbrytFunction()">Avbryt</button>
			</div>
		</div>
		<div class="col-wd-4">
			<div class='col4'>
				<a class="button" href="../mal.php">Oppdater sider</a>
			</div>
		</div>
	</div>
</div>
<!-------------- denne hører til header------>
<?php
	
	$teller =1;
	$sql =  "select * from innhold where idmeny=".$idmeny." and rekke=1 order by rekke";
	$res = $con->query($sql);
	echo("<div class='grid topp'>\n");
	echo("<div class='row2 side'>");
	try {$width = $res->num_rows<3 ? 12/$res->num_rows : 4;
		} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	while ($row = $res->fetch_assoc()) {
		if($teller%3==1 && $teller !=1){
			echo('</div></div>');
			echo("<div class='grid'>");
			echo("<div class='row2 side'>");
			}
		?>
    	<div class='col-wd-12'>
        	<div class='col4'>
        	<form action="form-sider-<?php echo($sidetekst)?>.php?side=<?php echo($sidetekst)?>&epr=saveup&id=<?php echo $row['idinnhold']?>" method="POST">
        		<h5 style="text-align: right "> <a style="color: #fff" href='form-sider-<?php echo($sidetekst)?>.php?side=<?php echo($sidetekst)?>&epr=slett&id=<?php echo $row['idinnhold']?>'>Slett</a></h5>
        		<div class='artikkel-tekst' id="header2" contenteditable=true>
					<h1 class='header-tekst' id='h1_<?php echo $row['idinnhold']?>'><?php echo $row['tittel']?></h1>
					<h4 class='header-tekst' id='h2_<?php echo $row['idinnhold']?>'><?php echo $row['ingress']?></h4>
					<p class='header-tekst' id='h3_<?php echo $row['idinnhold']?>'><?php echo $row['text']?></p>
				</div>
				<input type='hidden' name='tittel' id='hh_1<?php echo $row['idinnhold']?>'>
				<input type='hidden' name='ingress' id='hh_2<?php echo $row['idinnhold']?>'>
				<input type='hidden' name='text' id='hh_3<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo $row['rekke']?>" name="rekke" id='hh_4<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo $row['side']?>" name="side" id='hh_4<?php echo $row['idinnhold']?>'>
				<button type='button' onClick="myTekstFunction(<?php echo $row['idinnhold']?>)">Endre</button>
				<input class="btnbtn" id="btn_<?php echo $row['idinnhold']?>" type="submit" name="registrer" value="Registrer innhold">
				</form>
			</div>
		</div>
		

<?php
	$teller++;}
	echo('</div>');
	echo('</div>');
			
?>
<!--------------- slutt header tekst ---------->
<!-------------- denne hører til artikler------>
<?php
	$tellerR=1;
	$sql =  "select * from innhold where idmeny=".$idmeny." and rekke>=2 order by rekke";
	$res = $con->query($sql);
	echo("<div class='grid'>\n");
	echo("<div class='row2 side'>");
	try {$width = $res->num_rows<3 ? 12/$res->num_rows : 4;
		} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	while ($row = $res->fetch_assoc()) {
		if($tellerR%3==1 && $tellerR !=1){
			echo('</div></div>');
			echo("<div class='grid'>");
			echo("<div class='row2 side'>");
			}
?>
    	<div class='col-wd-4'>
        	<div class='col4'>
        		<form action="form-sider-<?php echo $sidetekst?>.php?side=<?php echo $sidetekst?>&epr=saveup&id=<?php echo $row['idinnhold']?>" method="POST">
        		<h5 style="text-align: right "> <a style="color: #fff" href='form-sider-hytter.html.php?epr=slett&id=<?php echo $row['idinnhold']?>'>Slett</a></h5>
				<div class='container'>
           		<img class="back-image"  src="bilder/back-end img/bilde1.jpg" height="200px" width="300px">
					<div class='back-imgOverlay'>
						<a href='sidemenu-filopplastning.php?side=<?php echo $sidetekst?>&idInnhold=<?php echo $row['idinnhold']?>'><div class="text"> Sett inn bilde</div></a>
					</div>
				</div>
				<h5 id="back-end"> Rad <?php echo($teller)?></h5>
				<div class='artikkel-tekst' id="header2" contenteditable=true>
					<h1 class='header-tekst' id='h1_<?php echo $row['idinnhold']?>'><?php echo $row['tittel']?></h1>
					<h4 class='header-tekst' id='h2_<?php echo $row['idinnhold']?>'><?php echo $row['ingress']?></h4>
					<p class='header-tekst' id='h3_<?php echo $row['idinnhold']?>'><?php echo $row['text']?></p>
				</div>
				<input type='hidden' name='tittel' id='hh_1<?php echo $row['idinnhold']?>'>
				<input type='hidden' name='ingress' id='hh_2<?php echo $row['idinnhold']?>'>
				<input type='hidden' name='text' id='hh_3<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo $row['rekke']?>" name="rekke" id='hh_4<?php echo $row['idinnhold']?>'>
				<input type='hidden' value="<?php echo $row['side']?>" name="side" id='hh_4<?php echo $row['idinnhold']?>'>
				<button type='button' onClick="myTekstFunction(<?php echo $row['idinnhold']?>)">Endre</button>
				<input class="btnbtn" id="btn_<?php echo $row['idinnhold']?>" type="submit" name="registrer" value="Registrer innhold">
				</form>
			</div>
		</div>

<?php
	$tellerR++;
	$teller++;}
	echo('</div>');
	echo('</div>');
?>

</body>
</html>
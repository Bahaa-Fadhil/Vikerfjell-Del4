<?php
/* 

Tittel: Filopplastning
    Beskrivelse:
        Sist oppdatert: 13.04.2017
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

// Henter side for å legge til bilde til den siden man kommer ifra.
if(isset($_GET['side']))
$sidetekst=$_GET['side'];
// Henter innhold for å legge til bilde til riktig innhold.
if(isset($_GET['idInnhold']))
$idI=$_GET['idInnhold'];
?>

<!doctype html>
<html>
<head>
<!-- 

Tittel: Filopplastning
    Beskrivelse:
        Sist oppdatert: 23.03.2017
            Utviklet av: Steffen
                Kontrollert av: 

-->    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script type="text/javascript" src="functions/functions.js"></script>
<script>
	function myLeggtilOpp(){
		document.getElementById('LastOpp').style.display="inherit";
	}
	
</script>
    
</head>
<body>

<!-- her lager jeg en ny nav "joacim bergh" -->

<header>
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell-hvitt.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
            <li><a href="home.php">HJEM</a></li>
			<li class="main-menu-item"><a href="#">BRUKERVALG</a>
				<ul class="sub-menu">
					<li><a role="link" href="register_form.php" title="Denne linken tar deg til registrer bruekr">REGISTRER BRUKER</a></li>
					<li><a role="link" href="changePasswordFormAdmin.php" title="Denne linken tar deg til bytte passord">BYTT PASSORD</a></li>
                    <li><a role="link" href="search.php" title="Denne linken tar deg til finn bruker">FINN BRUKER</a></li>
                    <li><a role="link" href="brukere.php" title="Denne linken tar deg til brukerliste">BRUKERLISTE</a></li>
				</ul>
            <li><a href="#">INNSTILLINGER</a></li>
			<li><a href="loggut.php"><img class="logo" src="../admin/bilder/account-logout-32.png"></a></li>
		</ul>
      <a href="javascript:void(0);" id="menu-icon" onclick="myHamburgerFunction()"></a>
</header>
<aside id="mytopnav">
	<div id="mySidenav" class="sidenav" >
	  <a href="form-sider.php">Sider</a>
      <a href="sidemenu-filopplastning.php">Filopplastning</a>
	  <a href="form-meny.php">Meny</a> 
	</div>
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</aside>
    
<div class="grid">
    <div class="row2 side">
    	<div class="col-wd-12">
        	<div class="col">
                <form action="fileupload.php?" method="post" enctype="multipart/form-data">
                <input id="file-upload-textfield" disabled="disabled" />
                <label for="btn-upload" class="custom-file-upload-btn">
                    Velg fil
                </label>
                <input type="file" name="fil1" id="btn-upload" onClick="myLeggtilOpp()" onchange="showPath(this, 'file-upload-textfield');" />
                <input type="submit" id="LastOpp" style="display: none;" value="Last opp fil" name="send" class="custom-file-upload-btn">
                </form>
            </div>
        </div>
    </div>
</div>

<!------------ Henter opp alle bilder fra databasen-------->
<?php
	$tellerR=1;
	$sql =  "select * from bilder";
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
        	<div class='col1'>
        		<a href="lagreBilde.php?side=<?php echo $sidetekst?>&idB=<?php echo $row['idbilder']?>&idI=<?php echo $idI?>">
				<div class='container'>
           		<img class="back-image" id="bilde_<?php echo $row['idbilder']?>" src='../<?php echo $row['hvor']?>' height="250" width="300">
				</div>
				</a>
			</div>
		</div>

<?php
	$tellerR++;}
	echo('</div>');
	echo('</div>');
?>

</body>
</html>